$(document).ready(function() {

    loadcart();
    
    $('.vhod').click(function(){
        $('.login-form').fadeIn();
         $('.contact_form').fadeOut();
         $('.login-form-vos').fadeOut();
    });

     $('.close').click(function(){
        $('.login-form').fadeOut();
        $('.login-form-vos').fadeOut();
    });
    $('.reg').click(function(){
        $('.contact_form').fadeIn();
        $('.login-form').fadeOut();
        $('.login-form-vos').fadeOut();
    });

     $('.close-reg').click(function(){
        $('.contact_form').fadeOut();
    });

     $('#contact_form').validate({   
                  rules:{
                       
                       "fio":{
                           required:true,
                           minlength:5,
                           maxlength:40
                       },
                       "pass":{
                           required:true,
                           minlength:6,
                           maxlength:20
                       },
                       "email":{
                           required:true,
                           email:true
                       },
                       "number":{
                           required:true,
                           minlength:6,
                           maxlength:15
                       },
                       "addres":{
                           required:true,
                           minlength:10,
                           maxlength:60
                       }
 
                   },
 
                   messages:{
                       "fio":{
                           required:"Укажите ФИО!",
                           minlength:"От 5 до 40 символов!",
                           maxlength:"От 5 до 40 символов!"
                       },
                      
                       "pass":{
                           required:"Введите пароль!",
                           minlength:"От 6 до 20 символов!",
                           maxlength:"От 6 до 20 символов!"
                       },
                      
                       "email":{
                           required:"Укажите свой E-mail",
                           email:"Не корректный E-mail"
                       },
                       "number":{
                           required:"Укажите Ваш номер телефона!"
                       },
                       "addres":{
                           required:"Укажите Ваш адрес доставки!"
                       },
                       
                   },
 submitHandler: function(form){
   $(form).ajaxSubmit({
   success: function(data) { 
                                
       if (data == 'true')
   {

      $('.contact_form').fadeOut();
      $('.tn-box').addClass('tn-box-active tn-box-color-1').html('<p>Вы успешно зарегестрировались!</p>');

      setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-1").fadeOut();
      }, 5000);
      
   }else{

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>' + data + '</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000);

   }
       } 
 }); 
 }
 }); 

 $("#login").click(function() {
        
 var auth_email = $("#user").val();
 var auth_pass = $(".password").val();

 
 if (auth_email == ""){

   $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Не правельный email или пароль</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000);

    send_email = 'no';
 }else{
    
   send_email = 'yes'; 

}

 
if (auth_pass == ""){

  $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Не правельный email или пароль</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000);

    send_pass = 'no';

 }else{

  send_pass = 'yes';

   }

 if ($("#remember").prop('checked')){

    auth_rememberme = 'yes';

 }else { 

  auth_rememberme = 'no'; 

}



 if ( send_email == 'yes' && send_pass == 'yes' ){

    $.ajax({
  type: "POST",
  url: "../validate/log-pass.php",
  data: "email="+auth_email+"&pass="+auth_pass+"&rememberme="+auth_rememberme,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == "true")
  {
      location.reload();      
  }else{
      $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Не правельный email или пароль</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000);    
  }
  
}
});  
}
});    

$('.forgetPassword').click(function() {

  $('.login-form').fadeOut();
  $('#login-form-vos').fadeIn();

});

$('#login_vos').click(function(){
    
 var recall_email = $("#remind-email").val();
 
 if (recall_email == ""){

     $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Поле email пустое</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000);    

 }else{
  
    
  $.ajax({
  type: "POST",
  url: "../validate/remid-pass.php",
  data: "email="+recall_email,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'yes')
  {
      $('.tn-box').addClass('tn-box-active tn-box-color-1').html('<p>На ваш email выслвн новый пароль</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-1").fadeOut();
    }, 5000); 
 
  }else{

   $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Такой email не найден</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000); 
      
  }
  }
}); 
  }
  });
           
$('#logout, .exit').click(function(){ 
    
    $.ajax({
  type: "POST",
  url: "../validate/logout.php",
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'logout')
  {
      location.reload();
  }
  
}
}); 
});


