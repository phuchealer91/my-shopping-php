<?php
require_once  __DIR__."/../../autoload/autoload.php";
$open = "product";
    $id = intval(getInput('id'));
    $editProduct = $db->fetchID('product',$id);
    if(empty($editProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại.";
        redirectAdmin('product');
    }


$category = $db->fetchAll("category");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
        "category_id" => postInput('category_id'),
        "price" => postInput('price'),
        "number" => postInput('number'),
        "sale" => postInput('sale'),
        "content" => postInput('content')
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Mời bạn nhập tên sản phẩm";
    }
    if (postInput('category_id') == '') {
        $error['category_id'] = "Mời bạn chọn tên danh mục.";
    }
    if (postInput('price') == '') {
        $error['price'] = "Mời bạn nhập giá sản phẩm.";
    }
    if (postInput('number') == '') {
        $error['number'] = "Mời bạn nhập số lượng sản phẩm.";
    }
    if (postInput('sale') == '') {
        $error['sale'] = "Mời bạn nhập giá khuyến mãi.";
    }
    if (postInput('content') == '') {
        $error['content'] = "Mời bạn nhập nội dung sản phẩm.";
    }
    //Erorr rỗng thì không có lỗi
    if(empty($error)) {
        if(isset($_FILES['thunbar'])){
            $fileName = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_error = $_FILES['thunbar']['error'];
            //kiểm tra file có bị lỗi không
            if($file_error == 0){
                $path = ROOT . "product/";
                $data['thunbar'] = $fileName;
            }
        }
        $update = $db->update("product",$data,array('id'=>$id));
        if($update > 0){
            move_uploaded_file($file_tmp,$path.$fileName);
            $_SESSION['success'] = "Cập nhật thành công.";
            redirectAdmin('product');
        }
        else {
            $_SESSION['error'] = "Cập nhật thất bại.";
            redirectAdmin('product');
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
        <form action="" method="POST" enctype="multipart/form-data">
            <!--            Danh mục sản phẩm-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Danh mục sản phẩm</label>
                <div class="col-md-8">
                    <select class="form-control" name="category_id" >
                        <option value=""> Chọn danh mục sản phẩm</option>
                        <?php foreach ($category as $item) { ?>
                            <option value="<?php echo $item['id']; ?>" <?php echo $editProduct['category_id'] == $item['id'] ? 'selected' : '';?>><?php echo $item['name']?></option>
                        <?php } ?>
                    </select>

                    <?php if(isset($error['category'])) { ?><p class="text-danger"><?php echo $error['category']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Tên sản phẩm-->
            <div class="form-group row">
                <label for="inputName" class="col-md-2 col-form-label" >Tên sản phẩm</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="inputName" placeholder="Tên danh mục..." name="name" value="<?php echo $editProduct['name']?>">
                    <?php if(isset($error['name'])) { ?><p class="text-danger"><?php echo $error['name']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Giá SP-->
            <div class="form-group row">
                <label for="inputPrice" class="col-md-2 col-form-label" >Giá sản phẩm</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="inputPrice" placeholder="100.000" name="price" value="<?php echo $editProduct['price']?>">
                    <?php if(isset($error['price'])) { ?><p class="text-danger"><?php echo $error['price']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Số lượng-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Số lượng</label>
                <div class="col-md-8">
                    <input type="number" class="form-control" id="inputNumber" placeholder="0" name="number" value="<?php echo $editProduct['number']?>">
                    <?php if(isset($error['number'])) { ?><p class="text-danger"><?php echo $error['number']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Giảm giá-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Giảm giá</label>
                <div class="col-md-3">
                    <input type="number" class="form-control" id="inputNumber" placeholder="10%" name="sale" value="<?php echo $editProduct['sale']?>">
                </div>
                <!--            Hình ảnh-->
                <label for="inputNumber" class="col-md-1 col-form-label" > Hình ảnh</label>
                <div class="col-md-3">
                    <input type="file" class="form-control" id="inputNumber" placeholder="" name="thunbar" >
                    <?php if(isset($error['thunbar'])) { ?><p class="text-danger"><?php echo $error['thunbar']; ?></p> <?php } ?>
                    <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar']?>" alt="" width="50px" height="50px">
                </div>
            </div>
            <!--            Nội dung-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Nội dung</label>
                <div class="col-md-8">
                    <textarea name="content" rows="4" class="form-control"><?php echo $editProduct['content']?>"</textarea>
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

