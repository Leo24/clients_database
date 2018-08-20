$(function () {

    $('form[name="filter"]').on('change', function () {
        var form = $(this);

        filter(form, form.serialize());
    });

    var filter = function (form, data) {
        alert(data);
        var request = $.post(form.attr('action'), data);

        request.done(function (data) {
            alert(data);
        });
    };

});