<div class="modal modal-primary fade" tabindex="-2" id="test" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">

                </h4>
            </div>
            <div class="modal-body" id="bulk_edit_modal_body">


              <form method="POST" id="create-form" action="{{ route('inventory.store') }}">
              {{ csrf_field() }}
              <div class="col-md-9 col-lg-9 col-sm-9 pull-left" id="inventoryPage">
              <h3>Register Item</h3>


                  <!-- Example row of columns -->
                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="item name">Name<span class="required">*</span></label>
                            <input placeholder="Enter name" id="item-name" required spellcheck="false" class="form-control uppercase" maxlength="100"
                                    name="name"
                                    oninput="javascript: if (this.value.length > this.maxLength)
                                                this.value = this.value.slice(0, this.maxLength);"
                                    />
                        </div>
                        <div class="form-group">
                            <label for="item brand">Brand</label>
                            <input placeholder="Enter brand" id="item-brand" required spellcheck="false" class="form-control uppercase" maxlength="30"
                                    name="brand"
                                    oninput="javascript: if (this.value.length > this.maxLength)
                                                this.value = this.value.slice(0, this.maxLength);"
                                    />
                        </div>
                        <div class="form-group">
                            <label for="item model">Model</label>
                            <input placeholder="Enter model" id="item-model" required spellcheck="false" class="form-control uppercase" maxlength="30"
                                    name="model"
                                    oninput="javascript: if (this.value.length > this.maxLength)
                                                this.value = this.value.slice(0, this.maxLength);"
                                    />
                        </div>
                        <div class="form-group">
                            <label for="item size">Size</label>
                            <input placeholder="Enter size" id="item-size" required spellcheck="false" class="form-control uppercase" maxlength="20"
                                    name="size"
                                    oninput="javascript: if (this.value.length > this.maxLength)
                                                this.value = this.value.slice(0, this.maxLength);"
                                    />
                        </div>

                        <div class="form-group">
                            <label for="item color">Color</label>
                            <input placeholder="Enter color" id="item-size" required spellcheck="false" class="form-control uppercase" maxlength="20"
                                    name="color"
                                    oninput="javascript: if (this.value.length > this.maxLength)
                                                this.value = this.value.slice(0, this.maxLength);"
                                    />
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                      <div class="form-group">
                          <label for="item type">Type</label>
                          {{ Form::select('type', ['BIKE' => 'BIKE',
                                                   'FRAMESET' => 'FRAMESET',
                                                   'PART' => 'PART',
                                                   'ACCESSORY' => 'ACCESSORY',
                                                   'TOOL' => 'TOOL',
                                                   'APPAREL' => 'APPAREL',
                                                   'SERVICE' => 'SERVICE'],
                                                    '',
                                                    ['class' => 'form-dropdown form-control']
                                                    ) }}
                      </div>
                      <div class="form-group">
                          <label for="item price">Price</label>
                          {{ Form::number('price', '0',
                                          ['class' => 'form-control txtDecimals defaultZero',
                                          'onkeypress' =>'return isDecimal(event)' ]
                                          ) }}
                      </div>
                      <div class="form-group">
                          <label for="item stock">Stock</label>
                          {{ Form::number('stock', '0',
                                          ['class' => 'form-control notext defaultZero',
                                           'min' => '0',
                                           'id' => 'stock',
                                           'onkeypress' => 'return isNumberKey(event)']
                                          ) }}
                      </div>
                        <div class="form-group">
                          <label for="item barcode">Barcode</label>
                          <input placeholder="Enter barcode" id="item-barcode" required spellcheck="false" class="form-control" maxlength="50"
                                  name="barcode"
                                  oninput="javascript: if (this.value.length > this.maxLength)
                                              this.value = this.value.slice(0, this.maxLength);"
                                  />
                        </div>
                    </div>

                  </div>
              </div>
              </form>
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
                          var result = confirm('Are you sure you want to register item?');
                            if(result){
                              event.preventDefault();
                              document.getElementById('create-form').submit();
                            }">

                            Save
                          </a>
                      </li>
                    @endif

                      <li><a href="/inventory">Cancel</a></li>
                    </ol>
                  </div>

              </div>
              </form>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary pull-right edit-confirm"
                         value="submit">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                    cancel
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
