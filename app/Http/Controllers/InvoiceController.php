<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searched = $request->q;

        $invoices = Invoice::leftJoin('rents', 'rents.id', '=', 'invoices.rent_id')
            ->leftJoin('tenants', 'tenants.id', '=', 'rents.tenant_id')
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder
                        ->where('number', 'like', "%{$request->q}%")
                        ->orWhere('tenants.name', 'like', "%{$request->q}%")
                        ->orWhere('amount', 'like', "%{$request->q}%"); 
                }
            )
            ->orderBy('invoices.updated_at', 'desc')
            ->paginate(10);

        $title = 'Delete Invoice';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('invoice.index', compact('invoices', 'searched'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
