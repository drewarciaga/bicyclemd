@extends('layouts.app')
@section('content')
<?php
    $fileName = "BicycleMd_Inventory_" . Carbon\Carbon::now('Asia/Manila')->format('Y-m-d');
?>
<div class="content">
<h3>Inventory</h3>

<div class="row">
@include('partials.register')
    <div style="margin-left:10px; margin-right:10px;">
        <table class="table table-striped table-condensed inventoryTable" id="myTable"
                data-toggle="table"
                data-pagination="true"
                data-search="true"
                data-page-size="10"
                data-show-export="true"
                data-export-types={'excel','csv'}
                data-export-data-type="all"
                data-export-options='{"fileName": "{{ $fileName }}"}'
                data-toolbar="#addItem"
                >
            <thead class="thead-dark">
                <tr>
                    <th data-field="type" data-sortable="true" class="center">Type</th>
                    <th data-field="name" data-sortable="true" class="center">Name</th>
                    <th data-field="brand" data-sortable="true" data-align="center">Brand</th>
                   <!-- <th data-field="model" data-sortable="true" data-align="center">Model</th> -->
                    <th data-field="color" data-sortable="true" class="center">Color</th>
                    <th data-field="size" data-sortable="true" class="center">Size</th>
                    <th data-field="price" data-sortable="true" class="center">Price</th>
                    <th data-field="stock" data-sortable="true" data-align="center">Stock</th>
                    <th data-visible="false" data-field="barcode">Barcode</th>

                </tr>
                <tbody>
                  @foreach($items as $item)
                    <tr>
                        <td> {{ $item->type }} </td>
                        <td><a href="/inventory/{{ $item->id }}"> {{ $item->name }} </a></td>
                        <td> {{ $item->brand }} </td>
                      <!--  <td> {{ $item->model }} </td> -->
                        <td> {{ $item->color }} </td>
                        <td> {{ $item->size }} </td>
                        <td class="text-right"> {{ number_format($item->price, 2) }} </td>
                        <td class="nr-stock"> {{ $item->stock }} </td>
                        <td> {{ $item->barcode }} </td>
                    </tr>
                  @endforeach
                </tbody>
            </thead>
        </table>

    </div>
</div>
<div id="addItem">
  <a href="#" onclick="register()"><button class="btn btn-default" id="register_btn">Register new item</button></a>
</div>

</div>

<script type="text/javascript">
function register(){
  $('#test').modal('show');
}


</script>
@endsection
