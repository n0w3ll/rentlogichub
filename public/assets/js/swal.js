$(document).on('click', '.delete-img', function(event) {
    console.log('delete');
    event.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
        title: 'Delete image?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Delete'

    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            event.preventDefault();
        }
    })
});