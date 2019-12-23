<?php
require_once  __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$deleteAdmin = $db->fetchID("admin",$id);
if(empty($deleteAdmin)){
    $_SESSION['error'] = "Dữ liệu không tồn tại.";
    redirectAdmin("admin");
}
    $id_delete = $db->delete("admin",$id);
    if($id_delete > 0){
        $_SESSION['success'] = "Xóa thành công.";
        redirectAdmin("admin");
    }
    else {
        $_SESSION['error'] = "Xóa không thành công.";
        redirectAdmin("admin");
    }
?>


