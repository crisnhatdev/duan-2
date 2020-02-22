$(document).ready(function () {
    //comment news ajax
    $('.comment-news-ajax').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var textArea = $('textarea[name="message"]');
        var data = form.serializeArray();
        var checkValid = true;
        if (validate(textArea) == false) {
            showValidate(textArea);
//            $(textArea).css('border', '1px solid #ff3368');
            $(textArea).val('');
            checkValid = false;
        }

        if (checkValid) {
            $.ajax({
                url: '../view/news/handleNews.php',
                type: 'get',
                dataType: 'json',
                data: {arrData: data, type: 'comments-news'},
                success: function (res) {
//                    //gắn điểm và tổng cmt lên layout
                    var firstChild = $('.comments-area').children(":first");
                    $(res[0]).insertAfter(firstChild);
                    $('.box-count-cmts').html(res[1]);
                    $(form)[0].reset();
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

    //pagination news
    var page = 1
    $('.pagination-news').on('click', function () {
        var malbv = this.getAttribute('data-malbv');
        page++;

        $.ajax({
            url: '../view/news/handleNews.php',
            type: 'get',
            dataType: 'json',
            data: {malbv: malbv, page: page, type: 'pagination-news'},
            success: function (res) {
                $('.blog_left_sidebar').append(res);
            },
            error: function (request, status, error) {
                console.log(request);
                console.log(error);
                console.log(status);
            }
        })
    })

    //pagination comments - news detail
    var page = 1
    $('.pagination-cmts-news').on('click', function () {
        var mabv = this.getAttribute('data-mabv');
        page++;

        $.ajax({
            url: '../view/news/handleNews.php',
            type: 'get',
            dataType: 'json',
            data: {mabv: mabv, page: page, type: 'pagination-cmts-news'},
            success: function (res) {
                $('.comments-area').append(res);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            }
        })
    })
})