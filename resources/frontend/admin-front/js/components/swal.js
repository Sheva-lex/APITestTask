swal =  require('sweetalert');

$('.delete-alert').on('click', function (event) {
    event.preventDefault()
    let $this = $(this)
    const url = $this.data('action')
    swal({
        title: $this.data('title'),
        text: $this.data('text'),
        icon: 'warning',
        buttons: ['Скасувати', 'Видалити'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: {
                        _method: 'DELETE'
                    },
                    dataType: 'JSON',
                    url: url,
                    success: function (response) {
                        if (response.success){
                            swal($this.data('success'), {
                                icon: 'success',
                            })
                            setTimeout(() => {
                            window.location.reload()
                        }, 1000)
                        }else{
                            console.log(response)
                            swal($this.data('error-title'), $this.data('error'), 'error')
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText) // this line will save you tons of hours while debugging
                        // do something here because of error
                    }
                })
            } else {
                swal($this.data('error-title'), $this.data('error'), 'error')
            }
        })
});

$('.status-alert').on('change', function (event) {
    event.preventDefault();
    let status = 0;
    if($(this).is(':checked')) status = 1;
    const url = $(this).data('href');
    swal({
        title: "Change?",
        text: "You are about to change your status!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if(willDelete) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "POST",
                url: url,
                data: 'status='+status,
                success: function() {
                    swal("Status changed!", {
                        icon: "success",
                    });
                }
            });
        } else {
            swal("Canceled "," Status Change Canceled ", "error");
        }
    });
});