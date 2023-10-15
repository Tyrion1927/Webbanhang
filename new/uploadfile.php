<META NAME = "HTTP-EQUV" Charset = "UTF-8">
<?php
	include('config.php');
	//Đầu tiên, kiểm tra xem tác vụ có phải là upload hay không: 
	if ($_SERVER["REQUEST_METHOD"] != "POST" ) { 
	//thông báo lỗi không phải là method POST và thoát 
	exit(-1); 
	} 
	//Tiếp theo kiểm tra xem quá trình upload có lỗi gì không:
	if ($_FILES["img"]["error"] > 0){
	  //thông báo lỗi dựa vào giá trị của $_FILES["img"]["error"] và thoát 
	  echo "Error: " . $_FILES["img"]["error"] . "<br />";
	  exit(-1); 
	  }
	else
	  {
	  echo "Upload: " . $_FILES["img"]["name"] . "<br />";
	  echo "Type: " . $_FILES["img"]["type"] . "<br />";
	  echo "Size: " . ($_FILES["img"]["size"] / 1024) . " Kb<br />";
	} 
	if ($_FILES["img"]["size"] < $_REQUEST['MAX_FILE_SIZE']){
	  /* if ($_FILES["img"]["error"] > 0){
		echo "Error: " . $_FILES["img"]["error"] . "<br />";
		exit(-1);
		} */
	}else{
		echo "Error: " . $_FILES["img"]["error"] . "<br />";
		exit(-1);
	}
	//Tách tên file từ client: 
	$temp = preg_split('/[\/\\\\]+/', $_FILES["img"]["name"]); 
	$filename = $temp[count($temp)-1]; 
	//Và cuối cùng, lưu file được upload vào nơi cần thiết:
	move_uploaded_file($_FILES["img"]["tmp_name"],"upload/{$_FILES['img']['name']}");
	$sql = "INSERT INTO images(imgname,url) VALUES('{$_FILES['img']['name']}','upload/{$_FILES['img']['name']}' )";
	mysqli_query($con,$sql);
	echo $sql;
/* 	$imgsize = getimagesize("upload/{$_FILES['img']['name']}");
	$height = 250;
	$width = $imgsize[0]*250/$imgsize[1]; */	
/* 	echo "<script>window.setTimeout(window.history.back(), 3000);</script>";
	}else{
		echo "<script>window.history.back();</script>";
	} */
	mysqli_close($con);
?>