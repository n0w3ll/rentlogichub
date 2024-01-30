<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Models\Rent;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentController extends Controller
{
    public function index(): View
    {
        $rents = Rent::with(['tenant','property'])->paginate(10);
        
        return view('rent.index', compact('rents'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $rents = Rent::with(['tenant','property' => function ($query) {
        //     $query->where('status', 'vacant');
        // }])->get();
        
        $properties = Property::where('status','vacant')->get();
        $tenants = Tenant::where('status','free')->get();

        return view('rent.create', compact('properties','tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentRequest $request)
    {
        Rent::create($request->all());

        return redirect()->route('rent.index')->with('success','Rent registered successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }
    
}
