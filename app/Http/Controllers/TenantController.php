<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $searched = $request->q;
        $tenants = Tenant::latest()->paginate(10);

        $title = 'Delete Tenant';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('tenant.index', compact('tenants','searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        Tenant::create($request->all());

        return redirect()->route('tenant.index')->with('success','Tenant added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenant.edit', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTenantRequest $request, Tenant $tenant)
    {
        $tenant->update($request->all());

        return redirect()->route('tenant.index')->with('success','Tenant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenant.index')->with('success', 'Tenant successfully deleted!');
    }
}
