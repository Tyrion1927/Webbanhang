<?php
	include('common.php');
	if(isset($_REQUEST['login'])){
		$name = $_REQUEST['txtname'];
		$pwd = $_REQUEST['txtpwd'];
		if($name=='admin' && $pwd == 'abc'){
			header("Location:20180522.php");
		}else{
			echo "<font color=red>Tên đăng nhập hoặc mật khẩu không đúng</font><br>";
			echo $frmlogin;
		}
	}else{
		echo $frmlogin;
	}
?>