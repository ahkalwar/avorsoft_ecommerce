$(document).ready(function () {
    $(".btn-register").click(function(){
        var formdata = $("#register-form").serialize();
        $.post(baseurl+"/customer_register", formdata, function(res){
            if(res.success == true){
                // location.reload();
                $('.success-msg').html('Successfully Registered');
                $('.msg-div').show('slow');
            }
            else{
                if(res.errors){
                    $.each(res.errors, function(index, value){
                        $("."+index+"_error").html(value[0]);
                    });
                }
            }
        });
    });
    $(".btn-login").click(function(){
        var formdata = $("#login-form").serialize();
        $.post(baseurl+"/customer_login", formdata, function(res){
            console.log(res);
            if(res.success == true){
                location.reload();
            }
            else{
                alert('Invalid Email or Password. Please try again!');
            }
        });
    });
    $(".add_item_to_cart").on('submit', function(e){
        e.preventDefault();
        var fields = $(this).serialize();
        $.post(baseurl+"/add_item_to_cart", fields, function(res){
            console.log(res);
            $(".cart-count").text(res);
            $(".cart-count").css('display', 'flex');
        });        
    });
    $(".checkout_btn").click(function(){
        var fields = $("#order_form").serialize();
        $.post(baseurl+"/place_order", fields, function(res){
            if(res.success == true){
                $(".main").hide();
                $(".thankyou").show();
            }
            else{
                alert('There is an issue for placing thee order. Kindly try again!');
            }
        });
    });
});