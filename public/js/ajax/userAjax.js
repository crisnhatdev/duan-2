$(document).ready(function () {
    //subscribe 
    $('.subscribe-form-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var input = $(this).children()[0];
        var action = '../view/account/handleUser.php';
        var method = 'post';
        var type = 'subscribe';
        var data = form.serializeArray();
        var checkValid = true;

        if (validate(input) == false) {
            $(input).css('border', '1px solid #ff3368')
            $(input).val('');
            checkValid = false;
        }

        if (checkValid) {
            $.ajax({
                url: action,
                type: method,
                dataType: 'json',
                data: {arrData: data, type: type},
                success: function (res) {
                    for (let key in res) {
                        $('.' + key).html(res[key]);
                        setTimeout(function () {
                            $('.' + key).html('')
                        }, 2000)
                        $(form)[0].reset();
                    }
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

    //login, register, update with ajax
    $('.user-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var action = form.attr('action');
        var method = form.attr('method');
        var type = form.data('type');
        var data = form.serializeArray();
        var inputArr = form.children().children('.validate-input .validate-form-control');
        var checkValid = true;
        
        for (let i = 0; i < inputArr.length; i++) {
            if (validate(inputArr[i]) == false) {
            showValidate(inputArr[i]);
            checkValid = false;
            }
        }
        
        if (checkValid) {
        $(':submit', form).attr('disabled', true);
            $.ajax({
                url: action,
                type: method,
                dataType: 'json',
                data: {arrData: data, type: type},
                success: function (res) {
                    //res is object
                    for (let key in res) {
                        //thông báo lỗi chung chung
                        if(key === 'error_field_lg') {
                            $('.error_field_lg').html(res[key]);
                        }
                        if(key === 'error_field') {
                            $('.error_field').html(res[key]);
                        }
                        
                        $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').parent().attr('data-validate', res[key]); //gắn thông báo validate lên parent's input
                        $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').parent().addClass('alert-validate'); //add class to parent's input to show validate
                        
                        setTimeout(function () {
                            $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').val('');
                        }, 100) //xóa value của input nếu sai validate
                        
                        if (key === 'direct') {
                            setTimeout(function () {
                                window.location.href = res[key];
                            }, 1500)
                        } // chuyển trang
                        
                        if(key === 'success_field' || key === 'success_field_lg') {
                            $('#modal-body-cart').html('');
                            $('#modal-title-cart').html(res[key]);
                            $('#modal_cart').modal({backdrop: 'static', keyboard: false})
                        }//show modal
                    }
                    $(':submit', form).removeAttr( "disabled" )
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                    console.log(error);
                    console.log(status);
                }
            })
        }
        return false;
    })
    
    $('.find-bill').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var inputArr = form.children().children('.validate-input .validate-form-control');
        var sdt = form.serializeArray()[0]['value'];
        var checkValid = true;
        
        for (let i = 0; i < inputArr.length; i++) {
            if (validate(inputArr[i]) == false) {
            showValidate(inputArr[i]);
            checkValid = false;
            }
        }
        
        if (checkValid) {
            $(':submit', form).attr('disabled', true);
            $.ajax({
                url: '../view/account/handleUser.php',
                type: 'post',
                dataType: false,
                data: {sdt: sdt, type: 'check-bill-no-lg'},
                success: function (res) {
                    console.log(res)
                    //res is object
                    if (res['error_phone']) {
                        $('input[name="phone"]').parent().attr('data-validate', res['error_phone']); //gắn thông báo validate lên parent's input
                        $('input[name="phone"]').parent().addClass('alert-validate'); //add class to parent's input to show validate
                    }
                    
                    if(!res['error_phone']) {
                        window.location.href = '.?act=acc-bill&phone=' + sdt;
                    }
                    
                    $(':submit', form).removeAttr( "disabled" )
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                    console.log(error);
                    console.log(status);
                }
            })
        }
        return false;
    })

    //submit logout with ajax
    $('.logout').one('click', function (e) {
        $.ajax({
            url: '../view/account/handleUser.php',
            type: 'post',
            dataType: 'json',
            data: {type: 'logout'},
            success: function (res) {
                setTimeout(function () {
                    window.location.href = res['direct']
                }, 200)
            }
        })
    })
    
    //show modal bill detail
    $('.bill-detail').on('click', function() {
        var mahd = $(this).parents('tr').children(':first').html();

        $.ajax({
            url: '../view/account/handleUser.php',
            type: 'post',
            dataType: 'json',
            data: {mahd: mahd, type: 'bill-detail'},
            success: function (res) {
                $('#table-bill tbody').html(res);
                $('#modal-bill').modal('show');
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })
})