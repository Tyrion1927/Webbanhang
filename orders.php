<?php
include ("apps/config.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Đặt hàng</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/fontawesome-all.min.css" media='all'/>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.theme.default.min.css">
</head>
<body>
        <?php
        if($_SESSION['cart'] != NULL) {
            echo "
            <form method='post'>
            <div class='main-shopping'>
            <p class='cart_info'>
            Thông tin chi tiết giỏ hàng!";
            $now = getdate();
            $currentDate = $now["year"] . "-" . $now["mon"] . "-" . $now["mday"];
            if (isset($_POST['btDathang']) && isset($_SESSION['username']) && isset($_SESSION['cart'])) {
                $khachhang = mysqli_query($conn, "SELECT * FROM user WHERE username ='" . $_SESSION['username'] . "'");
                $items = mysqli_fetch_array($khachhang);
                $hoten = $items['fullname'];
                $time = getdate();
                $currentDate = $time["year"] . "-" . $time["mon"] . "-" . $time["mday"];
                foreach ($_SESSION['cart'] as $id => $prd) {
                    $arr_id[] = $id;
                }
                $str_id = implode(',', $arr_id);
                $item_query = "SELECT * FROM  sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC";
                $item_result = mysqli_query($conn, $item_query) or die ('Cannot select table!');
                while ($rows = mysqli_fetch_array($item_result)) {
                    //insert table giaodich
                    $insert = mysqli_query($conn,"INSERT INTO giaodich(user_id,user_name, user_email, user_phone, address, amount) VALUES(N'".$items['id']."',N'".$hoten."',N'".$items['email']."',N'".$items['phone']."',N'".$items['address']."',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "')");
                    //insert table donhang
                    $insert = mysqli_query($conn, "INSERT INTO donhang(id_product,quantity,amount,created) VALUES (N'" . $rows['id_sanpham'] . "',N'" . $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $currentDate . "')");
                }
                echo '<span class="sc_infor">Đặt hàng thành công</span><br/><br/><span class="sc_inforr">Thắc mắc xin vui lòng liên hệ:0964876096</span>';
                unset($_SESSION['cart']);
                echo '<span class="sc_inforr">Ấn vào <strong><a href="'.$base.'" class="day">đây</a></strong> để quay lại trang chủ!</span>';
            }
            elseif (isset($_POST['dathang_two']) && isset($_SESSION['cart'])) {
                    $fullname = $_POST['fn'];
                    $em = $_POST['em'];
                    $dt = $_POST['tphone'];
                    $ar = $_POST['ar'];
                    $nt = $_REQUEST['notetext'];
                    $time = getdate();
                    $currentDate = $time["year"] . "-" . $time["mon"] . "-" . $time["mday"];
                foreach ($_SESSION['cart'] as $id => $prd) {
                    $arr_id[] = $id;
                }
                $str_id = implode(',', $arr_id);
                $item_result = mysqli_query($conn, "SELECT * FROM sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC") or die ('Cannot select table!');
                while ($rows = mysqli_fetch_array($item_result)) {
                    //insert table giaodich
                    $insert = mysqli_query($conn,"INSERT INTO giaodich(user_name, user_email, user_phone, address, message, amount) VALUES('".$fullname."','".$em."','".$dt."','".$ar."','".$nt."',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "')");
                    //insert table donhang
                    $insert = mysqli_query($conn, "INSERT INTO donhang (id_product,quantity,amount,created) VALUES (N'" . $rows['id_sanpham'] . "',N'" . $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $rows['price'] * $_SESSION['cart'][$rows['id_sanpham']] . "',N'" . $currentDate . "')");

                }
                echo '<span class="sc_infor">Đặt hàng thành công.</span><br/><br/><span class="sc_inforr">Thắc mắc xin vui lòng liên hệ:0964876096</span>';
                unset($_SESSION['cart']);
                echo '<span class="sc_inforr">Ấn vào <strong><a href="' . $base . '" class="day">đây</a></strong> để quay lại trang chủ!</span>';
            }
            echo '</p></div><!--end main shopping-->
                </form>';
        } else{echo"Hiện tại bạn chưa có sản phẩm nào!";}
        ?>
<div class="clear10px"></div>
<div class="clear50px"></div>
</body></html>