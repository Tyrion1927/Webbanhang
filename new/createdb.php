<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	$sql = "CREATE DATABASE IF NOT EXISTS $db";
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	//Bước 3: Xử lý kết quả trả về
	if(mysqli_query($con1,$sql)){
		//echo "Tạo thành công CSDL";
	}else{
		//echo "Tạo CSDL không thành công ".mysqli_error($con1);
	}
	//Bước 4: Đóng kết nối
	mysqli_close($con1);
?>