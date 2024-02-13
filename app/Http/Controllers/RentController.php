<?php

namespace App\Http\Controllers;

use App\Events\RentCreated;
use App\Events\RunUpdatePropertyStatusCommand;
use App\Http\Requests\StoreRentRequest;
use App\Models\Rent;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentController extends Controller
{
    public function index(Request $request): View
    {
        // $rents = Rent::with(['tenant','property'])->paginate(10);

        // return view('rent.index', compact('rents'));
        $searched = $request->q;

        $rents = Rent::leftJoin('properties', 'properties.id', '=', 'rents.property_id')
            ->leftJoin('tenants', 'tenants.id', '=', 'rents.tenant_id')
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder
                        ->where('properties.type', 'like', "%{$request->q}%")
                        ->orWhere('properties.number', 'like', "%{$request->q}%")
                        ->orWhere('rents.status', 'like', "%{$request->q}%")
                        ->orWhere('tenants.name', 'like', "%{$request->q}%");
                }
            )
            ->orderBy('rents.updated_at', 'desc')
            ->select(
                'rents.*',
                'properties.type as property_type',
                'properties.number as property_number',
                'tenants.name as tenant_name'
            )
            ->paginate(10);

        $title = 'Delete Rent';
        $text = "This will also delete related invoices and transactions.";
        confirmDelete($title, $text);

        if ($searched !== '') {
            $rents->appends(['q' => $searched]);
        }

        return view('rents.index', compact('rents', 'searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $rents = Rent::with(['tenant','property' => function ($query) {
        //     $query->where('status', 'vacant');
        // }])->get();

        $properties = Property::where('status', 'vacant')->get();
        $tenants = Tenant::orderBy('name', 'asc')->get();

        return view('rents.create', compact('properties', 'tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentRequest $request)
    {
        $newRent = Rent::create($request->all());
        
        event(new RentCreated($newRent));
        // Optional - assuming that there will be a backdated rent registered
        event(new RunUpdatePropertyStatusCommand('update:property-status'));
        return redirect()->route('rents.index')->with('success', 'Rent registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        // $properties = Property::where('status','vacant')->get();

        return view('rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRentRequest $request, Rent $rent)
    {
        $rent->update($request->all());

        event(new RunUpdatePropertyStatusCommand('update:property-status'));
        return redirect()->route('rents.index')->with('success', 'Rent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();
        event(new RunUpdatePropertyStatusCommand('update:property-status'));
        return redirect()->route('rents.index')->with('success', 'Rent successfully deleted!');
    }
}
