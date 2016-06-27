window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

$(function(){
    $('.bodyRow').css('minHeight', document.body.clientHeight - 402);
    $('input[name="deliver"]').click(function(){
        var text = parseInt($(this).parent().find('input[name="total"]').val());
        alert(text);
        $(this).parent().find('span').text(text + parseInt($(this).val()));
    });
    $('#recallSend').click(function(){
        var data = $(this).parent().serialize();
        console.log(data);
        $.ajax({
            url: '/recall/add',
            data: data,
            method: 'post',
            success: function(response){
                if(typeof response == 'string')
                    alert(response);
                else
                {
                    var $parent = $('.recalls');
                    $parent.find('.empty').empty();
                    var $child = '<div class="media">';
                    $child += '<div class="media-left">';
                    $child += '<img src="/images/foo/noavatar.png" alt="" class="media-object" width="100">';
                    $child += '</div>';
                    $child += '<div class="media-body">';
                    $child += '<h4 class="media-heading">'+response.user.email+'</h4>';
                    $child += '<p>'+response.text+'</p>';
                    $child += '</div';
                    $parent.append($child);
                }
            }
        })
    })
});

