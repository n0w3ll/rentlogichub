<?php

namespace App\Http\Controllers;

use App\Events\TransactionPaid;
use App\Http\Requests\TransactionRequest;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $inv = $request->inv;
        $invoices = Invoice::orderBy('created_at', 'desc')->get();

        return view('transaction.create', compact('invoices','inv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        event(new TransactionPaid($transaction));
        return redirect()->route('transaction.index')->with('success', 'Transaction successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
