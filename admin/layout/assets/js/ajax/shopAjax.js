//$(document).on('ready', function () {
//pagination catalog
$('.page-item').on('click', function () {
    this.classList.add('active');
    $(this).siblings().removeClass('active');

    var idCata = this.parentElement.getAttribute('data-malh');
    var mams = this.parentElement.getAttribute('data-mams');
    var mamh = this.parentElement.getAttribute('data-mamh');
    var kyw = this.parentElement.getAttribute('data-kyw');
    var page = this.innerText;


    $.ajax({
        url: '../admin/view/product/handleShop.php',
        type: 'get',
        dataType: 'json',
        data: {idCata: idCata, page: page, kyw: kyw, mams: mams, mamh: mamh, type: 'pagination-catalog'},
        success: function (res) {
            $('#myproduct').html(res);
            console.log(res);
        },
        error: function (request, status, error) {
            console.log(request.responseText);
            console.log(error);
            console.log(status);
        }
    })
});
$('.page-item-news').on('click', function () {
    this.classList.add('active');
    $(this).siblings().removeClass('active');
    var page = this.innerText;
    var mabv = this.parentElement.getAttribute('data-mabv');
    var timbv = this.parentElement.getAttribute('data-timbv');
    $.ajax({
        url: '../admin/view/blog/handleNews.php',
        type: 'get',
        dataType: 'json',
        data: {mabv:mabv , page: page,timbv:timbv, type: 'pagination-blog'},
        success: function (res) {
            $('#myBlog').html(res);
            console.log(res);
        },
        error: function (request, status, error) {
            console.log(request.responseText);
            console.log(error);
            console.log(status);
        }
    })
})
//})