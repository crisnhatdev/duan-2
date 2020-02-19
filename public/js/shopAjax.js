$(document).on('ready', function () {
    //format number to currency
    Number.prototype.format = function (n, x, s, c) { //n: toFixed(n); x(000); s(1.000); c(1.000,25)
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                num = this.toFixed(Math.max(0, ~~n));
        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };

    //function call after ajax sucess
    function sucessAjax(res) {
        $('.count').html(res[0]);
        $('.cart_list').html(res[1]);
        $('#cart_table').html(res[2]);
        $('#total_cart').html(res[3].format(0, 3, '.') + ' VNĐ');
        $('#total_table').html(res[3].format(0, 3, '.') + ' VNĐ');
    }

    //add item to cart
    $('.add_to_cart_button').on('click', function (e) {
        e.preventDefault();

        var maspct = $(this).prev().val().trim();
        var soluong = $(this).siblings(':first').children('input[type="number"]').val();

        $.ajax({
            url: 'view/template/shop/handleshop.php',
            type: 'get',
            dataType: 'json',
            data: {maspct: maspct, soluong: soluong, type: 'add'},
            success: function (res) {
                $('.widget_shopping_cart_content').css("height", "7rem");
                sucessAjax(res)
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })

    //update qtt or remove item
    $('body').on('click', '.shop_table.cart', function (e) {
        var target = e.target;

        var maspct = $(target).parents('tr').children(':first').text().trim();

        if ($(target).hasClass('remove_cart')) {
            var soluong = 0;
            var type = 'remove';
        }

        if ($(target).hasClass('qty_btn')) {
            var soluong = +$(target).siblings('input.form-control').val();
            var type = 'update';
        }

        $.ajax({
            url: 'view/template/shop/handleshop.php',
            type: 'get',
            dataType: 'json',
            data: {maspct: maspct, soluong: ($(target).hasClass('minus')) ? soluong - 1 : ($(target).hasClass('plus')) ? soluong + 1 : soluong, type: type},
            success: function (res) {
                sucessAjax(res)
            }
        })
    })

    //event in view-cart
    $('body').on('change', '.qty_cart', function (e) {
        var target = e.target;

        var maspct = $(target).parents('tr').children(':first').text().trim();

        var soluong = +$(target).val();

        var type = 'update';

        $.ajax({
            url: 'view/template/shop/handleshop.php',
            type: 'get',
            dataType: 'json',
            data: {maspct: maspct, soluong: soluong, type: type},
            success: function (res) {
                sucessAjax(res)
            }
        })
    })

    //change size on detail
    $('#pa_size').on('change', function (e) {
        e.preventDefault();

        var masz = $(this).val();
        var ma = $(this).siblings('input').val();
        var type = 'choose';

        $.ajax({
            url: 'view/template/shop/handleshop.php',
            type: 'get',
            dataType: 'json',
            data: {ma: ma, masz: masz, type: type},
            success: function (res) {
                $('#add_to_cart_masp').val(res[0]['maspct']);

                if (res[0]['soluong'] > 0) {
                    $('#add-item-group').css('display', 'block')
                    $("#sold-out-item").css('display', 'none');
                } else {
                    $('#add-item-group').css('display', 'none')
                    $("#sold-out-item").css('display', 'block');
                }
            }
        })
    })

    //checkout
    $('#place_order').on('click', function (e) {
        e.preventDefault();

        var note = $('#order_comments').val();
        var type = 'checkout';

        $.ajax({
            url: 'view/template/shop/handleshop.php',
            type: 'get',
            dataType: 'json',
            data: {note: note, type: type},
            success: function (res) {
                $('#messages_modal .list-unstyled').html('<li class="text-center">' + res + '</li><li class="text-center"><a href=".">Về trang chủ</a></li>')
                $('#messages_modal').modal('show');

                setTimeout(function () {
                    window.location.href = '.';
                }, 3000)
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })

    //pagination products
    $('.page-item').on('click', function () {
        this.classList.add('active');
        $(this).siblings().removeClass('active');

        var idCata = this.parentElement.getAttribute('data-malh');
        var mams = this.parentElement.getAttribute('data-mams');
        var mamh = this.parentElement.getAttribute('data-mamh');
        var kyw = this.parentElement.getAttribute('data-kyw') || '';
        var page = this.innerText;
        var type = 'pagination';

        $.ajax({
            url: '../view/shop/handleAjax.php',
            type: 'get',
            dataType: 'json',
            data: {idCata: idCata, page: page, kyw: kyw, mams: mams, mamh: mamh, type: type},
            success: function (res) {
                $('#catalog_page').html(res);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })
})
