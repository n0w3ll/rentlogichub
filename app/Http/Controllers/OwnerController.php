<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerRequest;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // $owners = Owner::has('properties')->latest()->paginate(10);
        $searched = $request->input('q');

        $owners = Owner::withCount('properties')
        ->when(
            $request->q,
            function (Builder $builder) use ($request) {
                $builder
                ->where('name', 'like', "%{$request->q}%")
                ->orWhere('identity_no', 'like', "%{$request->q}%")
                ->orWhere('phone', 'like', "%{$request->q}%")
                ->orWhere('email', 'like', "%{$request->q}%");
            }
        )
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        $title = 'Delete Owner?';
        $text = "Deleting this owner will also delete ALL his/her properties";
        confirmDelete($title, $text);
        
        return view('owners.index', compact('owners','searched'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('owners.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request)
    {
        Owner::create($request->validated());

        return redirect()->route('owners.index')->with('success', 'Owner created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner): View
    {
        return view('owners.view', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        $owner->update($request->validated());

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->back()->with('success', 'Owner successfully deleted');
    }

}
