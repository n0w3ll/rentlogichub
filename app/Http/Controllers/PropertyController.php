<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $properties = Property::latest()->paginate(10);
        $searched = $request->q;

        $properties = Property::leftJoin('owners', 'owners.id', '=', 'properties.owner_id')
        ->when(
            $request->q,
            function (Builder $builder) use ($request) {
                $builder
                    ->where('type', 'like', "%{$request->q}%")
                    ->orWhere('address', 'like', "%{$request->q}%")
                    ->orWhere('number', 'like', "%{$request->q}%")
                    ->orWhere('features', 'like', "%{$request->q}%")
                    ->orWhere('status', 'like', "%{$request->q}%")
                    ->orWhere('owners.name', 'like', "%{$request->q}%");
            }
        )
        ->select('properties.*')
        ->orderBy('properties.created_at', 'desc')
        ->paginate(10);

        $title = 'Delete Property';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('property.index', compact('properties','searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $owners = Owner::all();
        return view('property.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        Property::create($request->all());

        toastr()->success('Property added successfully!');
        return redirect()->route('property.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $owners = Owner::all();
        return view('property.edit', compact('property', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());

        toastr()->success('Property updated successfully!');
        return redirect()->route('property.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('success', 'Property successfully deleted!');
    }
}
