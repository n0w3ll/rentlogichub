<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::latest()->paginate(10);
        
        return view('property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $prop = Property::create([
            'type' => $request->type,
            'address' => $request->address,
            'number' => $request->number,
            'features' => $request->features,
            'status' => $request->status,
            'rent' => $request->rent
        ]);
        if ($prop instanceof Model) {
            toastr()->success('Property added successfully!');

            return redirect()->route('property.index');
        }
        toastr()->error('An error has occured. Please try again');

        return back();
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
        return view('property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'features' => 'required|string',
            'status' => 'required|string',
            'rent' => 'required'
        ]);

        $property->update($validated);

        if ($property instanceof Model) {
            toastr()->success('Property updated successfully!');

            return redirect()->route('property.index');
        }
        
        toastr()->error('An error has occured. Please try again');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        toastr()->success('Property deleted successfully!');
        return redirect()->route('property.index');
    }
}
