<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
           // dump(Auth::user()->id);
            if(Auth::user()->role == 'admin'){
                $items = Item::where('delete_flag', 'N')->get();
                return view('inventory.index', ['items'=>$items] );
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
        return view('inventory.create');
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
        if(Auth::check()){
            $name = $request->input('name');
            if(!empty($name)){
                $name = strtoupper($name);
            }

            $brand = $request->input('brand');
            if(!empty($brand)){
                $brand = strtoupper($brand);
            }

            $model = $request->input('model');
            if(!empty($model)){
                $model = strtoupper($model);
            }

            $color = $request->input('color');
            if(!empty($color)){
                $color = strtoupper($color);
            }

            $type = $request->input('type');
            if(!empty($type)){
                $type = strtoupper($type);
            }

            $size = $request->input('size');
            if(!empty($size)){
                $size = strtoupper($size);
            }

            $barcode = $request->input('barcode');
            if(!empty($barcode)){
                $barcode = strtoupper($barcode);
            }


            $item = Item::create([
                                    'name' => $name,
                                    'brand' => $brand,
                                    'model' => $model,
                                    'color' => $color,
                                    'type' => $type,
                                    'size' => $size,
                                    'price' => $request->input('price'),
                                    'stock' => $request->input('stock'),
                                    'barcode' => $barcode,
                                    'delete_flag' => 'N'
            ]);
            
            if($item){
                return redirect()->route('inventory.show', ['item'=> $item->id])
                ->with('success', 'Item registered successfully');
            }
        }
        return back()->withInput()->with('errors','Error creating new item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $item = Item::find($id);
        //dd($item);
        return view('inventory.show', ['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
        $item = Item::find($id);
        //dd($item);
        return view('inventory.edit', ['item'=>$item]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        $name = $request->input('name');
        if(!empty($name)){
            $name = strtoupper($name);
        }

        $brand = $request->input('brand');
        if(!empty($brand)){
            $brand = strtoupper($brand);
        }

        $color = $request->input('color');
        if(!empty($color)){
            $color = strtoupper($color);
        }

        $type = $request->input('type');
        if(!empty($type)){
            $type = strtoupper($type);
        }

        $size = $request->input('size');
        if(!empty($size)){
            $size = strtoupper($size);
        }
                //save data
        $itemUpdate = Item::where('id', $id)
                                ->update([
                                    'name' => $name,
                                    'brand' => $brand,
                                   // 'model' => $model,
                                    'color' => $color,
                                    'type' => $type,
                                    'size' => $size,
                                    'price' => $request->input('price'),
                                    'stock' => $request->input('stock')
                                ]);

        if($itemUpdate){
            return redirect()->route('inventory.show',['item'=>$id])
            ->with('success','Item update success');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        if(Auth::check()){
            //$itemDelete = Item::where('id', $id)->delete();
            $itemDelete = Item::where('id', $id)->update(['delete_flag' => 'Y']);
            
            if($itemDelete){
                return redirect()->route('inventory.index')
                ->with('success','Item delete success');
            }
                return view('inventory.index', ['items'=>$items] );
        }
        return view('auth.login');
    }
}
