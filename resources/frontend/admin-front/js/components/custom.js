$('document').ready(function(){
    var _token = $('meta[name="csrf-token"]').attr('content');

    $(document).on("click", ".delete_obj", function (e) {
        e.preventDefault();
        var ele = $(this).data("id");
        var url = $(this).data("route");

        var row = $(this).parent().parent().attr('id');
        if(confirm("Are you sure")) {
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    _token: _token,
                    id: ele
                },
                success: function (response) {
                    $('#' + row).remove();
                    return false;
                }
            });
        }
    });


    $(document).on("click", "#notify-btn", function (e) {
        e.preventDefault();
        var ele = $(this).data("id");
        var url = $(this).data("route");

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    _token: _token,
                    id: ele
                },
                success: function (response) {
                    $('#notify-num').remove();
                    return false;
                }
            });
    });

});


