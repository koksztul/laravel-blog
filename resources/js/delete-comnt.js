$(function() {
    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure that you want to remove this comment?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            var $this = $(this);
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: $(this).data("url"),
                    data: {
                        "_token": $this.closest(".action").find("input[type=hidden]").val()
                        }
                })
                .done(function( data ) {
                    $this.closest(".card").fadeOut(500);
                    var count = parseInt($("#com_count").text());
                    count--;
                    $("#com_count").text(count).fadeOut(500);
                })
                .fail(function( data ) {
                    Swal.fire('Oops...', data.responseJSON.message, 'error');
                });
            }
        })
    });         
});   