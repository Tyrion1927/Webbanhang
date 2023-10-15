<?php
	session_start();
?>
<html>
<head>
	<title><?php
?></title>
</head>
<!--<input type="date" data-date="" data-date-format="DD/MM/YYYY" value="2015-08-09">-->
<script>
	//a = "World!";
	//echo("Hello a");
</script>
<body>
	<!--Chỗ này để Menu do bạn B làm-->
	<?php 
		include('menub.php');
		//require('menub.php');
	?>
</body>
<?php
	$_SESSION['username']='Quản trị viên';
	echo "Xin chào ".$_SESSION['username'];
	echo "<br><a href = '20180522_2.php'>Vào hệ thống</a>";
	//Nhóm trưởng: Khi nào click vào trang 20180522_2.php xong thì hiển thị bài của Nguyễn Văn A vào chỗ này
	if(isset($_SESSION['a'])){
		include('diem.php');
	}
	$x = 100;
	$y = 1000;
	function add(){
		global $x,$y;
		return $x+$y;
	}
	echo add();
	
	$thu = array(100=>"Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
	foreach($thu as $x){
		if($x == "Thứ ba") continue;
		echo "<h1>$x</h1>";
		
	}
	
	$x = 1;
	$y = 0;
	if($x XOR $y){
		echo "<br>Bạn được thuê phòng";
	}else{
		echo "<br>Mời bạn thuê thêm phòng nữa";
	}
	echo ($x XOR $y)?"<h1>Bạn được thuê phòng</h1>":"<h1>Mời bạn thuê thêm phòng nữa</h1>";
	
	echo "Hello "." Đức";
	$a = "He";
	$doc = <<<HEREDOC
	<form name = 'frm1'>$a
			<input type = number name = 'a' onchange = "alert('a changed');" on>
			<input type = button onclick = 'alert(minus(frm1.a.value,frm1.b.value));' value = ' - '>
			<input type = number name = 'b'>
		</form>
HEREDOC;
	echo $doc;
	
	//echo "{$a}llo";
	$x = array(123,456);
	echo "$allo";
	$a = "World!";
	echo "Biến \$a có giá trị là:{$a} {$x[1]}";
	echo 'Hello $a';
	$A = "Hello";
	$a = "Hello 2";
	$$A = "Hello 3";
	//echo $hello;
	echo $A;
	echo $a;
	echo $Hello;
	for($i=1;$i<=10;$i++){
		
		if($i<=5){?>
		i nhỏ hơn hoặc bằng 5
		<?php
	}else{
		?>
		i lớn hơn 5
		<?php
	}

//print_r($_GET);
/* require('simplehtmldom_1_5/simple_html_dom.php');
 
// Website link to scrap
$website = 'https://www.thegioididong.com/dtdd';
 
// Create DOM from URL or file
$html = file_get_html($website);

foreach($html->find('div.manufacture aside label a') as $a){
	$x = str_replace('href="',"href=\"{$website}",$a);
	echo explode('"',$x)[1];
	//Đây là URL cần tìm
} */
//echo $html->find('div.manufacture aside label a')->href . '<br>';

// Print webpage content  
//echo $html;
/* //get the sub pages for the parent page
	$p = 'https://thegioididong.com/';
    $subPages = get_pages('child_of'=>$p);
    //$i will equal the page number
    $i=1;
    foreach($subPages as $subs){
        //not sure what the exact array key for page_id will be. use var_dump($subPages)to find out
        //make the array key the page id for use later (as current_page_id)
        $pageNumber[$subs->page_id] = $i;
		echo $subs;
    }
    $numberPages = count($pageNumbers);
	 */
	 }
	?>
</html>