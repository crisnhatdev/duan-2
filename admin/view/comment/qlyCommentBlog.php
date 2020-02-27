<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4 class="pb-4">Danh Sách Bình Luận</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Nội Dung</th>
                            <th scope="col">Đánh Giá Sao</th>
                            <th scope="col">Ngày Đăng</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cmtBlog as $key => $cmt) {
                        ?>
                            <tr>
                                <td><?= $cmt['stt'] ?></td>
                                <td><?= $cmt['noidung'] ?></td>
                                <td><?= $cmt['sao'] ?></td>
                                <td><?= $cmt['ngaydang'] ?></td>
                                <td><a href="<?php echo 'admin.php?act=delCmtBlog&stt=' . $cmt['stt'] . ''; ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>