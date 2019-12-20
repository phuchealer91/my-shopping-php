<?php
$id = intval(getInput('id'));
$deleteCategory = $db->fetchID("category",$id);
if(empty($deleteCategory)){
    $_SESSION['error'] = "Dữ liệu không tồn tại.";
    redirectAdmin("category");
}
    //Erorr rỗng thì không có lỗi
    if(empty($error)){
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

?>


