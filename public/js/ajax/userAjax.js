$(document).ready(function () {
    //pagination comments
    var page = 1
    $('.pagination-comt').on('click', function () {
        var data = this.getAttribute('data-ma');
        var type = this.getAttribute('data-type');
        var action = this.getAttribute('data-action');
        page++;
        $.ajax({
            url: '../view/account/handleUser.php',
            type: 'post',
            dataType: 'json',
            data: {arrData: data, page: page, type: type},
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

    //subscribe 
    $('.subscribe-form-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var action = form.attr('action');
        var method = form.attr('method');
        var type = form.data('type');
        var data = form.serializeArray();
        var checkValid = true;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                $(input[i]).val('');
                checkValid = false;
            }
        }

        if (checkValid) {
            $.ajax({
                url: action,
                type: method,
                dataType: 'json',
                data: {arrData: data, type: type},
                success: function (res) {
                    for (obj in res) {
                        $('.' + obj).html(res[obj])
                        setTimeout(function () {
                            for (obj in res) {
                                $('.' + obj).html('')
                            }
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
        var checkValid = true;
        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                $(input[i]).val('');
                checkValid = false;
            }
        }

        if (checkValid && checkSubmit) {
            $.ajax({
                url: action,
                type: method,
                dataType: 'json',
                data: {arrData: data, type: type},
                success: function (res) {
                    console.log(res);
//                    $(input).each(function () {
//                        if (validate(this) == false) {
//                            showValidate(this);
//                            $(this).val('');
//                        }
//                    });
//
//                    var arrRes = Object.entries(res); //chuyển obj thành array
//
//                    if (arrRes[0][0] === 'success_field') {
//                        checkSubmit = false;
//                    }
//
//                    $('#messages_modal .list-unstyled').html('<li class="text-center">' + arrRes[0][1] + '</li>')
//                    $('#messages_modal').modal('show');
//
//                    setTimeout(function () {
//                        $('#messages_modal').modal('hide').data('bs.modal', null);
//                        $('body').css('padding', 0)
//                    }, 1500);
//
//                    if (arrRes.length > 1) {
//                        setTimeout(function () {
//                            window.location.href = arrRes[1][1];
//                        }, 1500)
//                    }
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
            url: 'view/template/user/handleuser.php',
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