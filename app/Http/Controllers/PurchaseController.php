<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class PurchaseController extends Controller
{



    public function computeTotal(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $totalAmt = 0;
        if($data!=null){
            for($x = 0; $x<count($data); $x++){
                $totalAmt += $data[$x]['price'] * $data[$x]['quantity'];
            }
            return $totalAmt;
        }
    }

    public function displayCart(Request $request)
    {
            //if(Request::ajax()){
                return 'boom panes';
            //}

        
        //return response()->json(['response' => 'This is get method']);
    }

    public function checkout(Request $request)
    {
     //   parse_str($request->getContent(),$data);

        $data = json_decode($request->getContent(), true);
        $today = Carbon::now('Asia/Manila')->toDateTimeString();


        //print_r($today);
        $withError = 0;
        if(!empty($data)){
            $txn_code = $data[0]['value'];
            $discount_rate = $data[1]['value'];
            $data = $data[3];

            for($x=0;$x<count($data); $x++){
                $transaction = Transaction::create([
                                        'item_id' => $data[$x]['item_id'],
                                        'quantity' => $data[$x]['quantity'],
                                       /* 'model' => $request->input('model'),*/
                                        'txn_date' => $today,
                                        'txn_code' => $txn_code,
                                        'discount_rate' => $discount_rate,
                                        'user_id' => Auth::user()->user_id,
                                        'status' => 'done'
                ]);

                if($transaction){
                    //update stock
                    $inventory = Item::where('id', $data[$x]['item_id'])->decrement('stock', $data[$x]['quantity']);
                    if($inventory){
                        //no error   
                    }
                    else{
                        $withError++;
                        return route('checkout.success');
                    }
                }else{
                    $withError++;
                    return route('checkout.success');
                }
            }


            
            if($withError==0){
                return route('checkout.success');
              //  return response()->json(['success'=>true,'url'=> route('transactions.index')]);
                //return 'success';
                //return redirect()->route('transaction.index')
                //->with('success', 'Transaction registered successfully');
            }
        }
        return route('checkout.success');
       // return back()->withInput()->with('errors','An Error occured');

     //   print_r($data);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $items = Item::all();
            return view('purchase.index', ['items'=>$items] );
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
