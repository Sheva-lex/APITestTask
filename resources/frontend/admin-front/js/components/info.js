function show_input(e) {
    var $this = e;
    var input = $('<textarea ></textarea>', {
        'type': 'text',
        'name': 'value',
        'data-value' : $(this).text(),
        'data-item' : $this.data('item'),
        'style': 'min-height:35px;width:'+(($this.width()+25)*1.3)+'px;height:'+($this.height()+5)+'px',
        'class': 'info_value form-control',
        'text': $this.text()
    });$this.parent().prepend('<span class="info_reset btn btn-danger m-l"><i class="fa">&#xf00d;</i></span><span class="info_save btn btn-primary m-l m-r"><i class="fa fa-check"></i></span>');
    $this.replaceWith(input);
}

function remove_input($this) {
    var input = '<div class="info_value" data-item="' + $this.find('.info_value').data('item') + '">' + $this.closest('.info_column').data('value') + '</div>';
    $this.html(input);
}

$('.info_visible').on('change', function () {
    i = 0;
    if ($(this).is(':checked')) i = 1;
    $.ajax({
        type: "POST",
        url: $(this).data('item'),
        data: 'visible=' + i + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
        success: function (response) {
            if (response.visible == 1) {
                swal("Активовано!", "Тепер це поле буде відображатись на сайті.", "success");
            } else {
                swal("Закрито!", "Тепер це поле приховане.", "success");
            }
        },
        dataType: 'json'
    });
});

$('table').on('dblclick', 'div.info_value', function () {
    show_input($(this));
});
$('table').on('click', '.info_reset', function () {
    remove_input($('#info'+$(this).closest('.info_column').data('key')));
});
$('table').on('click', '.info_save', function () {
     var $this = $(this).closest('.info_column').find('textarea.info_value');
    val =$(this).closest('.info_column').data('value');
    $.ajax({
        type: "POST",
        url: $this.data('item'),
        data: 'value=' + $this.val() + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
        success: function (response) {
            swal("Успішно!", "Поле відредаговано.", "success");
            var input = '<div class="info_value" data-item="' + $this.data('item') + '">' + response.value + '</div>';
            $('#info'+response.id).data('value',response.value);
            $('#info'+response.id).html(input);
        },
        error: function (response) {
            $this = $(this).closest('.info_column').find('textarea.info_value');

            swal("Помилка!", "Щось пішло не так!", "error");
            var input = '<div class="info_value" data-item="' + $this.data('item') + '">' + $(this).closest('.info_column').data('value') + '</div>';
            $('#info'+$this.data('item')).html(input);
        },
        dataType: 'json'
    });

});
