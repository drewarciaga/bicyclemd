var cartTable = [];
$(document).ready(function(){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).on('click', '#displayBtn',function(event){
      $.ajax({
      type:"GET",
      url: "displayCart",
      success: function(data){
        //console.log(data);
        //$('#getRequestData').append(data);
      }
    });

  }); 

  $('#cartTableForm').on('submit', function (event) {
    event.preventDefault();
    

var data = $('#cartTableForm').serializeArray();
data.push(cartTable);
console.log(data);
        $.ajax({
          type: "POST",
          url: 'checkout',
          data: JSON.stringify(data),
          contentType: "json",
          processData: false,
          success: function(data) {
            console.log(data);
            alert('transaction successful');
            window.location = data + "/success";

          },
          error: function(data) {
            console.log(data);
            alert('an error occured');
            window.location = data + "/error";
          }
        });
  });

});

$(document).on('change', '.qtyInput',function(event){

      var $row = $(this).closest("tr");    // Find the row
      var $price = $row.find(".nr-price").text().replace(',','');
      var $id = $row.find(".nr-id").text();
      var quantity = $(this).val();
      var totalAmt = $price * quantity;

      var withCommas = Number(totalAmt).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
      $row.find(".nr-total").text(withCommas);

      var index = -1;
      filteredObj = cartTable.find(function(item, i){
      if(item.item_id === $.trim($id)){
        index = i;
        return i;
      }
      });

      if(index>=0){
        cartTable[index].quantity = quantity;
        computeSubtotal();
      }else{
        alert('Error:index='+index);
      }
});

$(document).on('click', '.addBtn',function(event){
  var $row = $(this).closest("tr");    // Find the row
  var $id = $row.find(".nr-id").text(); // Find the text
  var $name = $row.find(".nr-name").text();
  var $price = $row.find(".nr-price").text();
  var $stock = $row.find(".nr-stock").text();
  var priceFloat = 0;

  if($price!=null){
    priceFloat = parseFloat($price.replace(',',''))
  }
     
  if(isDuplicateCartTable($id)){
    //update carttable quantity
  }else{
    var newItem = {
      item_id: $.trim($id),
      price: priceFloat,
      quantity: '1'
    };
    cartTable.push(newItem);
    addRowToCart($id, $name, $price, $stock);
    //console.log(cartTable);
  }
  computeSubtotal();
});

$(document).on('click', '.addSrveBtn',function(event){
  var $id = '999'; 
  var $name = 'BIKE WASH';
  var $stock = "1";
  var $price = '100.00';
  var priceFloat = 0;

  if($price!=null){
    priceFloat = parseFloat($price.replace(',',''))
  }
     
  if(isDuplicateCartTable($id)){
    //update carttable quantity
  }else{
    var newItem = {
      item_id: $.trim($id),
      price: priceFloat,
      quantity: '1'
    };
    cartTable.push(newItem);
    addRowToCart($id, $name, $price, $stock);
    //console.log(cartTable);
  }
  computeSubtotal();
});


$(document).on('click', '.removeBtn',function(event){
  var $row = $(this).closest("tr");    // Find the row
  var selectedId = $row.find(".nr-id").text();

  var index = -1;
  filteredObj = cartTable.find(function(item, i){
  if(item.item_id === $.trim(selectedId)){
    index = i;
    return i;
  }
  });

  if(index>=0){
    cartTable.splice(index,1);
  }else{
    alert('Error:index='+index);
  }

  computeSubtotal();
  $(this).closest("tr").remove();
          
});
function addRowToCart(id, name, price, stock){
  var insertRow = "<tr>" +
                  "<td class='nr-id' style='display:none'>" + id + "</td>" +
                  "<td style='width:100px'>" + name + "</td>" +
                  "<td class='nr-price text-right' style='padding-right:5px'>" + price + "</td>" +
                  "<td style='padding-left:10px;'><input class='qtyInput' type='number' value='1' min=1 max='"+ $.trim(stock) + "'" + 
                  "style='width:40px'></input></td>" +
                  "<td class='nr-total text-right' >" + price.toLocaleString('en') + "</td>" +
                  "<td><span><a href='#' class='removeBtn'><i class='fas fa-minus-circle' style='color:red;'></i></a></span></td>"
                  "</tr>";
  $(insertRow).appendTo("#cartTable");
}



function isDuplicateCartTable(id){
    if(cartTable.length>0){
        for(x=0;x<cartTable.length;x++){
              if(cartTable[x].item_id == $.trim(id)){
                return true;
              }
        }
    }
    return false;
}

function computeSubtotal(){
  $.ajax({
    type:"POST",
    url: "computeTotal",
    data: JSON.stringify(cartTable),
    contentType: "json",
    processData: false,
    success: function(data){
      //console.log(data);
      var formatSubTotal = Number(data).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
      $('#subTotal').html('SubTotal: ' + formatSubTotal);
      computeTotal();
    }
  });
}

function checkout(){
  if(cartTable.length==0){
    alert('No items selected');
    return false;
  }else{
    return true;
  }
}


$(document).on('change blur keypress', '#discount_rate',function(event){

  if(cartTable.length>0){
    computeSubtotal();
  }
});


function computeTotal(){
  var subTotal = $('#subTotal').text().replace('SubTotal: ','').replace(',','');

  if(subTotal){
    var discountRate = $('#discount_rate').val();
    var discountAmt = 0;
    var final = parseFloat(subTotal);
    if(discountRate>0){
      discountAmt = subTotal * discountRate/100;
      final = subTotal - discountAmt;
    }
    
    var formatTotal = Number(final).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    $('#total').html('Total: ' + formatTotal);
  }
}


