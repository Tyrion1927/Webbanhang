<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	$where = "WHERE id = 1";
	$sql = "DELETE FROM student $where";
	//152105xxxx
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	//Bước 3: Xử lý kết quả trả về
	if(mysqli_query($con2,$sql)){
		echo "Xóa dữ liệu thành công";
	}else{
		echo "Xóa dữ liệu không thành công ".mysqli_error($con2);
	}
	//Bước 4: Đóng kết nối
	mysqli_close($con2);
?>