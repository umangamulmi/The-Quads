$(document).ready(function () {
    var pincode = '';
    var dialog_title = '';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#pincodeModal').on('show.bs.modal', function (e) {
        $('#pincode').pincodeInput().data('plugin_pincodeInput').clear();
        $('#pincode').pincodeInput().data('plugin_pincodeInput').focus();
        $(".pin-status").text('');
        var title = $(e.relatedTarget).data('title');
        if (title.length > 0)
            dialog_title = title.split(' ')[0];
        $(e.currentTarget).find('#pincodeModalLabel').text(title);
    });

    $('#pincode').pincodeInput({
        // 4 input boxes = code of 4 digits long
        inputs: 6,
        // hide digits like password input
        hideDigits: true,
        // callback on every input on change (keyup event)
        change: function (input, value, inputnumber) {
            if (value == '') pincode = '';
        },
        // callback when all inputs are filled in (keyup event)
        complete: function (value, e, errorElement) {
            pincode = value;
        }
    });
    $("#btn-pinConfirm").click(function (e) {
        if (pincode.length < 6) {
            $(".pin-status").text('Error');
            return;
        }
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/ajaxPincodePost',
            data: {pincode: pincode, title: dialog_title},
            success: function (data) {
                if (data.success === 'ok') {
                    $('#pincodeModal').modal('toggle');
                    window.location.href = data.url;
                } else {
                    $(".pin-status").text(data.success);
                }
            }
        });
    });
});