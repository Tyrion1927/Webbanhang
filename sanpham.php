<!DOCTYPE HTML>
<html>
<?php
require ("apps/config.php");
require ("apps/libs/header.php");
?>
<body>
<section class="content_ldd">
<!-- Phan ben trai -->
    <aside class="filter" id="filter_cate">
        <div class="filter_v">
            <div class="general">
                <ul class="menu_left">
                    <?php
                    $menu_left_res =mysqli_query($conn,"select * from sub_menu");
                    echo "<li><a href='#' class='tittlea'>TÚI XÁCH</a>
									<ul class='menu_in_left'>";
                    while($menu_left_items = mysqli_fetch_array($menu_left_res))
                    {
                        echo"<li><a href='sanpham.php?id_menu=".$menu_left_items['id_sub']."'>". $menu_left_items['name_sub']." </a></li>";
                    }
                    echo "
									</ul>
						</li>";
                    ?>
                </ul>
            </div><!--end general-->
        </div><!--end filter_v-->
    </aside><!--end ben trai -->

    <!-- Phan ben Phai -->
<aside class="product_l">
    <div class="product_boder">
        <?php
        $id_menu= $_GET["id_menu"];
        settype($id_menu,"int");
        // tong so records
        $result = mysqli_query($conn,"select count(id_sanpham) as total from sanpham where id_sub ={$id_menu} or id_catalog = {$id_menu}");
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // tim limit va current
        $current_page = isset($_GET['page']) ? $_GET['page']:1; //kiểm tra $_GET['page'] khi bấm trang kế có tồn tại không
        $litmit =8; // tổng số record trên 1 trang
        $total_page =ceil($total_records / $litmit); // tổng số page khi mỗi page hiển thị bao nhiêu sp
        if($current_page > $total_page )
        {
            $current_page = $total_page;
        }
        else if($current_page < 1 )
        {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $litmit;
        $result = mysqli_query($conn,"SELECT * FROM sanpham where id_sub ={$id_menu} or id_catalog = {$id_menu} LIMIT {$start}, {$litmit}");
        ?>

        <?php
        if (!empty($total_records)){
        while ($row = mysqli_fetch_assoc($result))
        {
            echo"<div class='product_item'>";
            echo"
							<a href='product/".$row['id_sanpham']."' class='images'>
							<img alt='".$row['tensp']."' src='images/".$row['image_sp']."'>
							</a>
							<h2 style='margin-top:0;margin-bottom:0;'>
							<a title='".$row['tensp']."' href='chitiet.php?id=".$row['id_sanpham']."'>".$row['tensp']."</a>
							</h2>
							<div class='price'>".number_format($row['price'])." VNĐ</div><!--end price-->
							<div class='ratings'>
								<div class='rating-box'>
								</div><!--end ratingbox-->
							</div><!--end ratings-->
							<a href='add-cart.php?id=".$row['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ </div></a>
							";
            echo "</div><!--end product_items-->";
        }
        }
        else {echo "Sản phẩm hiện tại chưa có";}
        ?>

    </div><!--end product_boder-->
    <div class="phan_trang" style="margin-left: calc(936px/2);">
        <?php
        if($current_page > 1 && $total_page > 1)
        {
            echo "<a href='sanpham.php?id_menu=".$id_menu."&page=".($current_page - 1)."'>
								<b class='prev'></b>
							</a>";
        }
        echo"<ul class='ul_phan_page'>";
        for($i = 1;$i <= $total_page;$i++)
        {
            if($i == $current_page)
            {
                echo "<li><span class='color_current'>".$i."</span></li>";
            }
            else
                echo '<li><a href="sanpham.php?id_menu='.$id_menu.'&page='.$i.'">'.$i.'</a></li>';
        }
        echo"</ul>";
        if($current_page < $total_page  && $total_page > 1)
        {
            echo "<a href='sanpham.php?id_menu=".$id_menu."&page=".($current_page + 1)."'>
							<b class='next'></b>
						</a>";
        }

        ?>
    </div><!--end phan_page-->
</aside><!--end ben phai-->
</section><!--end content ld-->
<?php require("apps/libs/footer.php"); ?>
</body>
</html>
<?php
/*code thử Lấy div bên index, không phân trang.
 * <!DOCTYPE HTML>
<html>
<head>
    <title>Website chuyên bán</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <!--<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css" media='all'/>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>
<body>
<?php
require ("apps/config.php");
require ("header.php");
?>
<div class="row_product_menu">
    <div class="row_product_1_menu">

        <?php
        $id_menu= $_GET["id_menu"];
        settype($id_menu,"int");
        $sp_query="SELECT * FROM sanpham WHERE id_sub ={$id_menu} limit 8";
        $sp_res = mysqli_query($conn,$sp_query) or die('Cannot select table!');
        while ($sp_items = mysqli_fetch_array($sp_res))
        {
            ?>
            <div class="product-item" >
                <div class="row_product_h">
                    <?php
                    echo"
					<a href='chitiet.php?id=".$sp_items['id_sanpham']."' class='images'>
						<img alt='".$sp_items['tensp']."' src='images/".$sp_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$sp_items['tensp']."' href='chitiet.php?id=".$sp_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$sp_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($sp_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$sp_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ</div></a>
					";
                    ?>
                </div><!--end row_product_h-->
            </div><!--end product-item--->
            <?php
        }
        ?>


    </div><!--row_product_1_menu-->
</div><!---end row_product_menu-->



</body>
</html>

*/?>
