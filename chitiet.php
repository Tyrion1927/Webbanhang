<!DOCTYPE HTML>
<html lang="vi">
<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'on');
ini_set('error_log', 'php.error.log');
// so san pham da add vao cart
$prd = 0;
if(!empty($_SESSION['cart'])) $prd = count($_SESSION['cart']);
?>
<body>
<?php
include("apps/config.php");
include("apps/libs/header.php");
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=1338759202892358&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="navigation">
    <div class="blackRum">
        	<span class="home">
            	<a href="http://localhost:8080/Websanpham">Trang chủ</a>
                 ›
            </span><!--end home-->
        <span class="home">
            	<?php
                $id = $_GET['id'];
                $sanpham_query ="SELECT * FROM sanpham where id_sanpham=".$id;
                $sanpham_res = mysqli_query($conn,$sanpham_query) or die("Cannot select table!");
                while ($sanpham_items = mysqli_fetch_array($sanpham_res))
                {
                echo'
								'.$sanpham_items["parent_name_menu"].'
							';

                echo '›';
                ?>
            </span><!--home-->
        <span class="home">
            	<?php
                echo ''.$sanpham_items["tensp"].'';
                echo ' ›';

                ?>
            </span><!--home-->
        <span class="tittleRum">
            	<?php
                echo ''.$sanpham_items["tensp"].'';
                }
                ?>
            </span><!--tittle rum-->
    </div><!--end blackRum-->
