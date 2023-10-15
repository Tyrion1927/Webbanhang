<?php
	session_start();
	if(isset($_SESSION['username'])){
		echo "Xin chào ".$_SESSION['username'];
		
	}else{
		echo "<a href = '20180522.php'>Đăng nhập</a>";
	}
	$_SESSION['a'] = 1;
?>