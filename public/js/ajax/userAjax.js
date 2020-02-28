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
    var checkSubmit = true;
    $('.user-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var action = form.attr('action');
        var method = form.attr('method');
        var type = form.data('type');
        var data = form.serializeArray();

        if (checkSubmit) {
            $.ajax({
                url: action,
                type: method,
                dataType: false,
                data: {arrData: data, type: type},
                success: function (res) {
                    //res is object
                    for (let key in res) {
                        if(key === 'success_field' || key === 'success_field_lg') {
                          $(':submit', form).attr('disabled', true);
                        }
                        
                        $('.' + key).html(res[key])
                        
                        setTimeout(function () {
                            $('.' + key).html('');
                            $('input[name="' + key.slice(key.indexOf('_') + 1) + '"]').val('');
                        }, 1500)
                                                   
                        
                        if (key === 'direct') {
                            setTimeout(function () {
                                window.location.href = res[key];
                            }, 2000)
                        }
                    }
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
    $('.logout').on('click', function (e) {
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
})