<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentController extends Controller
{
    public function index(): View
    {
        $properties = Property::where('status','=','vacant')->latest()->paginate(10);
        
        return view('rent.index', compact('properties'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
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
