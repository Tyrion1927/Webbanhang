<?php
@session_start();
if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $id = $_GET['id'];
    if (empty($id)) {
        unset($_SESSION['cart']);
    } else {
        unset($_SESSION['cart'][$id]);
    }
header('location: '.$_SERVER['HTTP_REFERER']); //Trở về trang trước
}else{echo "Lỗi";}
?>