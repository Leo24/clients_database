/**
 * onSelectCountry Ajax
 */

/*
$(function () {
    var getCountry = function (country) {
        var elem = $("#countries.country-selector option:selected");
        var path = elem.attr('data-url');
        var countryID = elem.val();

        $('.country-selector').change(function () {
            $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                })
            })
    };
});
*/

$(function () {
    var getCities = function () {
        var elem = $('input.typeahead');
        var path = elem.attr('data-url');

        $(elem).typeahead({
            source: function (query, process) {
                var selectedCountry = $("select.country-selector option:selected").val();
                return $.get(path, { query: query, country: selectedCountry }, function (data) {
                    return process(data);
                });
            }
        });
    };

    getCities();
});

//maska phone
$('.js-phone-mask').mask('+38(000) 000-00-00', {placeholder: "+38(___) ___-__-__"});

//init select
$(".js-source-states").select2();
$(".js-source-states-2").select2();

//open upload form decline
$(".js-btn-decline").on('click', function () {
    $(".js-decline").toggleClass('hide');
});

//init WYSIWYG editor
$('.summernote').summernote();
var sHTML = $('.summernote').code();
