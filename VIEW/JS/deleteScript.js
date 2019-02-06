$(document).ready(function () {
    $('.deleter').on('click', function () {
        let deleteid = $(this).attr('id');

        $.ajax({
            url: "delete?id="+ deleteid,
            success: function () {
                location.reload();
            }
        });

    });

});
