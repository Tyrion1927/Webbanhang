<script>
	function check(){
		if(document.frmlogin.txtname.value =="" ||document.frmlogin.txtpwd.value ==""){
			alert('Đề nghị nhập đủ tài khoản và mật khẩu');
			return false;
		}else{
			alert('Đã nhập đủ tài khoản và mật khẩu');
			return true;
		}
	}
</script>
<?php
	
	$frmlogin = <<<ABC
	<form name = 'frmlogin' action = '' method = 'POST' onsubmit = 'return check();'>
	Account<input name = 'txtname'><br>
	Password<input type = 'password' name = 'txtpwd'><br>
	<input type = submit name = 'login' value = 'Đăng nhập'>
</form>
ABC;
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'CNPM60_1';
	//TH1: Chưa có CSDL (Khi dùng câu lệnh CREATE DATABASE)
	$con1 = mysqli_connect($server,$username,$password);
	//TH2: Khi đã có CSDL (Dùng câu lệnh CREATE TABLE, INSERT, UPDATE, SELECT, DELETE, DROP, ALTER)
	$con2 = mysqli_connect($server,$username,$password,$db,3306);
	if($con1){
		//echo "Kết nối thành công (Chưa có CSDL)";
	}else{
		//echo "Kết nối không thành công ".mysqli_error($con1);
	}
	if($con2){
		//echo "Kết nối thành công (Đã có CSDL)";
	}else{
		echo "Kết nối không thành công ".mysqli_error($con2);
	}
	$con3 = mysqli_connect($server,$username,$password,'mysql',3306);
	mysqli_set_charset($con3,"utf8");
?>