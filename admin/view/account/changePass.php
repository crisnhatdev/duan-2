<div class="content">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-8">
                <!-- echo '<img src="../public/img/account/' . $infoUser['hinhanhkh'] . '" alt="" style="width:35px;padding-left:5px;border-radius:50%">'; -->
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Đổi Mật Khẩu</h4>
                    </div>
                    <div class="card-body">
                        <form action="admin.php?act=changePassForm" method="post">
                            <?php
                            if (isset($_SESSION['user'])) {
                                $matk = $_SESSION['user']['id'];
                                $crAcc = new Account();
                                $infoUser = $crAcc->info_acc($matk);
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mật Khẩu Củ</label>
                                        <input type="password" name="oldpass" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Mật Khẩu Mới</label>
                                        <input type="password" name="newpass" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nhập Lại Mật Khẩu Mới</label>
                                        <input type="password" name="newpass2" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Đổi Mật Khẩu</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <?php
                            if ($infoUser['hinhanhkh'] != "") {
                                echo '<img src="../public/img/account/' . $infoUser['hinhanhkh'] . '" alt="" >';
                            }
                            ?>

                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category">CEO / Co-Founder</h6>
                        <h4 class="card-title"><?= $infoUser['tenkh'] ?></h4>
                        <p class="card-description">
                            <?= $infoUser['gioithieu'] ?>
                        </p>
                        <a href="https://www.facebook.com/nhatbogia?ref=bookmarks" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>