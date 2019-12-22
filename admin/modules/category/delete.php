<?php
require_once  __DIR__."/../../autoload/autoload.php";
$id = intval(getInput('id'));
$deleteCategory = $db->fetchID("category",$id);
if(empty($deleteCategory)){
    $_SESSION['error'] = "Dữ liệu không tồn tại.";
    redirectAdmin("category");
}
    $is_product = $db->fetchOne("product","category_id = '$id'");
    //Kiểm tra xem danh mục có sản phẩm chưa
    if($is_product == NULL){
        $id_delete = $db->delete("category",$id);
        if($id_delete > 0){
            $_SESSION['success'] = "Xóa thành công.";
            redirectAdmin("category");
        }
        else {
            //them khong thanh cong !
            $_SESSION['error'] = "Xóa không thành công.";
            redirectAdmin("category");
        }
    }
    else {
        $_SESSION['error'] = "Không thể xóa. Danh mục đã có sản phẩm.";
        redirectAdmin("category");
    }

?>


