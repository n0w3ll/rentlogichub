<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $prop_occupied = Property::where('status', 'occupied')->count();
        $prop_vacant = Property::where('status', 'vacant')->count();

        $tenant_free = Tenant::where('status', 'free')->count();
        $tenant_renting = Tenant::where('status', 'renting')->count();

        return view('dashboard', compact('prop_occupied','prop_vacant','tenant_free','tenant_renting')); 
    }
}
