//get all input
var input = $('.form-group .validate-form-control');
console.log(input);
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
    $(input).css('border', '1px solid #ff3368')
}

//remove class validate
function hideValidate(input) {
    var parent = $(input).parent();
    $(parent).removeClass('alert-validate');
    $(input).css('border', '1px solid #ced4da')
}

function valid_phone(str) {
    return (str.match(/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/) !== null) ? true : false;
}

function valid_email(str) {
    return (str.match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) !== null) ? true : false;
}

function valid_pass(str) {
    return (str.match((/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,30}$/)) !== null) ? true : false;
}

function valid_text(str) {
    return (str.match((/^\w+[^<>%$;:]*$/)) !== null) ? true : false;
}

