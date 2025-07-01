$('form').on('submit', function (e) {
    e.preventDefault();

    let form = $(this);
    let formData = form.serialize();

    $('.text-danger').remove();
    $('.is-invalid').removeClass('is-invalid');

    $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: formData,
        dataType: "json",
        success: function (response) {
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonText: 'OK',
                width: '300px',
                customClass: {
                    popup: 'text-sm p-2',
                    title: 'text-base',
                    confirmButton: 'text-sm px-3 py-1'
                }
            });
            form.trigger('reset');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, message) {
                    let field = $('[name="' + key + '"]');
                    field.addClass('is-invalid');
                    field.after('<div class="text-danger">' + message[0] + '</div>');
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                    icon: 'error',
                    confirmButtonText: 'Close',
                    width: '300px',
                    customClass: {
                        popup: 'text-sm p-2',
                        title: 'text-base',
                        confirmButton: 'text-sm px-3 py-1'
                    }
                });
            }
        }
    });
});
