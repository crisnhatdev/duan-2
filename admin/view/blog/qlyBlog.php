<div class="container" style="margin-top:100px">
    <div class="card">
        <div class="card-header card-header-primary">
            <h3>Danh Sách Bài Viết</h3>
            <a href="admin.php?act=addBlogKey" class="btn btn-primary">Thêm Bài Viết</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table text-center" id="myBlog">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Danh Mục </th>
                        <th scope="col">Tên Bài Viết</th>
                        <th scope="col">Mô Tả</th>
                        <th scope="col">Nội Dung</th>
                        <th scope="col">Lượt Xem</th>
                        <th scope="col">Hình Ảnh </th>
                        <th scope="col">Ngày Đăng</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($blogLimit as $key => $blog) {
                    ?>
                        <tr>
                            <td><?= $blog['mabv'] ?></td>
                            <td><?= $blog['tenlbv'] ?></td>
                            <td><?= $blog['tenbv'] ?></td>
                            <td><?= $blog['motabv'] ?></td>
                            <td><?= $blog['noidungbv'] ?></td>
                            <td><?= $blog['luotxem'] ?></td>
                            <td><img src="../public/img/blog/upload/<?= $blog['hinhanhbv'] ?>" style="width:75px;height:75px;border-radius:50%"></td>
                            <td><?= $blog['ngaydang'] ?></td>
                            <td>
                                <a href="<?php echo 'admin.php?act=updateBlogKey&id=' . $blog['mabv'] . ''; ?>" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                <a href="<?php echo 'admin.php?act=delBlog&mabv=' . $blog['mabv'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="col-lg-12">
                <div class="pageination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" data-mabv= <?php isset($_GET['mabv'])?$_GET['mabv']:0 ?> data-timbv="">
                            <?php
                            $pages = $crCata->calcPage($qlyBlog,5 );
                            for ($i = 0; $i < $pages; $i++) {
                                $active = ($i === 0) ? " active" : "";
                                echo "<li class='page-item-news" . $active . "'><a class='page-link' href='#/'>" . ($i + 1) . "</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>