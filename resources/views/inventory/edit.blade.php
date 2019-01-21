@extends('layouts.app')
@section('content')
<div class="content">
<form method="POST" id="save-form" action="{{ route('inventory.update', [$item->id]) }}">
{{ csrf_field() }}
<div class="col-md-9 col-lg-9 col-sm-9 pull-left" id="inventoryPage">
<h3>Update Item</h3>


    <!-- Example row of columns -->
    <div class="row">

            <input type="hidden" name="_method" value="put">

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="form-group">
                <label for="item name">Name<span class="required">*</span></label>
                <input placeholder="Enter name" id="item-name" required spellcheck="false" class="form-control uppercase" maxlength="100" 
                        name="name"
                        value="{{ $item->name }}"
                        oninput="javascript: if (this.value.length > this.maxLength) 
                                    this.value = this.value.slice(0, this.maxLength);"
                        />
            </div>
            <div class="form-group">
                <label for="item brand">Brand<span class="required">*</span></label>
                <input placeholder="Enter brand" id="item-brand" required spellcheck="false" class="form-control uppercase" maxlength="30" 
                        name="brand"
                        value="{{ $item->brand }}"
                        oninput="javascript: if (this.value.length > this.maxLength) 
                                    this.value = this.value.slice(0, this.maxLength);"
                        />
            </div>
     <!--       <div class="form-group">
                <label for="item model">Model</label>
                <input placeholder="Enter model" id="item-model" required spellcheck="false" class="form-control" maxlength="30" 
                        name="model"
                        value="{{ $item->model }}"
                        oninput="javascript: if (this.value.length > this.maxLength) 
                                    this.value = this.value.slice(0, this.maxLength);"
                        />
            </div> -->


            <div class="form-group">
                <label for="item size">Size</label>
                <input placeholder="Enter size" id="item-size" required spellcheck="false" class="form-control uppercase" maxlength="20" 
                        name="size"
                        value="{{ $item->size }}"
                        oninput="javascript: if (this.value.length > this.maxLength) 
                                    this.value = this.value.slice(0, this.maxLength);"
                        />
            </div>

            <div class="form-group">
                <label for="item color">Color</label>
                <input placeholder="Enter color" id="item-size" required spellcheck="false" class="form-control uppercase" maxlength="20" 
                        name="color"
                        value="{{ $item->color }}"
                        oninput="javascript: if (this.value.length > this.maxLength) 
                                    this.value = this.value.slice(0, this.maxLength);" 
                        />
            </div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">

            <div class="form-group">
                <label for="item type">Type</label>
                {{ Form::select('type', ['BIKE' => 'BIKE',
                                         'PART' => 'PART',
                                         'ACCESSORY' => 'ACCESSORY',
                                         'TOOL' => 'TOOL',
                                         'APPAREL' => 'APPAREL',
                                         'SERVICE' => 'SERVICE'],
                                          $item->type,
                                          ['class' => 'form-dropdown form-control']
                                          ) }}
            </div>
            <div class="form-group">
                <label for="item price">Price</label>
                {{ Form::number('price', $item->price,
                                ['class' => 'form-control txtDecimals defaultZero',
                                'onkeypress' =>'return isDecimal(event)' ]
                                ) }}
            </div>
            <div class="form-group">
                <label for="item stock">Stock</label>
                {{ Form::number('stock', $item->stock,
                                ['class' => 'form-control notext defaultZero', 
                                 'min' => '0',
                                 'id' => 'stock',
                                 'onkeypress' => 'return isNumberKey(event)']
                                ) }}
            </div>

        </div>
                
         <!--   <div class="form-group">
                <input type="submit" class="btn btn-primary"
                        value="submit"/>
            </div>-->
        </form>

    </div>
</div>

<!-- Start SideBar-->
<div class="col-sm-3 col-md-3 col-lg-3 pull-right" id="actions-sidebar">
    <div class="sidebar-module">
      <h4>Actions</h4>
      <ol class="list-unstyled">

      @if(Auth::user()->role == 'admin')
        <li>
          <a
          href="#"
            onclick="
            var result = confirm('Are you sure you want to save changes?');
              if(result){
                event.preventDefault();
                document.getElementById('save-form').submit();
              }">
            
              <i class="far fa-save"></i> Save
            </a>
        </li>
      @endif

        <li><a href="/inventory/{{ $item->id }}"><i class="fas fa-ban"></i> Cancel</a></li>
      </ol>
    </div>

</div>
</form>
<!-- End SideBar-->
</div>
@endsection
