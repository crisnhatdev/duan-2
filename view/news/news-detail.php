<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2><?= $news['tenbv'] ?></h2>
                        <!--<p>Home <span>-</span> Shop Single</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="../public/img/blog/<?= $news['hinhanhbv'] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2><?= $news['motabv'] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="far fa-user"></i> <?= $news['tenkh'] ?></a></li>
                            <li><a href="#comments-area"><i class="far fa-comments"></i> <span class="box-count-cmts"><?= count($cmtsList) ?></span> Đánh Giá</a></li>
                        </ul>
                        <p>
                            <?= $news['noidungbv'] ?>
                        </p>
                    </div>
                </div>
                <div class="navigation-top">
                    <!--                    <div class="d-sm-flex justify-content-between text-center">
                                            <p class="like-info"><span class="align-middle"><i class="far fa-heart"></i></span> Lily and 4
                                                people like this</p>
                                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                                <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> 
                                            </div>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                            </ul>
                                        </div>-->
                    <div class="navigation-area">
                        <div class="row">
                            <?php
                            if ($prevNews) {
                                ?>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href=".?act=news-detail&mabv=<?= $mabv - 1 ?>">
                                            <img style="height: 100px; width: 100px; object-fit: cover" class="img-fluid" src="../public/img/blog/upload/<?= $prevNews['hinhanhbv'] ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href=".?act=news-detail&mabv=<?= $mabv - 1 ?>">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Bài viết trước</p>
                                        <a href=".?act=news-detail&mabv=<?= $mabv - 1 ?>">
                                            <h4><?= $prevNews['tenbv'] ?></h4>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                            if ($nextNews) {
                                ?>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Bài viết sau</p>
                                        <a href=".?act=news-detail&mabv=<?= $mabv + 1 ?>">
                                            <h4><?= $nextNews['tenbv'] ?></h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href=".?act=news-detail&mabv=<?= $mabv + 1 ?>">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href=".?act=news-detail&mabv=<?= $mabv + 1 ?>">
                                            <img style="height: 100px; width: 100px; object-fit: cover"class="img-fluid" src="../public/img/blog/upload/<?= $nextNews['hinhanhbv'] ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="media align-items-center">
                        <img src="../public/img/user/<?= $news['hinhanhkh'] ?>" alt="">
                        <div class="media-body">
                            <a href="#/">
                                <h4><?= $news['tenkh'] ?></h4>
                            </a>
                            <p><?= $news['gioithieu'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="comments-area" id="comments-area">
                    <h4><span class="box-count-cmts"><?= count($cmtsList) ?></span> Bình Luận</h4>
                    <?php
                    $threeCmts = array_slice($cmtsList, 0, 3);
                    foreach ($threeCmts as $cmt) {
                        ?>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="../public/img/user/<?= $cmt['hinhanhkh'] ?>" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            <?= $cmt['noidung'] ?>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#/"><?= $cmt['tenkh'] ?></a>
                                                </h5>
                                                <p class="date"><?= date("d-m-Y | H:i:s", strtotime($cmt['ngaydang'])) ?> </p>
                                            </div>
                                            <!--                                            <div class="reply-btn">
                                                                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                                                                        </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </div>
                <?=
                (count($cmtsList) >= 3) ? '<div class="grey pagination-cmts-news" data-mabv ="' . $mabv . '" style="cursor: pointer; text-align:right">Xem Bình Luận Cũ</div>' : '';
                ?>
                <div class="comment-form">
                    <h4>Để lại lời Đánh Giá</h4>
                    <form class="form-contact comment_form comment-news-ajax" action="../view/account/handleUser.php" method="post" data-type="comments">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" data-validate="Đã xảy ra lỗi cú pháp">
                                    <textarea class="form-control w-100 validate-form-control" name="message" id="message" cols="30" rows="9"
                                              placeholder="Đánh giá" required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <input type="hidden" name="mabv" value="<?= $mabv ?>">
                            <button type="submit" value="submit" class="btn_3">
                                Nhập
                            </button>
                        </div>
                    </form>
                </div>
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
<!--================Blog Area end =================-->