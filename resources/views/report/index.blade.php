@extends('layouts.app')
@section('content')
<?php
    $today = Carbon\Carbon::now('Asia/Manila')->format('Y-m-d');
    $fileName = "BicycleMd_Transactions_".$today;
?>
<div class="content">
 <h3>Report</h3>
<form method="GET" id="report-form" action="{{ route('reports.displayReport') }}">
        <div>
                <span style="margin-bottom: 5px; margin-right: 5px;">
                <label for="item stock">From</label>
                {{ Form::date('dateFrom', \Carbon\Carbon::now()) }}
                </span>

                <span style="white-space: nowrap; margin-bottom: 5px; margin-right: 5px;">
                <label for="item stock">To</label>
                {{ Form::date('dateTo', \Carbon\Carbon::now()) }}
                </span>
                <span>
                    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> View</button>
                </span>
        </div>
</form>
<br>
<div class="row">

    <div style="margin-left:10px; margin-right:10px;">
        <table class="table table-striped table-condensed" id="myTable"
                data-toggle="table" 
                data-pagination="true"
                data-search="true"
                data-page-size="10"
                data-show-export="true"
                data-export-types={'excel','csv'}
                data-export-data-type="all"
                data-export-options='{"fileName": "{{ $fileName }}"}'
                >
           <thead class="thead-dark">
                <tr>
                   
                    <th data-field="txn_no" data-sortable="true" data-align="center">No.</th>
                    <th data-field="item_name" data-sortable="true" data-align="center">Item name</th>
                    <th data-align="center">Description</th>
                    <th data-field="price" data-sortable="true" class="center">Price</th>
                    <th data-field="quantity" data-sortable="true" data-align="center">Quantity</th>
                    <th data-field="amount" data-sortable="true" class="center">Sub Amount</th>
                    <th data-field="discount_rate" data-sortable="true" class="center">Discount</th>
                    <th data-field="discounted_amount" data-sortable="true" class="center">Total Amount</th>

                </tr>
                <tbody>
                  @foreach($transactions as $key => $txn)
                    <tr>
               
                        <td> {{ ++$key }} </td>
                        <td> {{ $txn->item->name }} </td>
                        <td> {{ $txn->item->brand . ' ' . $txn->item->color . ' ' . $txn->item->size}} </td>
                        <td class="text-right"> {{ number_format($txn->item->price,2) }} </td>
                        <td> {{ $txn->quantity }} </td>
                        <td class="text-right"> {{ number_format($txn->item->price * $txn->quantity , 2) }} </td>
                        <td> {{ $txn->discount_rate }} %</td>
                        @if($txn->discount_rate  == 0)
                            <td class="text-right">{{ number_format($txn->item->price * $txn->quantity,2)}}</td>
                        @else
                            <td class="text-right">{{ number_format(
                                ($txn->item->price * $txn->quantity) -
                                (($txn->item->price * $txn->quantity) * ($txn->discount_rate/100)), 2) }}</td>
                        @endif
                    </tr>
                  @endforeach
                </tbody>
            </thead>
        </table>
        <div class="pull-right">
            <?php $totalFinalAmount = 0;
            foreach($transactions as $key => $txn)
            {
                $totalAmount = ($txn->item->price * $txn->quantity);

                if($txn->discount_rate  == 0){
                    $totalFinalAmount+= $totalAmount;
                }else{
                    $totalFinalAmount+= $totalAmount - ($totalAmount * $txn->discount_rate/100);
                }
            }
            ?>
            <p>Total: {{ number_format($totalFinalAmount, 2) }}</p>
        </div>
    </div>
</div>
</div>
@endsection
