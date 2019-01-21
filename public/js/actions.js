$(document).ready(function(){
    $('.uppercase').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
});

//check if inputted amount is positive
function isAmountPositive(amount){
    amount = amount.toString().replace(/\$|\,/g,'');//.replace(',','');
    if (parseFloat(amount) <= 0 && isFinite(amount)) { 
        //alert('Please enter positive value');
        return false;
    } else return true;
}

//Keypress, accept only numbers
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    
    return true;
}

function isDecimal(evt){
	
	var value = $('.txtDecimals').val();

	var charCode = (evt.which) ? evt.which : evt.keyCode
	if(charCode == 46 && value.indexOf(".") != -1)
		return false;

	if(charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}
	return true;

}

//format 
function checkSpecialCharacter(that){
    if(/^[a-zA-Z0-9 ]*$/.test(that.value) == false) {
        alert('No special characters allowed for this field.');
        that.value="";
        return false;
    }
    return true;
}

function isAlphaNumericOnly(e){
   var key;
    document.all ? key=e.keycode : key=e.which;
    return((key>47 && key<58)||(key>64 && key<91)||(key>96 && key<123)|| key==32 || key==8 || key==9);
}

function inputLimiter(e) {
    var AllowableCharacters = '';
    AllowableCharacters='1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
    if (k!=13 && k!=8 && k!=0){
        if ((e.ctrlKey==false) && (e.altKey==false)) {
        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
        } else {
        return true;
        }
    } else {
        return true;
    }
}

function inputLimiter(e,allow) {
    var AllowableCharacters = '';
    if (allow == 'KeyboardChars'){AllowableCharacters='!@#$%^&*()+1234567890-=QWERTYUIOPqwertyuiopASDFGHJKL:asdfghjkl;ZXCVBNM?zxcvbnm,./[]<>` ';}
    if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';}
    if (allow == 'Numbers'){AllowableCharacters='1234567890';}
    if (allow == 'NameCharacters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz,;-.\'';}
    if (allow == 'NameCharactersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-\'';}
    if (allow == 'LettersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';}

    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
    if (k!=13 && k!=8 && k!=0){
        if ((e.ctrlKey==false) && (e.altKey==false)) {
        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
        } else {
        return true;
        }
    } else {
        return true;
    }
}

function isAlphaNumeric(e){ // Alphanumeric only 58,45,44,39,46,64,40,41,35,38
    var key;
    document.all ? key=e.keycode : key=e.which;
    return((key>47 && key<58)||(key>64 && key<91)||(key>96 && key<123)||key==0 || key==8 || key==20 || key==32
            || (key>=44 && key<=46) || (key>=38 && key<=41) || key==64 || key==58 || key==35 || key==38 || key==59 || key==47); //this row is for special chars
 }

//format inputted amount to currency
function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g,'');
    if(isNaN(num))
    num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num*100+0.50000000001);
    cents = num%100;
    num = Math.floor(num/100).toString();
    if(cents<10)
    cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
    num = num.substring(0,num.length-(4*i+3))+','+
    num.substring(num.length-(4*i+3));
    return (((sign)?'':'-') + num + '.' + cents);
}

$(document).ready(function() {
	$('.defaultZero').on('change blur',function(){
      if($(this).val().trim().length === 0){
        $(this).val(0);
      }
    })
});



