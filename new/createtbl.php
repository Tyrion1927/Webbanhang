<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	$sql = "CREATE TABLE IF NOT EXISTS student(
	id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	msv varchar(10),
	hovaten varchar(50)
	)";
	//152105xxxx
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	//Bước 3: Xử lý kết quả trả về
	if(mysqli_query($con2,$sql)){
		echo "Tạo thành công bảng student";
	}else{
		echo "Tạo bảng không thành công ".mysqli_error($con2);
	}
	//Bước 4: Đóng kết nối
	mysqli_close($con2);
?>