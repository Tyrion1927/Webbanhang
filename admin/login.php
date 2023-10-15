<!DOCTYPE html>
<html lang="vi"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập hệ thống</title>
    <link rel="shortcut icon" href="favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
     <style>
        body {
            background: #34495e;
        }
        #loginForm {
            width: 300px;
            min-height:200px;
            padding: 20px;
            margin: 120px auto 0;
            background:#fff;
            border-radius: 7px;
        }
    </style>
</head>
<?php
if(isset($_POST["btnsubmit"]))
{
    $emailadmin= $_POST["emailadmin"];
    $passwordadmin = md5($_POST["passwordadmin"]);
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    //$emailadmin = strip_tags($emailadmin);
    //$emailadmin = addslashes($emailadmin);
    //$passwordadmin = strip_tags($passwordadmin);
    //$passwordadmin = addslashes($passwordadmin);
    if ($emailadmin == "" || $passwordadmin =="")
    {
        echo '<div class="login-box" style="">
				Các trường không được để trống!
				</div>
				<div id="mask" style="display:block;opacity: 0.7 !important;background: #000 !important;"></div>';
    }
    else
    {
        $query = mysqli_query($conn,"select * from admin where email = '$emailadmin' and password = '$passwordadmin' ");
        $items_query = mysqli_fetch_array($query);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo '<div class="login-box" style="">
						Tên đăng nhập hoặc mật khẩu không đúng !
					</div>
				<div id="mask" style="display:block;opacity: 0.7 !important;background: #000 !important;"></div>';
        }
        else
        {
            print_r($emailadmin);
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['emailadmin'] = $emailadmin;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: http://localhost:8080/webbanhang/admin');
        }
    }
}
?>
    <div id="loginForm">
    <form action="" class="form-signin" role="form" method="post">
       <div class="form-group" style="text-align: center"><h4>ĐĂNG NHẬP HỆ THỐNG</h4></div>
        <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
              <input name="emailadmin" type="email"  class="form-control" id="email" placeholder="Email" maxlength="100" required="">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input name="passwordadmin" type="password" class="form-control" id="password" placeholder="Mật khẩu" required="">
            </div>
        </div>
         <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i>Đăng nhập</button>
        <button class="btn btn-danger" style="margin-left: 25px;">Quên mật khẩu?</button>
    </div>
</form>
        </div>
</body>
</html>
