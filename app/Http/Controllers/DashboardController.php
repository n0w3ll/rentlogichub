<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $prop_occupied = Property::where('status', 'occupied')->count();
        $prop_vacant = Property::where('status', 'vacant')->count();

        return view('dashboard', compact('prop_occupied','prop_vacant')); 
    }
}
