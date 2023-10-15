<!DOCTYPE HTML>
<html lang="vi">

<body>
<?php
include("apps/config.php");
include_once ("apps/libs/header.php");?>
<div class="container">
<div id ="wrapper">
        <!-- banner --><div class="banner">
            <div class="owl-carousel owl-theme">

                <?php
                $banner_query = mysqli_query($conn,"SELECT * FROM banner ORDER BY id_banner ASC limit 5");
                while ($banner_items = mysqli_fetch_array($banner_query)){
                    echo '<div class="owl-carousel owl-theme">';
                    echo ' <div class="item"><img src="images/'.$banner_items['link_banner'].'" alt="'.$banner_items['name_banner'].'"></div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div><!--end banner-->
<!--body -->
        <div class="sliderows">
            <div class="navicate">
                <h2 class="parent">
                    <a href="#" tittle="TÚI XÁCH TAY">TÚI XÁCH TAY</a>
                </h2><!--end parent-->
                <div class="sub">
                    <?php
                    $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=25") or die('Cannot select table!');
                    $balo_items = mysqli_fetch_array($balo_res);
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_catalog']."'>Xem tất cả</a>";
                    ?>
                </div><!--end sub-->
                <?php
                $tuixach_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=25") or die('Cannot select table!');
                while ($tuixach_items = mysqli_fetch_array($tuixach_res))
                {
                ?>
                <h2 class="sub">
                    <?php
                    echo"<a href='sanpham.php?id_menu=".$tuixach_items['id_sub']."'>". $tuixach_items['name_sub']." </a>";
                    echo"</h2>";
                    }
                    ?>
            </div><!--end navicate-->
            <a href="#" tittle="tieu de 1" target="_blank">
                <img class="banner_rows" src="images/banner/banner1.png" alt="1"/>
            </a>
            <div class="selling">
                <a href="#" tittle="tieu de 2" target="_blank">
                    <img src="images/banner/banner2.jpg" alt="2"/>
                </a>
            </div><!--end selling-->
            <div class="row_product">
                <div class="row_product_1">

                        <?php
                        $tuixach_query="SELECT * FROM sanpham where id_catalog=25 limit 8";
                        $tuixach_res = mysqli_query($conn,$tuixach_query) or die('Cannot select table!');
                        while ($tuixach_items = mysqli_fetch_array($tuixach_res))
                        {
                            ?>
                            <div class="product-item" >
                                <div class="row_product_h">
                                    <?php
                                    echo"
					<a href='chitiet.php?id=".$tuixach_items['id_sanpham']."' class='images'>
						<img alt='".$tuixach_items['tensp']."' src='images/".$tuixach_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$tuixach_items['tensp']."' href='chitiet.php?id=".$tuixach_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$tuixach_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($tuixach_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$tuixach_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ </div></a>
					";
                                    ?>
                                </div><!--end row_product_h-->
                            </div><!--end owl-item--->
                            <?php
                        }
                        ?>
                </div><!--end owl-wrapper-outer-->
            </div><!---end row_product owl-carousel owl-theme-->
        </div><!--end sliderows 1-->
        <!-- sliderows 2-->
        <div class="sliderows">
            <div class="navicate">
                <h2 class="parent">
                    <a href="#" tittle="VÍ-BÓP">VÍ - BÓP</a>
                </h2><!--end parent-->
                <div class="sub">
                    <?php
                    $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=27") or die('Cannot select table!');
                    $balo_items = mysqli_fetch_array($balo_res);
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_catalog']."'>Xem tất cả</a>";
                    ?>
                </div><!--end sub-->
                <?php
                $balo_res = mysqli_query($conn,"SELECT * FROM sub_menu WHERE id_catalog=27") or die('Cannot select table!');
                while ($balo_items = mysqli_fetch_array($balo_res))
                {
                ?>
                <h2 class="sub">
                    <?php
                    echo"<a href='sanpham.php?id_menu=".$balo_items['id_sub']."'>". $balo_items['name_sub']." </a>";
                    echo"</h2>";
                    }
                    ?>
            </div><!--end navicate-->
            <a href="#" tittle="tieu de 1" target="_blank">
                <img class="banner_rows" src="images/banner/banner3.jpg" alt="1"/>
            </a>
            <div class="selling">
                <a href="#" tittle="tieu de 2" target="_blank">
                    <img src="images/banner/banner5.png" style="height: 310px;" alt="2"/>
                </a>
            </div><!--end selling-->
            <div class="row_product">
                <div class="row_product_1">
                    <?php
                    $balo_query="SELECT * FROM sanpham where id_catalog=27 limit 8";
                    $balo_res = mysqli_query($conn,$balo_query) or die('Cannot select table!');
                    while ($balo_items = mysqli_fetch_array($balo_res))
                    {
                        ?>
                        <div class="product-item" >
                            <div class="row_product_h">
                                <?php
                                echo"
					<a href='chitiet.php?id=".$balo_items['id_sanpham']."' class='images'>
						<img alt='".$balo_items['tensp']."' src='images/".$balo_items['image_sp']."'>
					</a>
					<h2>
					<a title='".$balo_items['tensp']."' href='chitiet.php?id=".$balo_items['id_sanpham']."' style='text-align: center;display: inherit;font: 16px/20px \"Roboto\",Helvetica,Arial,sans-senif;'>".$balo_items['tensp']."</a>
					</h2>
					<div class='price' style='text-align: center;'>".number_format($balo_items['price'])." VNĐ</div><!--end price-->
					<div class='ratings'>
						<div class='rating-box'></div><!--end ratingbox-->
					</div><!--end ratings-->
					<a href='add-cart.php?id=".$balo_items['id_sanpham']."'><div class='add_cart''><i></i>THÊM VÀO GIỎ</div></a>
					";
                                ?>
                            </div><!--end row_product_h-->
                        </div><!--end owl-item--->
                        <?php
                    }
                    ?>


                </div><!--end owl-wrapper-outer-->
            </div><!---end row_product owl-carousel owl-theme-->
        </div><!--end sliderows-->
</div><!--End Wrapper--->
</div>
<!------------------------------------------FOOTER------------------------------------------------------>
<?php include ("apps/libs/footer.php");?>
<!------------------------------------------END FOOTER------------------------------------------------------>
</body>
</html>