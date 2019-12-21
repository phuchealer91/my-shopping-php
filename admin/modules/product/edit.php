<?php
require_once  __DIR__."/../../autoload/autoload.php";
$open = "product";
$category = $db->fetchAll("category");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))
    ];
    $error = [];
    if(postInput('name') == ''){
        $error['name'] = "Mời bạn nhập đầy đủ tên danh mục.";
    }
    //Erorr rỗng thì không có lỗi
    if(empty($error)) {
        $isset = $db->fetchOne("category", "name = '" . $data['name'] . "'");
        if (count($isset) > 0) {
            $_SESSION['error'] = "Tên danh mục đã tồn tại.";
        } else {
            $id_insert = $db->insert("category", $data);
            if ($id_insert > 0) {
                $_SESSION['success'] = "Thêm mới thành công.";
                redirectAdmin("category");
            } else {
                //them khong thanh cong !
                $_SESSION['error'] = "Thêm mới thất bại.";
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
            Thêm mới sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li>
                <a href="index.html">Sản phẩm</a>
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
            <!--            Danh mục sản phẩm-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Danh mục sản phẩm</label>
                <div class="col-md-8">
                    <select class="form-control" name="category_id" >
                        <option value=""> Chọn danh mục sản phẩm</option>
                        <?php foreach ($category as $item) { ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']?></option>
                        <?php } ?>
                    </select>

                    <?php if(isset($error['category'])) { ?><p class="text-danger"><?php echo $error['category']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Tên sản phẩm-->
            <div class="form-group row">
                <label for="inputName" class="col-md-2 col-form-label" >Tên sản phẩm</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="inputName" placeholder="Tên danh mục..." name="name">
                    <?php if(isset($error['name'])) { ?><p class="text-danger"><?php echo $error['name']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Giá SP-->
            <div class="form-group row">
                <label for="inputPrice" class="col-md-2 col-form-label" >Giá sản phẩm</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="inputPrice" placeholder="100.000" name="price">
                    <?php if(isset($error['price'])) { ?><p class="text-danger"><?php echo $error['price']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Số lượng-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Số lượng</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="inputNumber" placeholder="0" name="number">
                    <?php if(isset($error['number'])) { ?><p class="text-danger"><?php echo $error['number']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Giảm giá-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Giảm giá</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="inputNumber" placeholder="10%" name="sale" value="0">
                </div>
                <!--            Hình ảnh-->
                <label for="inputNumber" class="col-md-1 col-form-label" > Hình ảnh</label>
                <div class="col-md-3">
                    <input type="file" class="form-control" id="inputNumber" placeholder="" name="thunbar">
                    <?php if(isset($error['thunbar'])) { ?><p class="text-danger"><?php echo $error['thunbar']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Nội dung-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Nội dung</label>
                <div class="col-md-8">
                    <textarea name="content" rows="4" class="form-control"></textarea>
                    <?php if(isset($error['content'])) { ?><p class="text-danger"><?php echo $error['content']; ?></p> <?php } ?>
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

