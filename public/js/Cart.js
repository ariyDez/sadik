$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
    var token = $('meta[name="_token"]').attr('content'); // or _token, whichever you are using

    if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
    }
});
var Cart = {
    deal: 0,
    add: function(elem,id,csrf){
        $good = $(elem);
        $img = $good.parent().parent().find('img');

        $newImg = $img.clone(true);
        $img.parent().append($newImg);
        $newImg.css({position: 'absolute', opacity: 1, left: '15px'})

        $cart = $('.cart');

        $.ajax({
            method: "POST",
            url: "/cart/api/add",
            data: {'id': id,'_token': csrf},
            success: function(response){
                $newImg.animate({left: '1085px', top: '-215px', width: '30px', height: '30px', opacity: 0}, 1500,'swing');
                $cart.find('.badge').text(response.deal);
                console.log(response);
                setTimeout(function(){$newImg.remove();}, 1500);
                //alert(response);
            }
        });

    }
};