<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searched = $request->input('q');

        $agents = Agent::leftJoin('vendors', 'vendors.id', '=', 'agents.vendor_id')
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder
                        ->where('agents.name', 'like', "%{$request->q}%")
                        ->orWhere('agents.phone', 'like', "%{$request->q}%")
                        ->orWhere('email', 'like', "%{$request->q}%")
                        ->orWhere('agents.status', 'like', "%{$request->q}%")
                        ->orWhere('vendors.name', 'like', "%{$request->q}%");
                }
            )
            ->select('agents.*')
            ->orderBy('agents.created_at', 'desc')
            ->paginate(10);

        $title = 'Delete Agent';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($searched !== '') {
            $agents->appends(['q' => $searched]);
        }

        return view('agents.index', compact('agents', 'searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::orderBy('name', 'asc')->get();
        return view('agents.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentRequest $request)
    {
        Agent::create($request->validated());
        return redirect()->route('agents.index')->with('success', 'Agent created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        $vendors = Vendor::orderBy('name', 'asc')->get();
        return view('agents.edit', compact('agent','vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentRequest $request, Agent $agent)
    {
        $agent->update($request->validated());

        return redirect()->route('agents.index')->with('success', 'Agent updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->back()->with('success', 'Agent successfully deleted');
    }
}
