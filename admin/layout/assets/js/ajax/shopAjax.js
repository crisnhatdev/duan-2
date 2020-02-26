$(document).on('ready', function () {
        //pagination catalog
        $('.page-item').on('click', function () {
            console.log('hiii');
            this.classList.add('active');
            $(this).siblings().removeClass('active');
    
            var idCata = this.parentElement.getAttribute('data-malh');
            var mams = this.parentElement.getAttribute('data-mams');
            var mamh = this.parentElement.getAttribute('data-mamh');
            var kyw = this.parentElement.getAttribute('data-kyw') || '';
            var page = this.innerText;
            
    
            $.ajax({
                url: '../view/product/handleShop.php',
                type: 'get',
                dataType: 'json',
                data: {idCata: idCata, page: page, kyw: kyw, mams: mams, mamh: mamh, type: 'pagination-catalog'},
                success: function (res) {
                    $('#catalog_page').html(res);
                    console.log(res);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                    console.log(error);
                    console.log(status);
                }
            })
        })
    })

    