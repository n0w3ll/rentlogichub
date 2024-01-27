<?php

namespace App\Http\Controllers;

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
        
        return view('owner.index', compact('owners','searched'));
        
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
    // public function destroy(Owner $owner)
    // {
    //     $owner->delete();
    //     return redirect()->back()->with('success', 'Owner successfully deleted');
    // }
    public function destroy(string $id)
    {
        Owner::find($id)->delete();
  
        return back();
    }

    public function showall(Request $request)
    {
        // $owners = Owner::latest()->paginate(10);

        $searched = $request->input('q');

        $owners = Owner::with('properties')
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
        ->orderBy('created_at','desc')
        ->paginate(10);
        
        return view('owner.index', compact('owners','searched'));
    }
}
