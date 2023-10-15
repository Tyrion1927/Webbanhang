<?php
include "apps/config.php";
//Kiểm tra - thông báo lỗi
if(isset($_POST["btnsubmit"]))
{
    $username= $_POST["user_name"];
    $password = md5($_POST["password"]);
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    //$username = strip_tags($username);
    //$username = addslashes($username);
    //$password = strip_tags($password);
    //$password = addslashes($password);
    if ($username == "" || $password =="")
    {
        $errors =  '<div id="errformlg" style="">
				Các trường không được để trống!
				</div>';
    }
    else
    {
        $query = mysqli_query($conn,"select * from user where username = '$username' and password = '$password' ");
        $items_query = mysqli_fetch_array($query);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows==0) {
            $errors =  '<div id="errformlg">
						Tên đăng nhập hoặc mật khẩu không đúng !
					</div>';
        }
        else
        {
            //tiến hành lưu tên đăng nhập vào session
            $_SESSION['username'] = $username;		
            //tiến hành chuyển hướng trang web tới trang chủ khi đã lưu session
           header('Location: index.php');
        }
    }
}
?>
<!DOCTYPE HTML>
<html lang="vi">
<?php include "apps/libs/header.php"; ?>
<body>
<!--ĐĂNG NHẬP-->
<div class="login-box">
    <div class="acctitle">
        <i class="fa fa-lock"></i>
        Đăng nhập
    </div>
    <form method="post" class="signin" action="">
        <fieldset class="textbox">
            <label class="user_name">
                <span>Tên tài khoản hoặc email</span>
                <input type="text" name="user_name" id="user_name" value=""/>
            </label>

            <label class="password">
                <span>Mật khẩu</span>
                <input type="password" name="password" id="password" value="" />
            </label>

            <button class="submit button" type="submit" name="btnsubmit">Đăng nhập</button>

            <div class="dk-qmk">
                <a class="forgot" href="#">Quên mật khẩu?</a> <a href="/Webbanhang/register.php" class="register">Đăng ký</a>
            </div>
        </fieldset>
    </form>

</div><!--end login-->
<?php
if(!empty($errors)) echo $errors;
?>
<!--end login-->
<!--END ĐĂNG NHẬP-->
<?php include ("apps/libs/footer.php");

?>
</body>
</html>
