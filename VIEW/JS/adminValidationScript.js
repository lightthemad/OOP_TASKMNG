$(document).ready(function () {

    let nick = $('.admincheck').val();


    $.ajax({

        url:"ifadmin?id="+nick,

        success: function (response) {

            console.log(response);

            if(response == "yes"){
                $('#showusers').css("display", "inline");
                $("#a").html("ADMIN");
            }
            else{
                $("#a").html("NOTADMIN");
            }


        },

        error: function (error) {
            console.log(error);
        }
    });
})