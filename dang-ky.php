<?php
require_once __DIR__ . "/autoload/autoload.php";
//    $errors = array(
//        'error' => 0
//    );
//    $data = [
//        'name' => postInput('name'),
//        'email' => postInput('email'),
//        'password' => MD5(postInput('password')),
//        'phone' => postInput('phone'),
//        'address' => postInput('address')
//    ];
//
//    if($_SERVER['REQUEST_METHOD'] == 'POST'){
////        _debug($data['name']);
//        $error = [];
//        if($data['name'] == ''){
//            $error['name'] = "Mời bạn nhập tên.";
//        }
//        if($data['email']  == ''){
//            $error['email'] = "Mời bạn nhập email.";
//        }
//        else {
//            $check = $db->fetchOne("users","email = '".$data['email']."'");
//                if($check != NULL){
//                    $error['email'] = "Email bạn nhập đã tồn tại.";
//                }
//        }
//        if($data['password']  == ''){
//            $error['password'] = "Mời bạn nhập mật khẩu.";
//        }
////        if($data['repassword']  == ''){
////            $error['repassword'] = "Mời bạn nhập lại mật khẩu.";
////        }
//        if($data['phone']  == ''){
//            $error['phone'] = "Mời bạn nhập số điện thoại.";
//        }
//        if($data['address']  == ''){
//            $error['address'] = "Mời bạn nhập địa chỉ.";
//        }
//        if($data['password'] != MD5(postInput('repassword'))){
//            $error['password'] = "Mật khẩu không khớp. Vui lòng nhập lại.";
//        }
//        if (empty($error))
//        {
//            $id_insert = $db->insert("users",$data);
//            if($id_insert > 0)
//            {
//                $_SESSION['success'] = "Đăng ký thành công ! Thử đăng nhập ";
////                header("localtion: dang-nhap.php");
//            }
//            else
//            {
//                echo "Đăng ký thất bại";
//            }
//        }
//
//    }

// Biến trả kết quả về cho người dùng
// dựa vào key error để nhận biết có lỗi hay không

$errors = array(
    'error' => 0
);
$name   = isset($_POST['name']) ? trim($_POST['name']) : '';
$email   = isset($_POST['email']) ? trim($_POST['email']) : '';
$password      = isset($_POST['password'])    ? trim($_POST['password'])   : '';
$phone   = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$address      = isset($_POST['address'])    ? trim($_POST['address'])    : '';

if (empty($name)){
    $errors['name'] = 'Bạn chưa nhập tên';
}
if (empty($email)){
    $errors['email'] = 'Bạn chưa nhập Email';
}
if (empty($password)){
    $errors['password'] = 'Bạn chưa nhập mật khẩu';
}
if (empty($phone)){
    $errors['phone'] = 'Bạn chưa nhập số điện thoại';
}
if (empty($address)){
    $errors['address'] = 'Bạn chưa nhập địa chỉ';
}
if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}
    $conn = mysqli_connect("localhost","root","","shoponline") or die ();
    mysqli_set_charset($conn,"utf8");

    $check = $db->fetchOne("users","email = '$email'");
    if($check != NULL){
        $errors['email'] = "Email bạn nhập đã tồn tại.";
    }
//// BƯỚC 3: KIỂM TRA CÓ LỖI KHÔNG, NẾU CÓ LỖI THÌ TRẢ VỀ LUÔN, CÒN KHÔNG THÌ TIẾP TỤC KIỂM TRA
if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}

//
//
//// BƯỚC 6: LƯU VÀO CSDL
$sql = "INSERT INTO users(name, email,password, phone, address)
     VALUES('$name','$email','".MD5($password)."','$phone','$address')";
//    mysqli_query($conn, $sql);
if (!mysqli_query($conn, $sql)){
    $errors['error'] = 1;
    $errors['sql_db'] = 'Lỗi câu truy vấn SQL';
}

// Trả kết quả cuối cùng
die (json_encode($errors));
?>



