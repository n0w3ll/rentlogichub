<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searched = $request->input('q');

        $vendors = Vendor::withCount('agents')
        ->when(
            $request->q,
            function (Builder $builder) use ($request) {
                $builder
                ->where('name', 'like', "%{$request->q}%")
                ->orWhere('phone', 'like', "%{$request->q}%")
                ->orWhere('address', 'like', "%{$request->q}%");
            }
        )
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $title = 'Delete Vendor?';
        $text = "Deleting this vendor will also delete its agents";
        confirmDelete($title, $text);

        if ($searched !== '') {
            $vendors->appends(['q' => $searched]);
        }
        
        return view('vendors.index', compact('vendors','searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        Vendor::create($request->validated());

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->validated());

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->back()->with('success', 'Vendor successfully deleted');
    }
}
