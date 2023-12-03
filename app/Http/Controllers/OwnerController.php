<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $owners = Owner::has('properties')->latest()->paginate(10);
        
        return view('owner.index', compact('owners'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('owner.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner): View
    {
        return view('owner.view', [
            'owner' => $owner,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        //
    }

    public function showall()
    {
        $owners = Owner::latest()->paginate(10);
        
        return view('owner.index', compact('owners'));
    }
}
