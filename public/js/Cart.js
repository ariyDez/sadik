$.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
    var token = $('meta[name="_token"]').attr('content'); // or _token, whichever you are using

    if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
    }
});
var Cart = {
    deal: 0,
    add: function(elem){
        $good = $(elem);
        // if($good.hasClass('rar'))
        //     $img = $good.parent().parent().parent().parent().parent().parent().find('img');
        // else
            $img = $good.parent().parent().find('img');
        // console.log($img);
        $newImg = $img.clone(true);
        $img.parent().append($newImg);
        $newImg.css({position: 'absolute', opacity: 1, left: '15px'})
        console.log($good.parent().find('form').serialize());
        $cart = $('.cart');

        $.ajax({
            method: "POST",
            url: "/cart/api/add",
            data: $good.parent().find('form').serialize(),
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
$(document).ready(function() {
    $("#productRate").hover(
        function () { /* при наведении мыши на блок с рейтингом, динамически добавляем блок с подсветкой выбранной оценки */
            $(this).append("<span></span>");
        },
        function () { /* при уходе с рейтинга, удаляем блок с подсветкой */
            $(this).find("span").remove();
        });
    var rating;
    $("#productRate").mousemove(
        /*
         19
         устанавливаем ширину блока с подсветкой таким образом, чтобы была выделена оценка, находящаяся под курсором мыши
         20
         */
        function (e) {
            if (!e) e = window.event;
            if (e.pageX) {
                x = e.pageX;
            } else if (e.clientX) {
                x = e.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft) - document.documentElement.clientLeft;
            }
            var posLeft = 0;
            var obj = this;
            while (obj.offsetParent) {
                posLeft += obj.offsetLeft;
                obj = obj.offsetParent;
            }
            var offsetX = x - posLeft,
                modOffsetX = 5 * offsetX % this.offsetWidth;
            /* 5 - число возможных оценок */
            rating = parseInt(5 * offsetX / this.offsetWidth);
            if (modOffsetX > 0) rating += 1;
            jQuery(this).find("span").eq(0).css("width", rating * 30 + "px");
            /* ширина одной оценки, в данном случае одной звезды */
        });
    $("#productRate").click(/* по клику на блоке можно определить какую оценку поставил пользователь */
        function () {
            //alert("Я ставлю " + rating);
            $(this).html("<div style='width: "+rating*30+"px'></div>");
            $('input[name="rating"]').val(rating);
            //return false;
        });
});