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

    $('.adminmaker').on('click', function () {
        let adminid = $(this).attr('id');

        $.ajax({
            url: "makeadmin?id="+ adminid,
            success: function () {
                location.reload();
            }
        });

    });

});
