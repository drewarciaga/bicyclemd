<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function displayReport(Request $request){
        if(Auth::check()){
           // $transactions = [];
            $dateFrom = $request->input('dateFrom');
            $dateTo = $request->input('dateTo');

            if($dateFrom == $dateTo){
                $transactions = Transaction::whereDate('txn_date', $dateFrom)->get();
            }else{
                $transactions = Transaction::whereBetween('txn_date', [$dateFrom, $dateTo])->get();    
            }
            
            if($transactions){
                return view('report.index', ['transactions'=>$transactions]);
            }else{
                return redirect()->route('reports.index')
                ->with('errors','No items found');
            }
        }
        return view('auth.login'); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                $transactions = [];
                return view('report.index', ['transactions'=>$transactions]);    
            }else{
                return view('noaccess');
            }
            
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