</div> <!--end navigation-->
<section class="product_d content_ld">
    <div class="detailP">
        <aside class="images_d">
            <div class="images_d_list owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper" style="width: 712px; left: 0px; display: block; transition: all 1000ms ease; transform: translate3d(0px, 0px, 0px);">
                        <div class="owl-item" style="width: 356px;">
                            <?php
                            $id = $_GET['id'];
                            $sanpham_query ="SELECT * FROM sanpham where id_sanpham=$id";
                            $sanpham_res = mysqli_query($conn,$sanpham_query) or die("Cannot select table!");
                            while ($sanpham_items = mysqli_fetch_array($sanpham_res))
                            {
                            echo'<img src="images/'.$sanpham_items["image_sp"].'">';

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </aside><!--end images_d-->
        <aside class="desProduct">
            <h1 class="detailPT">
                <?php
                echo $sanpham_items["tensp"];

                ?>
            </h1>
            <div class="des">
                <?php
                echo $sanpham_items['description'];

                ?>
            </div><!--des-->
            <div class="proFtiter">
                <?php
                echo 'Xuất xứ:';
                echo "<span>".$sanpham_items['xuatxu']."</span>";
                echo '&nbsp;&nbsp;Kích thước:';
                echo "<span>".$sanpham_items['sizess']."</span>";
                echo '&nbsp;&nbsp;Màu sắc:';
                echo "<span>".$sanpham_items['mausac']."</span>";

                ?>
            </div><!--proFtiter-->
            <div class="pr_det_price ">
                <span class="tittle">Giá bán:</span><!--tittle-->
                <div class="price">
                    <?php
                    echo "".number_format($sanpham_items['price'])." VNĐ";
                    }
                    ?>
                </div><!--end price-->
            </div><!--pr_det_price -->
            <div class="pro_dg">
                <div class="pro_dg_tt">
                    <div class="pro_dg_tt">
                        <div class='ratings'>
                            <div class='rating-box'>
                            </div><!--end ratingbox-->
                        </div><!--end ratings-->
                    </div><!--end pro_dg_tt-->
                </div><!--end pro_dg_tt-->
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://localhost:8080/webbanhang/chitiet.php?id=<?php echo $id; ?>" class="fb shareFa"></a>
                <a target="_blank" href="http://twitter.com/share?url=http://localhost:8080/webbanhang/chitiet.php?id=<?php echo $id; ?>" class="tw shareFa"></a>
                <a target="_blank" href="https://plus.google.com/share?url=http://sanphammtlpro.16mb.com/san-pham/page-chitiet.php?id=<?php echo $id; ?>" class="gg shareFa"></a>
            </div><!--end pro_dg-->
            <div class="proDha">
                <div class="btDah">
                    <span class="bttOp">ĐẶT HÀNG NHANH GIAO HÀNG NGAY</span>
                    <span class="btBt">Xem hàng tại nhà không mua không sao</span>
                </div><!--end btDah-->

                <div class="yctv"><a href="https://fb.com/linkerpt" target="_blank"> YÊU CẦU TƯ VẤN</a> </div><!--end yctv-->
            </div><!--end proDha-->
            <div class="goituvan">
                <i class="icon"></i>GỌI TƯ VẤN
                <span>0964876096</span>
            </div><!--goiTongDa-->
            <div class="hotro">
                <span>Để các chuyên viên hỗ trợ bạn sản phẩm phù hợp nhất cho nhu cầu và túi tiền của bạn.</span>
            </div><!--end hotro-->
        </aside><!--desProduct-->
        <aside class="ckProduct">
            <div class="titile">
                CAM KẾT KHI MUA HÀNG TẠI <span>StoreHUMG</span>

            </div><!--titile-->
            <div class="deCk deCkTtct">
                <span class="icon"></span><!--end icon-->
                <span class="ttCK">Nhận hàng trong vòng <b>12 giờ</b> tại Hà Nội và <b>48 giờ</b> tại các tỉnh thành khác (Thanh toán Tiền mặt)</span><!--end ttCK-->
            </div><!--deCk deCkTtct-->
            <div class="deCk deCkGhMpTq">
                <span class="icon"></span><!--end icon-->
                <span class="ttCK">Giao hàng miễn phí trên toàn Quốc</span><!--end ttCK-->
            </div><!--Endd eCk deCkGhMpTq-->

            <div class="deCk deCkHln">
                <span class="icon"></span><!--end icon-->
                <span class="ttCK">Xem hàng tại nhà hài lòng mới thanh toán</span><!--end ttCK-->
            </div><!--end deCk deCkHln-->
            <div class="deCk deCkHlndt">
                <span class="icon"></span><!--end icon-->
                <span class="ttCK">Được đổi trả trong vòng 7 ngày (Xem chính sách đổi trả)</span><!--end ttCK-->
            </div><!--end deCk deCkHlndt-->

            <div class="deCk deCkTlnq">
                <span class="icon"></span><!--end icon-->
                <span class="ttCK">Tích lũy nhận quà - Mua ngay kẻo lỡ</span><!--end ttCK-->
            </div><!--end deCk deCkTlnq-->
        </aside><!--end ckProduct-->
    </div><!--end detailP-->
    <div class="clear10px"></div><!--end clear10px-->
    <div class="metaproduct">
    <aside class="product">
        <article>
            <?php
            $id = $_GET['id'];
            $sanpham_query ="SELECT * FROM sanpham where id_sanpham=".$id;
            $sanpham_res = mysqli_query($conn,$sanpham_query) or die("Cannot select table!");
            while ($sanpham_items = mysqli_fetch_array($sanpham_res))
            {
                echo '<h2 style="text-align: center;" class="uppercaseh2"><strong><span style="font-size:20px">'.$sanpham_items['tensp'].'</span></strong></h2>';
                echo $sanpham_items["content"];
            }
            ?>
        </article><!---end article-->
        <!--Bình luận -->
        <div class="rightDetailHA">
            <b class="cmt">BÌNH LUẬN</b>
            <div class="fb-comments" data-href="page-chitiet.php?id=<?php echo $id; ?>" data-width="100%" data-numposts="6">
            </div>
        </div>
    </aside><!--end product-->
    <aside class="productEdit">
        <div class="pright_product_pos">
            <div class="right_roduct_hd">
                <div class="btDah">
                    <span class="bttOp">ĐẶT HÀNG NHANH GIAO HÀNG NGAY</span>
                    <span class="btBt">Xem hàng tại nhà không mua không sao </span>
                </div><!--end btDah-->
                <div class="yctv">
                    <span class="bttOp">YÊU CẦU CHUYÊN GIA TƯ VẤN </span>
                    <span class="btBt">Chuyên viên sẽ gọi lại và tư vấn cách chăm sóc da tốt nhất cho bạn.</span>
                </div>
                <div class="phone_product">
                    0964876096
                </div>
                <a href="#" target="_blank" class="detRight_ban_bt">
                    <img src="images/sale.jpg"/>
                </a>
            </div><!--end right_roduct_hds-->
        </div><!--end pright_product_pos-->

    </aside><!--end productEditQri-->
    </div>
</section>
<?php include ("apps/libs/footer.php");?>
</body>
</html>
