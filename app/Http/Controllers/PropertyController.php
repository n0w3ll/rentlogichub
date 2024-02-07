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
use Illuminate\Support\Facades\Storage;
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

        return view('properties.index', compact('properties', 'searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $owners = Owner::orderBy('name', 'asc')->get();
        return view('properties.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        
        $data = $request->validated();

        $images = [];

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalName();
                $image->storeAs('images', $fileName, 'public');
                array_push($images, $fileName);
            }
            $data['images'] = $images;
        }

        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Property added successfully!');
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

        return view('properties.view', compact('property', 'currentTenant', 'previousTenants', 'rentStartForCurrentTenant', 'rentEndForCurrentTenant', 'rentStartForPreviousTenants', 'rentEndForPreviousTenants'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $owners = Owner::orderBy('name', 'asc')->get();

        return view('properties.edit', compact('property', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();

        // Retrieve the current images array
        $existingImages = $property->images ?? [];

        $newImages = [];

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalName();
                $image->storeAs('images', $fileName, 'public');
                array_push($newImages, $fileName);
            }
        }

        // Append new images to the existing images array
        $data['images'] = array_merge($existingImages, $newImages);

        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property successfully deleted!');
    }

    public function removeImg($propertyId, $img)
    {
        $property = Property::find($propertyId);
        $imagePath = 'images/' . $img;


        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
            $property->removeItem($img);

            return back()->with('success', 'Image successfully deleted!');
        }

        return back()->with('error', "Image '$img' not found.");
    }
}
