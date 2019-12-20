<?php
require_once  __DIR__."/../../autoload/autoload.php";
$open = "category";
    $id = intval(getInput('id'));
    $editCategory = $db->fetchID("category",$id);
    if(empty($editCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại.";
        redirectAdmin("category");
    }
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
    ];
    $error = [];
    if(postInput('name') == ''){
        $error['name'] = "Mời bạn nhập đầy đủ tên danh mục .";
    }
    //Erorr rỗng thì không có lỗi
    if(empty($error)){
        if($editCategory['name'] != $data['name']){
            $isset = $db->fetchOne("category", "name = '" . $data['name'] . "'");
            if (count($isset) > 0) {
                $_SESSION['error'] = "Tên danh mục đã tồn tại.";
            }
            else {
                $id_update = $db->update("category",$data,array('id'=>$id));
                if($id_update > 0){
                    $_SESSION['success'] = "Cập nhật thành công.";
                    redirectAdmin("category");
                }
                else {
                    //them khong thanh cong !
                    $_SESSION['error'] = "Dữ liệu không thay đổi.";
                    redirectAdmin("category");
                }
            }
        }
        else {
            $id_update = $db->update("category",$data,array('id'=>$id));
            if($id_update > 0){
                $_SESSION['success'] = "Cập nhật thành công.";
                redirectAdmin("category");
            }
            else {
                //them khong thanh cong !
                $_SESSION['error'] = "Dữ liệu không thay đổi.";
                redirectAdmin("category");
            }
        }


    }
}
?>
<?php require_once  __DIR__."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới danh mục
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li>
                <a href="index.html">Danh mục</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <?php if(!empty($_SESSION['error'])) {?>
            <div class="col-md-4 alert alert-danger" >
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST">
            <div class="form-group row">
                <label for="inputName" class="col-md-2 col-form-label" >Tên danh mục</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="inputName" placeholder="Tên danh mục..." name="name" value="<?php echo $editCategory['name']; ?>">
                    <?php if(isset($error['name'])) { ?><p class="text-danger"><?php echo $error['name']; ?></p> <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.row -->
<?php require_once  __DIR__."/../../layouts/footer.php"; ?>

