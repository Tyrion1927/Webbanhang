<?php
@session_start();
if (isset($_GET['id']) && $_GET['id'] != NULL) {
    $id = $_GET['id'];
    $prd = NULL;
    if (!empty($_SESSION['cart'][$id])) {
        $prd = $_SESSION['cart'][$id] + 1;
    } else {
        $prd = 1;
        echo "Bạn chưa chọn sản phẩm";
    }
    $_SESSION['cart'][$id] = $prd;
    header('location: ' . $_SERVER['HTTP_REFERER']); //Trở về trang trước
}
else{echo "Lỗi";}
?>