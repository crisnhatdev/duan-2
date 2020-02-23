<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Tin Tức</h2>
                        <!--<p>Home <span>-</span> Shop Single</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================Blog Area =================-->
<section class="blog_area padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    $threeNews = array_slice($newsList, 0, 3);
                    foreach ($threeNews as $news) {
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <!--<img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">-->
                                <a href="#" class="blog_item_date">
                                    <h3><?= date("d", strtotime($news['ngaydang'])) ?></h3>
                                    <p><?= date("M", strtotime($news['ngaydang'])) ?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href=".?act=news-detail&mabv=<?= $news['mabv'] ?>">
                                    <h2><?= $news['tenbv'] ?></h2>
                                </a>
                                <p><?= $news['motabv'] ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#/"><i class="far fa-user"></i> <?= $news['tenkh'] ?></a></li>
                                    <li><a href="#/"><i class="far fa-comments"></i> <?= count($crComm->getCmt('binhluanbv', 'mabv', 14)) ?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                </div>
                <nav class="blog-pagination justify-content-center d-flex">
                    <?=
                    (count($newsList) >= 3) ? '<div class="grey pagination-news" data-malbv ="' . $malbv . '" style="cursor: pointer; text-align:right; font-size: 24px">Xem Bài Viết Cũ</div>' : '';
                    ?>
                </nav>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Tìm bài viết'
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Tìm bài viết'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Tìm kiếm</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Danh Mục Tin Tức</h4>
                        <ul class="list cat-list">
                            <?php
                            foreach ($newsCataList as $newsCata) {
                                echo '<li>
                                        <a href=".?act=news&malbv=' . $newsCata['malbv'] . '" class="d-flex">
                                            <p>' . $newsCata['tenlbv'] . '</p>
                                            <p>(' . count($crNews->getNews($newsCata['malbv'])) . ')</p>
                                        </a>
                                    </li>';
                            }
                            ?>
                            <!--                            <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Resaurant food</p>
                                                                <p>(37)</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Travel news</p>
                                                                <p>(10)</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Modern technology</p>
                                                                <p>(03)</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Product</p>
                                                                <p>(11)</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Inspiration</p>
                                                                <p>21</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="d-flex">
                                                                <p>Health Care (21)</p>
                                                                <p>09</p>
                                                            </a>
                                                        </li>-->
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Các tin vừa xem</h3>
                        <?php
                        foreach ($threeRecentNews as $mabv) {
                            $news = $crNews->getNews(0, $mabv)[0];
                            ?>
                            <div class="media post_item">
                                <img style="height: 80px; width:80px; object-fit: cover" src="../public/img/blog/upload/<?= $news['hinhanhbv'] ?>" alt="post">
                                <div class="media-body">
                                    <a href=".?act=news-detail&mabv=<?= $mabv ?>">
                                        <h3><?= $news['tenbv'] ?><?= $mabv ?></h3>
                                    </a>
                                    <p><?= date("d-m, Y", strtotime($news['ngaydang'])) ?></p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </aside>
                    <!--                    <aside class="single_sidebar_widget tag_cloud_widget">
                                            <h4 class="widget_title">Tag Clouds</h4>
                                            <ul class="list">
                                                <li>
                                                    <a href="#">project</a>
                                                </li>
                                                <li>
                                                    <a href="#">love</a>
                                                </li>
                                                <li>
                                                    <a href="#">technology</a>
                                                </li>
                                                <li>
                                                    <a href="#">travel</a>
                                                </li>
                                                <li>
                                                    <a href="#">restaurant</a>
                                                </li>
                                                <li>
                                                    <a href="#">life style</a>
                                                </li>
                                                <li>
                                                    <a href="#">design</a>
                                                </li>
                                                <li>
                                                    <a href="#">illustration</a>
                                                </li>
                                            </ul>
                                        </aside>-->


                    <!--                    <aside class="single_sidebar_widget instagram_feeds">
                                            <h4 class="widget_title">Instagram Feeds</h4>
                                            <ul class="instagram_row flex-wrap">
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_5.png" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_6.png" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_7.png" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_8.png" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_9.png" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img class="img-fluid" src="img/post/post_10.png" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </aside>-->


                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Đăng ký nhận tin mới</h4>
                        <div class="validate_field success_field" style="color: #28a745"></div>
                        <div class="validate_field error_field" style="color: red" ></div>
                        <form class="subscribe-form-ajax form-group">
                            <input type="email" class="form-control validate-form-control" onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Nhập email của bạn'" placeholder='Nhập email của bạn' name="subscribe-mail"  required="">
                            <button style="padding: 15px 24px" value="submit" class="button rounded-0 primary-bg text-white w-100 mt-30"
                                    type="submit">Đăng ký</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->