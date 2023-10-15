<!DOCTYPE HTML>
<html lang="vi">
<?php
$prd = 0;
if(!empty($_SESSION['cart'])) $prd = count($_SESSION['cart']);
?>
<body>
<?php
include("apps/config.php");
include("apps/libs/header.php");
?>
<div class="navigation"></div>
<form method="post">
	<div class="main-shopping">
<p class="cart_info">
    <?php if($_SESSION['cart'] != NULL) {echo "Thông tin chi tiết giỏ hàng!";}else{echo"Hiện tại bạn chưa có sản phẩm nào!";} ?>
</p>
<div class="cart_oder_1">
    <ul class="table_cart">
        <li class="sp_cart">SẢN PHẨM </li>
        <li class="dg_cart">ĐƠN GIÁ</li>
        <li class="sl_cart">SỐ LƯỢNG</li>
        <li class="tt_cart">THÀNH TIỀN</li>
    </ul>

    <?php
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
                <li class="sp_cart">
                    <img src="images/<?php echo $rows['image_sp']; ?>" class="cartImg">
                    <b class="Cart_title_pro"><?php echo $rows['tensp']; ?></b>
                    <div class="delete_Cart" style="text-align: center;font-size: 15px;"><a
                                href="<?php echo $base?>/del-product.php?id=<?php echo $rows['id_sanpham']; ?>"
                                class="del_sp">Xóa</a></div>

                </li>
                <li class="dg_cart"><?php echo number_format($rows['price']); ?> VNĐ</li>
                <li class="sl_cart"><input type="text"
                                      name="num[<?php echo $rows['id_sanpham']; ?>]"
                                      value="<?php echo $_SESSION['cart'][$rows['id_sanpham']]; ?>"
                                      size="3" class="capnhatCartTxt"/></li>
                <li class="tt_cart"><?php echo number_format($rows['price'] * $_SESSION['cart'][$rows['id_sanpham']]); ?>
                    VNĐ
                </li>
            </ul>
            <?php
            $sum_sp += $_SESSION['cart'][$rows['id_sanpham']];
            $sum_all += $rows['price']*$_SESSION['cart'][$rows['id_sanpham']];
        }
        echo '</div><!--end cart_oder-->

<div class="bottom_button">
<p class="update_cart">
    <input type="submit" name="update_cart" value="Cập nhật giỏ hàng" class="cap_nhat_cart"/>
        <a href="'.$base.'/checkout.php" class="dat_hang" style="display:block;">Thanh toán</a>
    
</p><!--end update-cart--->

<p class="sum_money">Tổng sản phẩm:<strong class="sum_sp"> '.$sum_sp.'</strong><br/>Tổng tiền:<strong class="sum_sp"> '.number_format($sum_all).' VNĐ</strong></p>
<a href="<?php echo $base ?>" class="back_page"> Tiếp tục mua hàng</a>
<a href="del-product.php?id=0" class="delete_all">Xóa giỏ hàng</a>
</div>
        <div class="clear10px"></div> ';}?>
</form>
<?php include ("apps/libs/footer.php"); ?>
</body>
</html>
