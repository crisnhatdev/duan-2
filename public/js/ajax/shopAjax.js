$(document).on('ready', function () {
    //comment product 
    $('.comment-product-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var textArea = $('textarea[name="message"]');
        var data = form.serializeArray();
        var checkValid = true;
        if (validate(textArea) == false) {
            showValidate(textArea);
            $(textArea).val('');
            checkValid = false;
        }

        if (checkValid) {
            $.ajax({
                url: '../view/shop/handleShop.php',
                type: 'get',
                dataType: 'json',
                data: {arrData: data, type: 'comments-product'},
                success: function (res) {
                    //xóa style của ngôi sao
                    $('.stars').removeClass('selected');
                    $('#message').val('');

                    //lấy phần tử đầu của review_list và thêm cmt lên trước
                    var firstChild = $('.review_list').children(":first");
                    $(res[0]).insertBefore(firstChild);

                    //gắn điểm và tổng cmt lên layout
                    $('.box-score').html(res[1].toFixed(2));
                    $('.box-count-cmts').html(res[2]);
                },
                error: function (request, status, error) {
                    //                alert('Chắc bạn đang có ý định xấu nhỉ?')
                    console.log(request);
                    console.log(status);
                    console.log(error);
                }
            })
        }
        return false;
    })

    //pagination comments - product
    var page = 1
    $('.pagination-cmts-product').on('click', function () {
        var masp = this.getAttribute('data-masp');
        page++;

        $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'get',
            dataType: 'json',
            data: {masp: masp, page: page, type: 'pagination-cmts-product'},
            success: function (res) {
                $('.review_list').append(res);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })

    //pagination catalog
    $('.page-item').on('click', function () {
        this.classList.add('active');
        $(this).siblings().removeClass('active');

        var idCata = this.parentElement.getAttribute('data-malh');
        var mams = this.parentElement.getAttribute('data-mams');
        var mamh = this.parentElement.getAttribute('data-mamh');
        var kyw = this.parentElement.getAttribute('data-kyw') || '';
        var page = this.innerText;

        $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'get',
            dataType: 'json',
            data: {idCata: idCata, page: page, kyw: kyw, mams: mams, mamh: mamh, type: 'pagination-catalog'},
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

//    format number to currency
    Number.prototype.format = function (n, x, s, c) { //n: toFixed(n); x(000); s(1.000); c(1.000,25)
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                num = this.toFixed(Math.max(0, ~~n));
        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
    };

    //add item to cart
    $('body').on('click', '.add_to_cart_button', function (e) {
        e.preventDefault();

        var masp = $(this).prev().val().trim();
        var soluong = $(this).siblings(':first').children('input[type="text"]').val();

        $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'get',
            dataType: 'json',
            data: {masp: masp, soluong: soluong, type: 'add'},
            success: function (res) {
                $('.fas.fa-cart-plus').attr('data-cart', res);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })

    //update qtt in view cart
    $('body').on('click', '.shop_table.cart', function (e) {
        var target = e.target;

        var masp = $(target).parents('tr').children(':first').text().trim();
        var soluong = parseInt($(target).parent().siblings('.input-number').val());

        if (soluong > 0 && $(target).hasClass('ti-angle-down')) {
            var soluong = --soluong;
            var type = 'update';
        } else if (soluong < 5 && $(target).hasClass('ti-angle-up')) {
            var soluong = ++soluong;
            var type = 'update';
        } else if ($(target).hasClass('fa-trash')) {
            var soluong = -1;
            var type = 'update';
        }

        $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'get',
            dataType: 'json',
            data: {masp: masp, soluong: soluong, type: type},
            success: function (res) {
                $('.shop_table.cart').html(res[0]);
                $('.fas.fa-cart-plus').attr('data-cart', res[1]);

            }
        })
    })

    //change input in view-cart
    $('body').on('change', '.qty_input', function (e) {
        var target = e.target;

        var masp = $(target).parents('tr').children(':first').text().trim();

        var soluong = +$(target).val();

        var type = 'update';

        $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'get',
            dataType: 'json',
            data: {masp: masp, soluong: soluong, type: type},
            success: function (res) {
                $('.shop_table.cart').html(res);
                $('.fas.fa-cart-plus').attr('data-cart', res[1]);
            }
        })
    })

    //checkout
    var submit = true;
    $('#place_order').on('click', function (e) {
        e.preventDefault();

        var orderForm = $('#order_form').serializeArray();
        var type = $(this).data('type');

        var inputArr = $('#order_form').children().children('.validate-input .validate-form-control');
        var checkValid = true;
        for (let i = 0; i < inputArr.length; i++) {
            if (validate(inputArr[i]) == false) {
            showValidate(inputArr[i]);
            console.log(inputArr[i])
            checkValid = false;
            }
        }
        
        if(checkValid && submit) {
            submit = false;
            $.ajax({
            url: '../view/shop/handleShop.php',
            type: 'post',
            dataType: 'json',
            data: {orderForm: orderForm, type: type},
            success: function (res) {
                for (let key in res) {
                    $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').parent().attr('data-validate', res[key]); //gắn thông báo validate lên input
                    $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').parent().addClass('alert-validate'); //add class show validate

                    if (key === 'success_field') {
                        $('#modal_cart').modal({backdrop: 'static', keyboard: false})
                    }

                    if (key === 'direct') {
                        setTimeout(function () {
                            window.location.href = res[key];
                        }, 2000)
                    }
                    
                    submit = true;
                }
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
        }
        
    })
})
