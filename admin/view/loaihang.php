<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="card">
            <div class="cart-header card-header-primary">
                <h4>Loại Sản Phẩm</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên loại</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($cataList as $key => $cata) {
                                ?>
                                <tr>
                                    <td><?= $cata['malh'] ?></td>
                                    <td><?= $cata['tenlh'] ?></td>
                                    <td><img src="../public/img/catalog/<?= $cata['hinhanhlh'] ?>"
                                     style="width:75px;height:75px;border-radius:50%"></td>
                                     <td >
                                         <a href="" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a><br>
                                         <a href="" class="btn btn-danger btn-sm"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>