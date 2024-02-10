<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use App\Models\Rent;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $prop_occupied = Property::where('status', 'occupied')->count();
        $prop_vacant = Property::where('status', 'vacant')->count();
        $prop_pending = Property::where('status', 'pending')->count();

        $tenant_free = Tenant::where('status', 'free')->count();
        $tenant_renting = Tenant::where('status', 'renting')->count();
        $tenant_pending = Tenant::where('status', 'pending')->count();
        
        $active_agents = Agent::where('status', 'actv')->count();
        $inactive_agents = Agent::where('status', 'inatv')->count();

        $notifications = auth()->user()->unreadNotifications;
        

        return view('dashboard', compact(
            'prop_occupied',
            'prop_vacant',
            'tenant_free',
            'tenant_renting',
            'prop_pending',
            'tenant_pending',
            'active_agents',
            'inactive_agents',
            'notifications'
        )); 
    }
}
