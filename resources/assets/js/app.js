window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

$(function(){
    $('input[name="deliver"]').click(function(){
        var text = parseInt($(this).parent().find('input[name="total"]').val());
        alert(text);
        $(this).parent().find('span').text(text + parseInt($(this).val()));
    })
});