$('.naw-info').click(function(){

  var fio = $('#my-fio').val();
  var email = $('#my-email').val();
  var number = $('#my-number').val();
  var addres = $('#my-addres').val();
  var pass = $('#my-pass').val();
  var pass2 = $('#my-pass2').val();
  var upload_image = $('.upload_image').val();

    $.ajax({
  type: "POST",
  url: "../validate/new-inform.php",
  data: "naw_fio="+fio+"&naw_email="+email+"&naw_number="+number+"&naw_addres="+addres+"&naw_pass="+pass+"&naw_pass2="+pass2+"&upload_image="+upload_image,
  dataType: "html",
  cache: false,
  success: function(data) {

  if (data == 'true'){

       $('.tn-box').addClass('tn-box-active tn-box-color-1').html('<p>Данные успешно изменены!</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-1").fadeOut();
    }, 5000); 

    window.open('profil.php', '_top');

  }else{

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>' + data + '</p>');

    setTimeout (function(){
        $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
    }, 5000); 
      
  }
  
}
}); 
});

    
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }

  $('.confirm-button-next').click(function(e){   

   var order_fio = $("#order_fio").val();
   var order_email = $("#order_email").val();
   var order_phone = $("#order_phone").val();
   var order_address = $("#order_address").val();
   
 if (!$(".order_delivery").is(":checked")){

    $(".label_delivery").css("color","#E07B7B");

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Выберете способ доставки!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 

    send_order_delivery = '0';

 }else { 

  $(".label_delivery").css("color","black"); 

  send_order_delivery = '1';

  

     if (order_fio == "" || order_fio.length > 50 ){

        $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Заполните поле ФИО!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 

       send_order_fio = '0';
       
     }else { 

      $("#order_fio").css("borderColor","#DBDBDB");  send_order_fio = '1';

    }

  

 if (isValidEmailAddress(order_email) == false){

    $("#order_email").css("borderColor","#FDB6B6");

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Не  коректный email!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 

  send_order_email = '0';   

 }else {

  $("#order_email").css("borderColor","#DBDBDB"); send_order_email = '1';

}
  

 
  if (order_phone == "" || order_phone.length > 50){

    $("#order_phone").css("borderColor","#FDB6B6");

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Введите ваш номер телефона!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 

    send_order_phone = '0';   

 }else { 

  $("#order_phone").css("borderColor","#DBDBDB"); send_order_phone = '1';

}
 

 
  if (order_address == "" || order_address.length > 150){

    $("#order_address").css("borderColor","#FDB6B6");

$('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Выберете ваш адрес!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 

    send_order_address = '0'; 

 }else { 
 
  $("#order_address").css("borderColor","#DBDBDB"); send_order_address = '1';

}
  
} 

 if (send_order_delivery == "1" && send_order_fio == "1" && send_order_email == "1" && send_order_phone == "1" && send_order_address == "1"){
window.open(this.href="cart.php?action=completion");
return false;
 
 }

e.preventDefault();

});

   $('.confirm-button-next-yes-auch').click(function() {


  if ($('.order_delivery').is(":checked")){
  var order_delivery = $('.order_delivery').val();
  var order_note = $('.order_note').val();


}
     $.ajax({
  type: "POST",
  url: "../validate/yes-autch.php",
  data: "order_delivery="+order_delivery+"&order_note="+order_note,
  dataType: "html",
  cache: false,
  success: function(data) {  

    if(data != 'true'){

        $(".label_delivery").css("color","#E07B7B");

    $('.tn-box').addClass('tn-box-active tn-box-color-3').html('<p>Выберете способ доставки!</p>');

        setTimeout (function(){
            $('.tn-box').removeClass("tn-box-active tn-box-color-3").fadeOut();
        }, 5000); 
      
    }else{

      alert('good');

      window.open(this.href="cart.php?action=completion");
      return false;

    }
    
}
});


  });

  $('.a_demo_three').click(function() {
    var tid = $(this).attr('tid');

     $.ajax({
  type: "POST",
  url: "../validate/addcart.php",
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) {  
    loadcart();
}
});

  });

function loadcart(){
     $.ajax({
  type: "POST",
  url: "../validate/loadcart.php",
  dataType: "html",
  cache: false,
  success: function(data) {
    
  if (data == "0")
  {
  
    $(".cart-menu").html("<p>Корзина пуста</p>");
    $(".cart-lb").html("<span>0</span>");
    $(".info-cart").html('<p>0</p>');
  
  }else
  {
    $(".cart-menu").html('<p>' + data + '</p>');
    $(".cart-lb").html('<spaan>' + data + '</spaan>');
    $(".info-cart").html('<p>' + data + '</p>');
  }  
    
      }
});    
       
}

