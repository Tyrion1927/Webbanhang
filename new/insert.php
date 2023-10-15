<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	$msv = '1521050001';
	$hvt = 'Nguyen Van A';
	$sql = "INSERT INTO student(msv,hovaten) VALUES(
	'$msv',
	'$hvt'
	)";
	//152105xxxx
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	//Bước 3: Xử lý kết quả trả về
	if(mysqli_query($con2,$sql)){
		echo "Thêm dữ liệu thành công";
	}else{
		echo "Thêm dữ liệu không thành công ".mysqli_error($con2);
	}
	//Bước 4: Đóng kết nối
	mysqli_close($con2);
?>