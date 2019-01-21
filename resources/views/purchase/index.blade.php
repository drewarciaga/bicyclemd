@extends('layouts.app')
@section('content')
<?php
    $fileName = "BicycleMd_Transactions_". Carbon\Carbon::now('Asia/Manila')->format('Y-m-d');
?>
<script type="text/javascript">
$('html').bind('keypress', function(e)
{
   if(e.keyCode == 13)
   {
      return false;
   }
});
</script>
<div class="content">
<form id="addToCartForm" >
    {{ csrf_field() }}
<!-- Start Item Details-->
<div class="col-md-7 col-lg-8 col-sm-7 pull-left" id="item-details">
    <div style="margin-left:10px; margin-right:10px">
        <table class="table table-striped table-condensed center" id="purchaseTable" 
                data-toggle="table" 
                data-pagination="true"
                data-search="true"
                data-page-size="5"
                >
            <thead class="thead-dark">
                <tr>
                	<th data-field="id">Id</th>
                    <!--<th data-field="type" data-sortable="true" class="center">Type</th> -->
                    <th data-field="name" data-sortable="true" class="center">Name</th>
                    <th data-field="brand" data-sortable="true" data-align="center">Brand</th>
                    <!--<th data-field="model" data-sortable="true" data-align="center">Model</th> -->
                    <th data-field="color" data-sortable="true" class="center">Color</th>
                    <th data-field="size" data-sortable="true" class="center">Size</th>
                    <th data-field="price" data-sortable="true" class="center">Price</th>
                    <th data-field="stock" data-sortable="true" data-align="center">Stock</th>
                    <th data-visible="false" data-field="barcode">Barcode</th>
                    <th></th>

                </tr>
                <tbody>

                  @foreach($items as $item)
                    <tr>
                    	<td class="nr-id"> {{ $item->id }} </td>
                       <!-- <td class="nr-type"> {{ $item->type }} </td> -->
                        <td class="nr-name"> {{ $item->name }} </td>
                        <td class="nr-brand"> {{ $item->brand }} </td>
                      <!--  <td class="nr-model"> {{ $item->model }} </td> -->
                        <td class="nr-color"> {{ $item->color }} </td>
                        <td class="nr-size"> {{ $item->size }} </td>
                        <td class="nr-price text-right"> {{ number_format($item->price, 2) }} </td>
                        <td class="nr-stock"> {{ $item->stock }} </td>
                        <td class="nr-barcode"> {{ $item->barcode }} </td>
                        <td>
                        	@if($item->stock > 0)
                        	<button id="addBtn" class="btn btn-success addBtn" type="button">+</button>
                        	@endif
                        </td>
                    </tr>
                  @endforeach


                </tbody>
            </thead>
        </table>
    </div>

    <div style="margin-left:10px; margin-right:10px; margin-top: 70px;">
        <table class="table table-striped table-condensed center" id="servicesTable" 
            data-toggle="table" 
        >
            <thead class="thead-dark2">
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="service" data-sortable="true" class="center">Service</th>
                    <th data-field="price" data-sortable="true" class="center">Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="nr-id"> 999 </td>
                    <td class="nr-name">BIKE WASH</td>
                    <td class="nr-price">100.00</td>
                    <td>
                         <button id="addSrveBtn" class="btn btn-success addSrveBtn" type="button">+</button>

                    </td>
                </tr>
            </tbody>
        </table>


                                 
    </div>
            
        
</div>

</form>
<!-- End Item Details-->

<!-- Start SideBar-->
<div class="col-sm-5 col-md-5 col-lg-4 pull-right" id="actions-sidebar">
    <div class="sidebar-module">
      <h4>Cart</h4>
     <!-- <div id="postRequestData"></div>
      <div id="getRequestData"></div> -->
<form id="cartTableForm">
	<table class="table table-striped table-condensed" id="cartTable">
	 <th>Item</th><th class="center">price</th><th style="padding-left: 10px;" class="center">qty</th><th class="text-right">total</th><th></th>
	</table>

    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <div class="text-right cartDetails" id="subTotal"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">        
            <div class="text-left cartDetails pull-left" >
               
                {{ Form::select('txn_code', ['CASH' => 'CASH',
                                         'CHECK' => 'CHECK',
                                         'CREDIT CARD' => 'CREDIT CARD',
                                         'DEBIT CARD' => 'DEBIT CARD'],
                                          'CASH',
                                          ['class' => '']
                                          ) }}
            </div> 
        </div>
        <div class="col-sm-6">
            <div class="text-right cartDetails">Discount: <input type='text' value='0' id="discount_rate" 
                name="discount_rate" style="width: 35px; height: 22px;" class="text-right" 
                value="0" onkeypress="return isNumberKey(event);"><label> %</label>
            </div>

        </div>
    </div>



        <hr style="margin-bottom:5px;">

        <div class="pull-right totalPurchase" id="total"></div>
        <br><br>

  <button class="btn btn-success center full-width" type="submit" onclick="return checkout();">CHECK OUT <i class="fas fa-arrow-right"></i></button>
  <br><br>
 <!-- <button type="button" id="displayBtn">GET AJAX</button>-->
  <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
</form>



    </div>
  </div>
<!-- End SideBar-->
</div>
@endsection