function fun_group_price(intprice) {  

  var result_total = String(intprice);
  var lenstr = result_total.length;
  
    switch(lenstr) {
  case 4: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4);
    break;
  }
  case 5: {
  groupprice = result_total.substring(0,2)+" "+result_total.substring(2,5);
    break;
  }
  case 6: {
  groupprice = result_total.substring(0,3)+" "+result_total.substring(3,6); 
    break;
  }
  case 7: {
  groupprice = result_total.substring(0,1)+" "+result_total.substring(1,4)+" "+result_total.substring(4,7); 
    break;
  }
  default: {
  groupprice = result_total;  
  }
}  
    return groupprice;
    }


$(function() {
// функцию скролла привязать к окну браузера
$(window).scroll(function(){
    
// distanceTop = (высота: от начала страницы до эл-та #last) -
//- высота окна браузера
var distanceTop = $('.block-product-block').offset().top - $(window).height();
// если величина прокрутки больше distanceTop 
if  ($(window).scrollTop() > distanceTop)
$('.slidebox').animate({'right':'0px'},300);
else
$('.slidebox').stop(true).animate({'right':'-430px'},100);
});
//связываем  function() с событием click для эл-та  .close 
$('.slidebox .close').bind('click',function(){
$(this).parent().remove();
});
});



});

// поисковик по сайту

 function searchToggle(obj, evt){
            var container = $(obj).closest('.search-wrapper');

            if(!container.hasClass('active')){
                  container.addClass('active');
                  evt.preventDefault();
            }
            else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
                  container.removeClass('active');
                  // clear input
                  container.find('.search-input').val('');
                  // clear and hide result container when we press close
                  container.find('.result-container').fadeOut(100, function(){$(this).empty();});
            }
        }

        function submitFn(obj, evt){
            value = $(obj).find('.search-input').val().trim();

            _html = "Yup yup! Your search text sounds like this: ";
            if(!value.length){
                _html = "Yup yup! Add some text friend :D";
            }
            else{
                _html += "<b>" + value + "</b>";
            }

            $(obj).find('.result-container').html('<span>' + _html + '</span>');
            $(obj).find('.result-container').fadeIn(100);

            evt.preventDefault();
        }

$(function(){

    var ul = $('#upload ul');

    $('#drop a').click(function(){
        // Simulate a click on the file input button
        // to show the file browser dialog
        $(this).parent().find('input').click();
    });

    // Initialize the jQuery File Upload plugin
    $('#upload').fileupload({

        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),

        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {

            var tpl = $('<li class="working"><input type="text" value="0" data-width="20" data-height="20"'+
                ' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

            // Append the file name and file size
            tpl.find('p').text(data.files[0].name)
                         .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

            // Add the HTML to the UL element
            data.context = tpl.appendTo(ul);

            // Initialize the knob plugin
            tpl.find('input').knob();

            // Listen for clicks on the cancel icon
            tpl.find('span').click(function(){

                if(tpl.hasClass('working')){
                    jqXHR.abort();
                }

                tpl.fadeOut(function(){
                    tpl.remove();
                });

            });

            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();
        },

        progress: function(e, data){

            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();

            if(progress == 100){
                data.context.removeClass('working');
            }
        },

        fail:function(e, data){
            // Something has gone wrong!
            data.context.addClass('error');

            

        }

    });


    // Prevent the default action when a file is dropped on the window
    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    // Helper function that formats the file sizes
    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }

});

var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
        buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
        totalButtons7Click = buttons7Click.length,
        totalButtons9Click = buttons9Click.length;

      buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
      buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

      function activate() {
        var self = this, activatedClass = 'btn-activated';

        if( classie.has( this, 'btn-7h' ) ) {
          // if it is the first of the two btn-7h then activatedClass = 'btn-error';
          // if it is the second then activatedClass = 'btn-success'
          activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
        }
        else if( classie.has( this, 'btn-8g' ) ) {
          // if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
          // if it is the second then activatedClass = 'btn-error3d'
          activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
        }

        if( !classie.has( this, activatedClass ) ) {
          classie.add( this, activatedClass );
          setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
        }
      }

      document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
        classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
      }, false );




