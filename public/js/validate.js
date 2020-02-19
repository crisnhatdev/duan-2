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


// function space_number(str){
// 	return (str.match(/\d{1,3}(?=(\d{3})+(?!\d))/g) !== null) ? true : false;
// }

