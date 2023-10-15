<!DOCTYPE HTML>
<html>
<?php
include ('apps/config.php');
include ("apps/libs/header.php");
?>
<section class="content_ldd">
    <!-- Bên trái -->
    <aside class="filter" id="filter_cate">
        <div class="filter_v">
            <div class="general">
                <ul class="menu_left">
                   <li><a href='#' class='tittlea'>LỌC SẢN PHẨM</a>
									<ul class='menu_in_left'>
                        <li><a href='#'>chưa có</a></li>

									</ul>
						</li>
                </ul>
            </div><!--end general-->
        </div><!--end filter_v-->
    </aside><!--end ben trai -->
    <aside class="product_l">
         <div class="product_boder">
             <?php
if (!empty($_GET['s'])) {
    // Nếu người dùng submit form thì thực hiện
    /*        $_GET=array_change_key_case($_GET,CASE_LOWER);*/
    // Gán hàm addslashes để chống sql injection
    $search = addslashes($_GET['s']);
    $result = mysqli_query($conn,"SELECT COUNT(id_sanpham) AS total FROM sanpham WHERE tensp LIKE '%$search%'");
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total']; //gán tổng số record là total, đếm bằng id sản phẩm
    // tim limit va current
    $current_page = isset($_GET['page']) ? $_GET['page']:1; //kiểm tra $_GET['page'] khi bấm trang kế có tồn tại không
    $litmit =4; // tổng số record trên 1 trang
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
    $result = mysqli_query($conn,"SELECT * FROM sanpham where tensp LIKE '%$search%' LIMIT {$start}, {$litmit}");
    ?>
    <?php
    if (!empty($result)){
        while ($row = mysqli_fetch_assoc($result))
        {
            echo"<div class='product_item'>";
            echo"
							<a href='chitiet.php?id=".$row['id_sanpham']."' class='images'>
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
    else {echo "Không tìm thấy sản phẩm";}
    ?>
    <?php echo "</div><!--end product_boder-->";?>
    <div class="phan_trang" style="margin-left: calc(936px/2);">
        <?php
        if($current_page > 1 && $total_page > 1)
        {
            echo "<a href='search.php?s=".$search."&page=".($current_page - 1)."'>
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
                echo '<li><a href="search.php?s='.$search.'&page='.$i.'">'.$i.'</a></li>';
        }
        echo"</ul>";
        if($current_page < $total_page  && $total_page > 1)
        {
            echo "<a href='search.php?s=".$search."&page=".($current_page + 1)."'>
							<b class='next'></b>
						</a>";
        }

        ?>
<?php } else {?>
    <?php  echo "Bạn chưa nhập từ khóa tìm kiếm";} ?>
    </div><!--end phan_page-->
</aside><!--end ben phai-->
</section><!--end content ld-->
<?php require("apps/libs/footer.php"); ?>
</html>
