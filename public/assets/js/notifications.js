

function sendMarkRequest(id = null) {
    var _token = $('meta[name="csrf-token"]').attr('content');

    return $.ajax("/mark-as-read", {
        method: 'POST',
        data: {
            _token,
            id
        }
    });
}

$(document).on('click', '.mark-as-read', function () {
    console.log('read');
    let request = sendMarkRequest($(this).data('id'));
    request.done(() => {
        $(this).parents('div.alert').remove();
        if ($('.noti-container').is(':empty')) {
            $('#mark-all').hide();
        }
        location.reload();
    });

});
$(document).on('click', '#mark-all', function () {
    console.log('read all');
    let request = sendMarkRequest();
    request.done(() => {
        $('div.alert').remove();
        location.reload();
    })
});