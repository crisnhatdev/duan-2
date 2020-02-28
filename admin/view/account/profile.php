<div class="content">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-8">
                <!-- echo '<img src="../public/img/account/' . $infoUser['hinhanhkh'] . '" alt="" style="width:35px;padding-left:5px;border-radius:50%">'; -->
                <div class="card">
                    <?php
                    if (isset($_SESSION['user'])) {
                        $matk = $_SESSION['user']['id'];
                        $crAcc = new Account();
                        $infoUser = $crAcc->info_acc($matk);
                    }
                    ?>
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Thông Tin Cá Nhân</h4>
                        <p class="card-category">Hoàn thành trang cá nhân </p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tên Khách Hàng</label>
                                        <input type="text" class="form-control" value="<?= $infoUser['tenkh'] ?>" disabled>
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" class="form-control" value="<?= $infoUser['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fist Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Địa Chỉ</label>
                                        <input type="text" class="form-control" value="<?= $infoUser['diachi'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Số Điện Thoại</label>
                                        <input type="text" class="form-control" value="<?= $infoUser['sdt'] ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <div class="form-group">
                                            <!-- <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label> -->
                                            <textarea class="form-control" rows="5"><?= $infoUser['gioithieu'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Cập Nhật Thông Tin</button>
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