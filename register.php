<!DOCTYPE HTML>
<html lang="vi">
<?php
ob_start();
include "apps/config.php";
include "apps/libs/header.php";
// so san pham da add vao cart
$prd = 0;
if(!empty($_SESSION['cart'])) $prd = count($_SESSION['cart']);
?>
<body>
<div class="navigation">
</div>
<div class="re-gis">
    <h1 class="DKTT"> Người dùng mới? Đăng ký tài khoản</h1>
    <form action="register.php" method="post" name="formdk">
        <label>Họ và tên:</label><br/>
        <input type="text" name="ht" class="ht" required/> <br/>
        <label>Địa chỉ email:</label><br>
        <input type="email" name="email" class="em" required>
        <br>
        <label>Tên đăng nhập:</label><br>
        <input type="text" name="tendn" class="tdn" required/>
        <br/>
        <label>Mật khẩu:</label><br>
        <input type="password" name="pw" class="pw" required/>
        <br/>
        <label>Xác nhận mật khẩu:</label><br>
        <input type="password" name="xnpw" class="xnpw" required/>
        <br/>
        <label>Điện thoại:</label><br>
        <input type="tel" name="sdt" maxlength="11" class="sdt" required/>
        <br/>
        <label>Địa chỉ giao hàng:</label><br>
        <input type="text" name="dcgh" class="dcgh"/>
        <br/>
        <!--        Giới tính:<br>
                <br>
                <input type="radio" name="gt" value="Nam" class="gt"/>Nam <input type="radio" name="gt" value="Nữ" class="gt"/>Nữ<br/>-->
        <input type="submit" name="sbmit" class="btn-reg" value="Đăng ký">
        <input type="reset" name="rs" class="btn-reset" value="Reset">
    </form></div><!--end re-gis-->
<?php

if(isset($_POST['sbmit']))
{
    $hoten=trim($_POST['ht']);
    $email=$_POST['email'];
    $tendn=$_POST['tendn'];
    $pw=md5($_POST['pw']);
    $xnpw=md5($_POST['xnpw']);
    $sdt=$_POST['sdt'];
    $dcgh =$_POST['dcgh'];
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    $dk_query = mysqli_query($conn,"SELECT * FROM user");
    $dk_items  = mysqli_fetch_array($dk_query);
    $dk_querys = mysqli_query($conn,"SELECT * FROM user where username='".$tendn."'");
    $dk_itemss  = mysqli_fetch_assoc($dk_querys);
    //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
    if(!$hoten || !$email || !$tendn || !$pw || !$xnpw || !$sdt || !$dcgh)
    {
        echo '<span id="errformdk">Vui lòng nhập thông tin đầy đủ!<a href="javascript: history.go(-1)">Trở lại</a></span>';
        exit;
    }
    elseif($dk_itemss['username'] == "$tendn") {
        echo "<span id=\"errformdk\">Tên đăng nhập này đã có. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></span>";
        exit;
    }
    else {
            if (!preg_match($regex, $email)) {
                echo '<span id="errformdk">Địa chỉ email nhập không đúng!<a href="javascript: history.go(-1)">Trở lại</a></span>';
                exit;
            } else {
                if (!is_numeric($sdt)) {
                    echo '<span id="errformdk">Số điện thoại nhập không đúng!<a href="javascript: history.go(-1)">Trở lại</a></span>';
                    exit;
                } else {
                    if ($pw == $xnpw) {
                        $insert = mysqli_query($conn, "INSERT INTO user (fullname,email,phone,username,password,created,level,address,idgroup) VALUE ('" . $hoten . "','" . $email . "','" . $sdt . "','" . $tendn . "','" . $pw . "','0','3','" . $dcgh . "', '0')");
                        if ($insert) {
    				echo "<span id=\"errformdk\">Đăng ký thành công!</span>";
    				//header('location: index.php');
			} else {
    				echo "Lỗi SQL: " . mysqli_error($conn);
			}
                        //echo "<span id=\"errformdk\">Đăng ký thành công!</span>";
                        //header('location: index.php');
                    } else {
                        echo '<span id="errformdk">Xác nhận mật khẩu không trùng khớp!</span>';
                    }
                }
            }

    }
}
?>


<div class="clear10px"></div>
<?php include ("apps/libs/footer.php");
ob_end_flush();
?>
</body>
</html>
