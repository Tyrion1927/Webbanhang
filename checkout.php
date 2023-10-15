<!DOCTYPE HTML>
<html lang="vi">
<?php
require ("apps/config.php");
require ("apps/libs/header.php");
?>
<body>
<div class="navigation"></div>
            <?php
         if($_SESSION['cart'] != NULL) {
             echo ' 
                <form method="post" action="orders.php">
                 <div class="main-shopping">
                <p class="cart_info">Thông tin Giao hàng';

        if(isset($_SESSION['username']))
            {
            $khachhang = mysqli_query($conn,"SELECT * FROM user WHERE username ='".$_SESSION['username']."'");
            $items = mysqli_fetch_array($khachhang);
            echo '<div class="ttkh">
            <span class="ttkh">THÔNG TIN KHÁCH HÀNG:</span>
            <br/>Họ và tên: '.$items['fullname'].'
            <br/>Điện thoại:'.$items['phone'].'
            <br/>Địa chỉ giao hàng: '.$items['address'].'
    </div><!--end ttkh-->
    <span class="ttkh">THÔNG TIN CHI TIẾT CÁC SẢN PHẨM TRONG ĐƠN HÀNG:</span>
    <div class="clear10px"></div>
    <div class="cart_oder">
        <ul class="top_cart">
            <li class="sp">SẢN PHẨM </li>
            <li class="dg">ĐƠN GIÁ</li>
            <li class="sl">SỐ LƯỢNG</li>
            <li class="tt">THÀNH TIỀN</li>
        </ul>';
        $sum_all = 0;
        $sum_sp = 0;
        if($_SESSION['cart'] != NULL)
        {
            foreach($_SESSION['cart'] as $id =>$prd)
            {
                $arr_id[] = $id;
            }
            $str_id = implode(',',$arr_id);
            $item_query = "SELECT * FROM  sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC";
            $item_result = mysqli_query($conn,$item_query) or die ('Cannot select table!');
            while ($rows = mysqli_fetch_array($item_result))
            {
                ?>
                <!--SHOW CART-->

                <ul class="bottom_cart">
                    <li class="sp">
                        <a><img src="<?php echo $base ?>/images/<?php echo $rows['image_sp']; ?>" class="cartImg"></a>
                        <a class="Cart_title_pro"><?php echo $rows['tensp']; ?></a>
                        <div class="delete_Cart"><a href="<?php echo $base ?>/del-product.php?id=<?php echo $rows['id_sanpham']; ?>">Bỏ sản phẩm</a></div>
                    </li>
                    <li class="dg"><?php echo number_format($rows['price']);?> VNĐ</li>
                    <li class="sl"><input type="text" name ="num[<?php echo $rows['id_sanpham']; ?>]" value="<?php echo $_SESSION['cart'][$rows['id_sanpham']];?>" size="3" class="capnhatCartTxt"/></li>
                    <li class="tt"><?php echo number_format($rows['price']*$_SESSION['cart'][$rows['id_sanpham']]); ?> VNĐ</li>
                </ul>
                <?php
                $sum_all += $rows['price']*$_SESSION['cart'][$rows['id_sanpham']];
                $sum_sp += $_SESSION['cart'][$rows['id_sanpham']];
            }
        }
           echo' </div><!--end cart_oder-->';
        ?>

    <p class="update_cart">
        <input type="submit" name="update_cart" value="Cập nhật giỏ hàng" class="cap_nhat_cart"/>
        <input type="submit" name="btDathang" value="ĐẶT HÀNG" class="dat_hangsr"/>


    </p><!---end update-cart--->

    <p class="sum_money">Tổng sản phẩm:<strong class="sum_sp"><?php echo $sum_sp; ?></strong><br/>Tổng tiền:<strong class="sum_sp"><?php echo number_format($sum_all); ?> VNĐ</strong></p>
</form>
<?php echo '</div><!--end main shopping-->
<div class="clear10px"></div>';?>
    <?php         }
            else
            {
                echo '<a href="'.$base.'/login.php" class="">&nbsp;Đăng nhập để đặt hàng</a>
         <div class="re-gis">
        <form action="orders.php" method="post" id="dathang">
        <label>Họ và tên:</label><br/>
        <input type="text" name="fn" class="ht" maxlength="50" required/> <br/>
        <label>Địa chỉ email:</label><br>
        <input type="email" name="em" class="em" maxlength="50" required>
        <br>
        <label>Điện thoại:</label><br>
        <input type="tel" name="tphone" maxlength="11" class="sdt" required/>
        <br/>
        <label>Địa chỉ giao hàng:</label><br>
        <input type="text" name="ar" class="dcgh" required/>
        <br/>
        <label>Ghi chú:</label><br>
        <textarea placeholder="Ghi chú đơn hàng" name="notetext" rows="3" ></textarea>
        <br/>
        <input type="submit" name="dathang_two" class="btn-reg" value="ĐẶT HÀNG">
        <input type="reset" name="rs" class="btn-reset" value="Reset">
    </form>
    </div><!--end re-gis-->
    ';}}
    else {echo" <div class='clear10px'></div>
 <span id='gohome' style='padding: 27px;display: block;text-align: center;font-size: 16px;line-height: 30px;'>Hiện tại bạn chưa có sản phẩm nào! <br>
 <a href='".$base."' style='color: blue'>Trở lại trang chủ</a></span>
 ";}
            ?>
<?php include ("apps/libs/footer.php");
?>
<style>
     form input.ht, form input.em, form input.tdn,form input.pw, form input.xnpw, form input.sdt, form input.dcgh, textarea{
        width: 530px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-left: 310px;
    }
</style>
</body>
