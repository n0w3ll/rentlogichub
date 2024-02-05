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
                        ->orWhere('properties.status', 'like', "%{$request->q}%")
                        ->orWhere('owners.name', 'like', "%{$request->q}%");
                }
            )
            ->select('properties.*')
            ->orderBy('properties.created_at', 'desc')
            ->paginate(10);

        $title = 'Delete Property';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('property.index', compact('properties', 'searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $owners = Owner::orderBy('name', 'asc')->get();
        return view('property.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $property = Property::create($request->all());
        $data = $request->validate([
            'owner_id' => 'required|integer',
            'type' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'rent' => 'required|integer',
            'features' => 'required|string',
            'status' => 'required|string',
            'images' => ['nullable', 'array', 'max:5']
        ]);
        
        $images = [];

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalName();
                $image_path =  $image->storeAs('images', $fileName, 'public');
                array_push($images, $image_path);
            }
            $data['images'] = $images;
        }
        
        Property::create($data);

        return redirect()->route('property.index')->with('success', 'Property added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $currentTenant = $property->tenants->first(function ($tenant) {
            return $tenant->pivot->rent_start <= now() && $tenant->pivot->rent_end >= now();
        });

        $previousTenants = $property->tenants->filter(function ($tenant) {
            return $tenant->pivot->rent_end < now();
        });

        $rentStartForCurrentTenant = null;
        $rentEndForCurrentTenant = null;
        $rentStartForPreviousTenants = [];
        $rentEndForPreviousTenants = [];

        if ($currentTenant) {
            $rentStartForCurrentTenant = $currentTenant->pivot->rent_start;
            $rentEndForCurrentTenant = $currentTenant->pivot->rent_end;
        }

        foreach ($previousTenants as $previousTenant) {
            $rentStartForPreviousTenants[] = $previousTenant->pivot->rent_start;
            $rentEndForPreviousTenants[] = $previousTenant->pivot->rent_end;
        }

        return view('property.view', compact('property', 'currentTenant', 'previousTenants', 'rentStartForCurrentTenant', 'rentEndForCurrentTenant', 'rentStartForPreviousTenants', 'rentEndForPreviousTenants'));
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

        return redirect()->route('property.index')->with('success', 'Property updated successfully!');
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
