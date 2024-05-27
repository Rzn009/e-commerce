<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class MyTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myTransaction = Transaction::with(['user'])->where('user_id', auth()->user()->id)->get();
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        return view('pages.admin.my-transaction.index', compact('myTransaction','transaction'));
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
    public function show($name)
    {
        $transactionItem = TransactionItem::with('product')->where('transaction_id','name',$name)->get();
        return view('pages.admin.my-transaction.show', compact('transactionItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function showDataBySlugAndId($slug, $id)
    {
        $transaction = Transaction::where('slug', $slug)->where('id', $id)->firstOrFail();

        return view('pages.admin.my-transaction.show', compact('transaction'));
    }
}
