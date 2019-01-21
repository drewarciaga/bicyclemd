@extends('layouts.app')
@section('content')
<div class="content">
<div style="padding-bottom: 10px;"><a href="/inventory"><i class="far fa-arrow-alt-circle-left padding-r3"></i>Back to Inventory</a></div>
<!-- Start Tiem Details-->
<div class="col-md-9 col-lg-9 col-sm-9 pull-left" id="item-details">

  <!-- Jumbotron -->

  <div class="row well well-lg thead-dark clearfix">
    <h3 class="no-margin">{{ $item->name}}</h3>
    <br />

      <div class="col-md-5 col-lg-5 col-sm-5">
        <table id="item-table">
          <tr>
            <td><b>Type: </b></td>
            <td>{{$item->type}}</td>
          </tr>
          <tr>
            <td><b>Brand: </b></td>
            <td>{{$item->brand}}</td>
          </tr>
         <!-- <tr>
            <td><b>Model: </b></td>
            <td>{{$item->model}}</td>
          </tr> -->
          <tr>
            <td><b>Color: </b></td>
            <td>{{$item->color}}</td>
          </tr>
          <tr>
            <td><b>Size: </b></td>
            <td>{{$item->size}}</td>
          </tr>
          <tr>
            <td><b>Price: </b></td>
            <td>{{number_format($item->price,2)}}</td>
          </tr>
          <tr>
            <td><b>Stock: </b></td>
            <td>{{$item->stock}}</td>
          </tr>
        </table>
        <br/>
      </div>
      <!-- start image-->
      <?php
        $file = './images/' . $item->type . '/' . $item->name . '.jpg';
        $fileColored = './images/' . $item->type . '/' . $item->name . '-' . $item->color . '.jpg';
        if(file_exists($fileColored)){
          $displayImg = $fileColored;
          $imgUrl = "/images/" . $item->type . "/" .$item->name . "-" . $item->color . ".jpg";
        }else{
          $displayImg = $file;
          $imgUrl = "/images/" . $item->type . "/" .$item->name  . ".jpg";
        }
      ?>
      @if (file_exists($displayImg)) 
      <div class="col-md-7 col-lg-7 col-sm-7 center">
           <img class="img-resonsive img-inventory" src="{{URL::asset($imgUrl)}}" />
      </div>
      @endif
      <!-- end image-->
  </div>
</div>
<!-- End Item Details-->

<!-- Start SideBar-->
<div class="col-sm-3 col-md-3 col-lg-3 pull-right" id="actions-sidebar">
    <div class="sidebar-module">
      <h4>Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/inventory/{{ $item->id }}/edit"><i class="far fa-edit padding-r3"></i>Edit</a></li>
      <!-- <li><a href="/inventory/create">Restock</a></li> -->
  
      @if(Auth::user()->role == 'admin')
        <li style="margin-top:5px;" >
          <a
          href="#"
            onclick="
            var result = confirm('Are you sure you want to delete this item from inventory?');
              if(result){
                event.preventDefault();
                document.getElementById('delete-form').submit();
              }">
            
              <i class="far fa-trash-alt padding-r3"></i> Delete
            </a>

              <form id="delete-form" action="{{ route('inventory.destroy', [$item->id]) }}"
                method="POST" style="display:none;">
                <input type="hidden" name="_method" value="delete">
                {{ csrf_field() }}
              </form>
        </li>
      @endif
        <br/>    
      </ol>
    </div>
  </div>
<!-- End SideBar-->
</div>
@endsection
