$(document).ready(function() {

    function cartCount() {
        var cook = Cookies.get('product_id');
        if (cook) {
            var array = cook.split(', ');
            var bc = $('#basket-count');
            var bi = $('#basket-info');
            var shadow = 'black 0 0 1px, black 0 0 2px, black 0 0 3px, black 0 0 4px, black 0 0 5px, black 0 0 6px';
            var boldShadow = shadow + ', black 0 0 8px, black 0 0 9px, black 0 0 10px, black 0 0 11px, black 0 0 12px, black 0 0 13px';
            bi.show();
            bi.css('boxShadow', '0 0 20px #000');
            bi.hover(function () {
                bc.css('textShadow', boldShadow);
                bi.find('a').css('text-decoration', 'none');
            }, function() {
                bc.css('textShadow', shadow);
            });
            bc.text(cartCountText(array.length));
            bc.show();
            bi.css('boxShadow', '0 0 20px #000');
            bc.css('textShadow', boldShadow);
            setTimeout(function() {
                bc.css('textShadow', shadow);
            }, 2000);
        } else {
            $('#basket-info').hide();
        }
    }

    function cartCountText(length) {
        length = String(length);
        var lastNumb = length.slice(-1);
        var ending = '';
        if (lastNumb == 2 || lastNumb == 3 || lastNumb == 4) {
            ending = 'а';
        } else if(lastNumb == 5 || lastNumb == 6 || lastNumb == 7 || lastNumb == 8 || lastNumb == 9 || lastNumb == 0) {
            ending = 'ов';
        }
        return length + ' товар' + ending + ' в корзине';
    }

    function removeCookieId(id) {
        if (confirm('remove product from cart?')) {
            var cookiesOld = Cookies.get('product_id');
            var array = cookiesOld.split(', ');
            var position = array.indexOf(id);
            delete array[position];
            var result = [];
            if (!(array == '')) {
                array.forEach(function (item, i, arr) {
                    result.push(item);
                });
                result = result.join(', ');
                Cookies.set('product_id', result);
            } else {
                Cookies.remove('product_id');
            }
            cartCount();
        }
    }

    function cartAjax() {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.post('/cart/cart-ajax', {_csrf: csrfToken}, function (data) {
            $('#product').remove();
            $('#left_column').after(data);
            $('.cartRemove').click(function () {
                var id = $(this).siblings('.hidden_id').val();
                removeCookieId(id);
                cartAjax();
            });
            $('.cartClean').click(function () {
                if (confirm('remove all products from cart?')) {
                    Cookies.remove('product_id');
                    cartAjax();
                }
            });
            $('.buy').click(function () {
                buyPrice();
            });
            $('.buy__close').click(buyClose);
            cartCount();
            $( ".buy__window" ).draggable();
            $( ".buy__button" ).click(function() {
                $( "#buy__form" ).submit();
            });
        });
    }

    cartAjax();

    //BUY FUNCTIONS

    function buyClose() {
        $('.buy_shadow').hide();
    }

    function buyPrice() {
        $('.buy_shadow').show();

        var counts = [], count, val, itemPrice, totalPrice, buyPrice = 0;

        $('.cartItem').each(function () {
            val = $(this).find('.item_count').val();
            counts.push(val);
        });

        $('.buy__list .item').each(function(index, value) {
            count = parseFloat(counts[index]);
            itemPrice = parseFloat($(this).find('.item__price').text());
            totalPrice = (count * itemPrice).toFixed(2);
            buyPrice += parseFloat(totalPrice);
            $(this).find('.item__count').text(count);
            $(this).find('.item__result').text(totalPrice);
        });

        $('.buy__window').find('.buy__price').text("Total price: " + buyPrice.toFixed(2));
    }

});