<?php
require_once  __DIR__."/../../autoload/autoload.php";
$open = "admin";
$category = $db->fetchAll("admin");
    $data = [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "phone" => postInput('phone'),
        "password" => MD5(postInput('password')),
        "address" => postInput('address'),
        "level" => postInput('level')
    ];
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = "Mời bạn nhập họ và tên";
    }
    if (postInput('email') == '') {
        $error['email'] = "Mời bạn nhập email.";
    }
    else {
        //Kiểm tra email khi nhập vào có trùng với email trong CSDL không
        $is_check = $db->fetchOne("admin","email = '".$data['email']."'");
        if($is_check != NULL){
            $error['email'] = "Email đã tồn tại.";
        }
    }
    if (postInput('phone') == '') {
        $error['phone'] = "Mời bạn nhập số điện thoại.";
    }
    if (postInput('password') == '') {
        $error['password'] = "Mời bạn nhập mật khẩu.";
    }
    if (postInput('repassword') == '') {
        $error['repassword'] = "Mời bạn nhập lại mật khẩu.";
    }
    if (postInput('address') == '') {
        $error['address'] = "Mời bạn nhập địa chỉ.";
    }
    if($data['password'] != MD5(postInput('repassword'))){
        $error['password'] = "Mật khẩu không khớp. Vui lòng nhập lại.";
    }


    //Erorr rỗng thì không có lỗi
    if (empty($error)) {
        $id_insert = $db->insert("admin",$data);
        //kiểm tra xem có lấy đc id từ hàm insert chưa
        if ($id_insert){
            $_SESSION['success'] = "Thêm mới thành công.";
            redirectAdmin("admin");
        }
        else {
            $_SESSION['error'] = "Thêm mới thất bại.";
        }
    }
}
?>
<?php require_once  __DIR__."/../../layouts/header.php"; ?>
<!-- Page Heading NOI DUNG-->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thêm mới Admin
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
            </li>
            <li>
                <a href="index.html">Admin</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Thêm mới
            </li>
        </ol>
        <?php require_once  __DIR__. "/../../../partials/notification.php";   ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST" ">
<!--            Họ và tên-->
            <div class="form-group row">
                <label for="inputName" class="col-md-2 col-form-label" >Họ và tên</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="inputName" placeholder="Nguyễn khắc minh phúc" name="name" value="<?php echo $data['name'] ?>">
                    <?php if(isset($error['name'])) { ?><p class="text-danger"><?php echo $error['name']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Email-->
            <div class="form-group row">
                <label for="inputPrice" class="col-md-2 col-form-label" >Email</label>
                <div class="col-md-8">
                    <input type="email" class="form-control" id="inputPrice" placeholder="phucb1706630@student.ctu.edu.vn" name="email" value="<?php echo $data['email'] ?>" >
                    <?php if(isset($error['email'])) { ?><p class="text-danger"><?php echo $error['email']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Phone-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Phone</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="inputNumber" placeholder="0966197305" name="phone" value="<?php echo $data['phone'] ?>">
                    <?php if(isset($error['phone'])) { ?><p class="text-danger"><?php echo $error['phone']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Password-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" >Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" id="inputNumber"  name="password" value="<?php echo $data['password'] ?>" >
                    <?php if(isset($error['password'])) { ?><p class="text-danger"><?php echo $error['password']; ?></p> <?php } ?>
                </div>
            </div>
                <!--            Repassword-->
            <div class="form-group row">
                <label for="inputThunbar" class="col-md-2 col-form-label" > ConfigPassword</label>
                <div class="col-md-8">
                    <input type="password" name="repassword"  class="form-control" id="inputThunbar"  >
                    <?php if(isset($error['repassword'])) { ?><p class="text-danger"><?php echo $error['repassword']; ?></p> <?php } ?>
                </div>
            </div>
            <!--            Address-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Address</label>
                <div class="col-md-8">
                    <input type="text" name="address"  class="form-control" id="inputThunbar" value="<?php echo $data['address'] ?>">
                    <?php if(isset($error['address'])) { ?><p class="text-danger"><?php echo $error['address']; ?></p> <?php } ?>
                </div>
            </div>
<!--                Level-->
            <div class="form-group row">
                <label for="inputNumber" class="col-md-2 col-form-label" > Level</label>
                <div class="col-md-2">
                    <select class="form-control" name="level" >
                        <option value="1" <?php echo isset($data['level']) && $data['level'] == '1' ? 'selected' : ''; ?>>CTV</option>
                        <option value="2" <?php echo isset($data['level']) && $data['level'] == '2' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                    <?php if(isset($error['level'])) { ?><p class="text-danger"><?php echo $error['level']; ?></p> <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" name="submit">Lưu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.row -->
<?php require_once  __DIR__."/../../layouts/footer.php"; ?>

