$(document).ready(function () {
    //get all input
    var input = $('.form-group .validate-form-control');
    //if input focus. hide validate
    $('.form-group .validate-form-control').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    //function validate
    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if (!valid_email($(input).val())) {
                return false;
            }
        }
        if ($(input).attr('type') == 'phone' || $(input).attr('name') == 'phone') {
            if (!valid_phone($(input).val())) {
                return false;
            }
        }
        if ($(input).attr('type') == 'password' || $(input).attr('name') == 'password') {
            if (!valid_pass($(input).val())) {
                return false;
            }
        } else {
            if (!valid_text($(input).val())) {
                return false;
            }
        }
    }

    //add class validate
    function showValidate(input) {
        var parent = $(input).parent();

        $(parent).addClass('alert-validate');
    }

    //remove class validate
    function hideValidate(input) {
        var parent = $(input).parent();

        $(parent).removeClass('alert-validate');
    }

    //comment with ajax
    $('.comment-form.ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var action = form.attr('action');
        var method = form.attr('method');
        var type = form.data('type');
        var data = form.serializeArray();

        $.ajax({
            url: action,
            type: method,
            dataType: 'json',
            data: {arrData: data, type: type},
            success: function (res) {
                $('.stars').removeClass('selected');
                $('#comment').val('');

                var firstChild = $('.commentlist').children(":first");
                $(res).insertBefore(firstChild);
            },
            error: function (request, status, error) {
                alert('Chắc bạn đang có ý định xấu nhỉ?')
            }
        })

        return false;
    })

    //pagination comments
    var page = 1
    $('.pagination-comt').on('click', function () {
        var data = this.getAttribute('data-ma');
        var type = 'pagination-comment';
        page++;

        $.ajax({
            url: 'view/template/user/handleuser.php',
            type: 'post',
            dataType: 'json',
            data: {arrData: data, page: page, type: type},
            success: function (res) {
                $('.commentlist').append(res);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
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
                    $(input).each(function () {
                        if (validate(this) == false) {
                            showValidate(this);
                            $(this).val('');
                        }
                    });

                    var arrRes = Object.entries(res); //chuyển obj thành array

                    if(arrRes[0][0] === 'success_field') {
                        checkSubmit = false;
                    }
                    
                    $('#messages_modal .list-unstyled').html('<li class="text-center">' + arrRes[0][1] + '</li>')
                    $('#messages_modal').modal('show');

                    setTimeout(function () {
                        $('#messages_modal').modal('hide').data('bs.modal', null);
                        $('body').css('padding', 0)
                    }, 1500);

                    if (arrRes.length > 1) {
                        setTimeout(function () {
                            window.location.href = arrRes[1][1];
                        }, 1500)
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