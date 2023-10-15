<head>
	<meta charset = 'utf8'>
</head>
<?php
	//Bước 2: Xây dựng truy vấn
	include('common.php');
	if(isset($_REQUEST['q'])) 
		$keyword = $_REQUEST['q'];
	else
		$keyword = "";
	$where = "WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%'";
	//Phân trang
	if(isset($_REQUEST['p'])) 
		$curpage = $_REQUEST['p'];
	else
		$curpage = 1;
	//$con3 = mysqli_connect($server,$username,$password,'mysql',3306);
	$ppage = 10;//Số bản ghi trên 1 trang
	$start = ($curpage-1)*$ppage;
	$pages = "LIMIT $start,$ppage";
	//SELECT * FROM... WHERE ... LIMIT 0,10   10,10    20,10
	$sql = "SELECT * FROM help_topic $where $pages";
	//echo $sql;
	//Bước 2':Thực hiện truy vấn
	$result = mysqli_query($con3,$sql);
	//Bước 3: Xử lý kết quả trả về
	echo "<ol>";
	while($row = mysqli_fetch_array($result)){
		echo "<li><dl>
			<dt>{$row['name']}
			<dd>{$row['description']}
		</dl>";
	}
	echo "</ol>";
	//Bước 4: Đóng kết nối
	mysqli_close($con3);
?>