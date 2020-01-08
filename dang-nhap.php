<?php
require_once __DIR__ . "/autoload/autoload.php";
$conn = mysqli_connect("localhost","root","","shoponline") or die ();
mysqli_set_charset($conn,"utf8");
$errors = array(
    'error' => 0
);
//    if(isset($_POST['submit'])) {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (empty($email)) {
            $errors['email'] = 'Bạn chưa nhập Email';
        }
        if (empty($password)) {
            $errors['password'] = 'Bạn chưa nhập mật khẩu';
        }

        if (count($errors) > 1) {
            $errors['error'] = 1;
            die (json_encode($errors));
        }
//    }
$check = $db->fetchOne("users", "email = '$email' AND password = '" . MD5($password) . "'");
if ($check != NULL) {
    $_SESSION['name_user'] = $check['name'];
    $_SESSION['name_id'] = $check['id'];
//        echo " <script>alert('Đăng nhập thành công');location.href='index.php' </script> ";
//        header('Location: index.php');
} else {
//        $_SESSION['error'] = "Đăng nhập thất bại";
    $errors['password'] = "Email hoặc mật khẩu của bạn không đúng.";
}

if (count($errors) > 1){
    $errors['error'] = 1;
    die (json_encode($errors));
}

die (json_encode($errors));

?>

