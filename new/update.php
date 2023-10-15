<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	$msvnew = '1521050002';
	$hvtnew = 'Nguyen Van B';
	$where = "WHERE id = 1";
	$sql = "UPDATE student SET msv = '$msvnew', hovaten = '$hvtnew' $where";
	//152105xxxx
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	//Bước 3: Xử lý kết quả trả về
	if(mysqli_query($con2,$sql)){
		echo "Sửa dữ liệu thành công";
	}else{
		echo "Sửa dữ liệu không thành công ".mysqli_error($con2);
	}
	//Bước 4: Đóng kết nối
	mysqli_close($con2);
?>