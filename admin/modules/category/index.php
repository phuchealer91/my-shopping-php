<?php
require_once  __DIR__."/../../autoload/autoload.php";
    $open = "category";
    $category = $db->fetchAll("category");
?>
<?php require_once  __DIR__."/../../layouts/header.php"; ?>
<!--Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Danh sách danh mục
            <a href="add.php" class="btn btn-success pull-right">Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Danh mục
            </li>
        </ol>
        <div class="clearfix"></div>
<!--        THÔNG BÁO LỖI-->
        <?php require_once  __DIR__. "/../../../partials/notification.php";   ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Viết tắt</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt = 1; foreach ($category as $item) { ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $item['name']?></td>
                    <td><?php echo $item['slug'] ?></td>
                    <td><?php echo $item['status'] ?></td>
                    <td><?php echo $item['created_at'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-success" href="edit.php?id=<?php echo $item['id'];?>"><i class="fa fa-edit"></i> Sửa</a>
                        <a onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-danger" href="delete.php?id=<?php echo $item['id'];?>"><i class="fa fa-times"></i> Xóa</a>
                    </td>
                </tr>
                <?php $stt++; }?>
                </tbody>
            </table>
<!--            <div class="pull-right">-->
<!--                <nav aria-label="Page navigation example" >-->
<!--                    <ul class="pagination">-->
<!--                        <li class="page-item">-->
<!--                            <a class="page-link" href="#" aria-label="Previous">-->
<!--                                <span aria-hidden="true">&laquo;</span>-->
<!--                                <span class="sr-only">Previous</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
<!--                        <li class="page-item"><a class="page-link" href="#">5</a></li>-->
<!--                        <li class="page-item">-->
<!--                            <a class="page-link" href="#" aria-label="Next">-->
<!--                                <span aria-hidden="true">&raquo;</span>-->
<!--                                <span class="sr-only">Next</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div> -->
        </div>
    </div>
</div>
<!-- /.row -->
<?php require_once  __DIR__."/../../layouts/footer.php"; ?>

