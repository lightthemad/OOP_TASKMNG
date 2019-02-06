$(document).ready(function () {

    let passresp = 0;
    let loginresp = 0;

    $('.nick').focusout( function() {

        let nick = $(this).val();

        $.ajax({

            url:"check?id="+nick,

            success: function (response) {

                console.log(response);

                if(response == "yes" ){
                    $('.nickErrorMsg').html("Username is already taken");
                    loginresp = 0;

                }else if (response == "no" ){

                    $('.nickErrorMsg').html("Username isn't taken");
                    loginresp = 1;
                }

                if($('.nick').val().length === 0){ $('#nickErrorMsg').html (" ");}

                if(passresp === 1 && loginresp === 1){
                    $('.register').css("display", "inline");
                }else{
                    $('.register').css("display", "none");
                }

            }
        });

    });

    $('.pass').on('keydown', function () {

        let pass = $(this).val();

        if(pass.match(/[A-Z]/) && pass.match(/[a-z]/) && pass.match(/[0-9]/))
        {
            $(".passwordErrorMsg").html("Password is good");
            passresp = 1;
        }
        else
        {
            $(".passwordErrorMsg").html("Your password must be between 6 and 20 characters. It must contain a mixture of upper and lower case letters, and at least one number or symbol.");
            passresp = 0;
        }
        if($('.pass').val().length === 0){ $('.passwordErrorMsg').html (" ");}

        if(passresp === 1 && loginresp === 1){
            $('.register').css("display", "inline");
        }else{
            $('.register').css("display", "none");
        }

    });

});