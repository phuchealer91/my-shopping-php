<?php
require_once  __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$deleteProduct = $db->fetchID("product",$id);
if(empty($deleteProduct)){
    $_SESSION['error'] = "Dữ liệu không tồn tại.";
    redirectAdmin("product");
}
//Erorr rỗng thì không có lỗi
if(empty($error)){
    $id_delete = $db->delete("product",$id);
    if($id_delete > 0){
        $_SESSION['success'] = "Xóa thành công.";
        redirectAdmin("product");
    }
    else {
        //them khong thanh cong !
        $_SESSION['error'] = "Xóa không thành công.";
        redirectAdmin("product");
    }
}

?>
