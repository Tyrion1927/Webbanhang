<?php
ini_set('display_errors', 1);
ini_set('log_errors', 'on');
ini_set('error_log', 'php.error.log');
// so san pham da add vao cart
$prd = 0;
if(!empty($_SESSION['cart'])) $prd = count($_SESSION['cart']);
?>
<head>
    <title>Website chuyên bán</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $base; ?>/images/favicon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>/css/fontawesome-all.min.css" media='all'/>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=vietnamese">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $base; ?>/css/owl.theme.default.min.css">
</head>
<div id ="header">
    <div class ="topbar">
        <div class ="container">
            <div class="logo">
                <a href="<?php echo $base ?>">
                    <?php
                    $logo_query = mysqli_query($conn,"SELECT * FROM logo ORDER BY  id_logo DESC limit 1");
					if ($logo_query){ 
                    while($logo_items = mysqli_fetch_array($logo_query))
                    {
                        echo '<img src="/webbanhang'.$logo_items['image_logo'].'" alt="'.$logo_items['name_logo'].'" tittle="'.$logo_items['name_logo'].'"/>';
                    }
					}
					else {
					echo "Truy vấn không thành công với lỗi: " . mysqli_error($conn) . "<br>";}
                    ?>
                </a>
            </div><!--end logo-->
            <div class="search">
                <form class="searchform" action="<?php echo $base ?>/search.php" method="get">
                 <input class="s" placeholder="Tìm kiếm …" type="text" name="s" width="300px" />
                  <button class="searchsubmit" type="submit">
                </form>
            </div><!-----end search---->

            <div class="hotline">
                <div class="ptittle">Hotline:</div><!--ptille-->
                <div class="pdetail">0964876096</div><!--pdetail-->
            </div>
            <!-- Đăng nhập -->
        </div><!--end container-->
    </div><!--End topbar--->

    <div class="menu">
        <div class="container">
            <div class="nav">
                <div class='menu_leve_1'><a href = '<?php echo $base ?>' class='parent'>Trang chủ</a></div>
                <?php
                $menu_result = mysqli_query($conn,"SELECT * FROM menu") or die ('Cannot connect table!'.mysqli_error($conn));
                while ($menu_items = mysqli_fetch_array($menu_result,MYSQLI_ASSOC))
                {
                    $submenu_query = "SELECT *
                                      FROM sub_menu
                                      WHERE id_catalog =".$menu_items['id_catalog'];
                    $submenu_res = mysqli_query ($conn,$submenu_query) or die ('Cannot select menu'.mysqli_error($conn));
                    /*--------------------------------SHOW MENU-------------------------------------------*/
                    echo "<div class='menu_leve_1'><a href = '".$base."/sanpham.php?id_menu=".$menu_items['id_catalog']."' class='parent'>".$menu_items['name_menu']."</a>
                <ul class='menuHiden' style='display: none;margin-bottom: 0px;margin-top: 0px;padding-left: 0px;padding-H:10px;'>";
/*                        echo "<li class='active'><a href='".$submenu_items['link_sub']."'><br/>".$menu_items['name_sub']."</a>
                                <ul style='padding-left:0px;padding-bottom:10px;'>";*/
                        while($submenu_items = mysqli_fetch_array($submenu_res,MYSQLI_ASSOC))
                        {
                            echo"<li><a href='".$base."/sanpham.php?id_menu=".$submenu_items['id_sub']."'>". $submenu_items['name_sub']." </a></li>";
                        }
                        echo "
                                </ul>
                                </li>";

                    echo "</ul></div>";
                }
                ?>
                <?php
                if (isset($_SESSION['username'])){
				$sql_query = mysqli_query($conn, "select * from user where username='".$_SESSION['username']."'");
				$sql_result = mysqli_fetch_array($sql_query);
                $level = $sql_result['level'];
                    if ($level == '3'){
                        echo"<div class='user1'>
                        <div class='header_login'>
                        <a href=''>Xin chào: ".$_SESSION['username']. "</a>
                        </div>
                        <ul class='header_logout'>
                            <li><a href='".$base."/logout.php'>Đăng xuất</a></li>
                        </ul>
                        </div>";
                                    }
                     else if ($level == '1'){
                                        echo"<div class='user1'>
                        <div class='header_login'>
                        <a href=''>Xin chào: ".$_SESSION['username']. "</a>
                        </div>
                        <ul class='header_logout'>
                            <li><a href='".$base."/admin/index.php'>Quản lý</a></li>
                            <li><a href='".$base."/logout.php'>Đăng xuất</a></li>
                        </ul>
                        </div>";
                                    }
                    else{
                        echo'<div class="user1">
                    <div class="header_login">
                        <a href="#" title="" class="fa fa-user"></a>
                    </div>
                    <ul class="header_login_reg">
                        <li><a href="'.$base.'/login.php">Đăng nhập</a></li>
                        <li><a href="'.$base.'/register.php">Đăng Kí</a></li>
                    </ul>
                </div>';
                    }

                }
                else {
                  echo'  <div class="user1">
                    <div class="header_login">
                        <a href="#" title="" class="fa fa-user"></a>
                    </div>
                    <ul class="header_login_reg">
                        <li><a href="'.$base.'/login.php">Đăng nhập</a></li>
                        <li><a href="'.$base.'/register.php">Đăng Kí</a></li>
                    </ul>
                </div>';
                }
                ?>
                <div class="cart_div">
                    <a href="<?php echo $base?>/cart.php" class="cart_top">
                        <span class="count"><?php echo $prd; ?></span><!--end count-->
                        <span class="tit">Giỏ hàng</span><!--end tit-->
                    </a>
                    <div class="quick_cart">
                        <?php //cap nhat lai gia khi nhap vao so luong
                        if(isset($_POST['update_cart']))
                        {
                            foreach($_POST['num'] as $id => $prd)//prd la gia tri nhap vao.moi id tuong ung voi so luong nhap vao
                            {
                                if(($prd == 0) and (is_numeric($prd)))//nhap vao =0 thi xoa san pham do di
                                {
                                    unset($_SESSION['cart'][$id]);
                                }
                                elseif(($prd > 0) and (is_numeric($prd)))// so luong >0  thi tiep tuc tinh
                                {
                                    $_SESSION['cart'][$id] = $prd;
                                }
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="cart_oder">
                                <ul class="top_cart">
                                    <li class="sp">SẢN PHẨM </li>
                                    <li class="dg">ĐƠN GIÁ</li>
                                    <li class="sl">SL</li>
                                    <li class="tt">THÀNH TIỀN</li>
                                </ul>
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    if ($_SESSION['cart'] != NULL) {
                                        foreach ($_SESSION['cart'] as $id => $prd) {
                                            $arr_id[] = $id;
                                        }
                                        $str_id = implode(',', $arr_id);
                                        $item_query = "SELECT * FROM sanpham WHERE id_sanpham IN ($str_id) ORDER BY id_sanpham ASC";
                                        $item_result = mysqli_query($conn, $item_query) or die ('Cannot select table!');
                                        while ($rows = mysqli_fetch_array($item_result)) {
                                            ?>
                                            <ul class="bottom_cart">
                                                <li class="sp">
                                                    <img src="images/<?php echo $rows['image_sp']; ?>" class="cartImg">
                                                    <b class="Cart_title_pro"><?php echo $rows['tensp']; ?></b>
                                                    <div class="delete_Cart"><a
                                                                href="<?php echo $base?>/del-product.php?id=<?php echo $rows['id_sanpham']; ?>"
                                                                class="del_sp">Xóa</a></div>

                                                </li>
                                                <li class="dg"><?php echo number_format($rows['price']); ?> VNĐ</li>
                                                <li class="sl"><input type="text" name="num[<?php echo $rows['id_sanpham']; ?>]" value="<?php echo $_SESSION['cart'][$rows['id_sanpham']]; ?>" size="3" class="capnhatCartTxt"/></li>
                                                <li class="tt"><?php echo number_format($rows['price'] * $_SESSION['cart'][$rows['id_sanpham']]); ?> VNĐ
                                                </li>
                                            </ul>

                                            <?php
                                        }
                                    } else {
                                        echo "<p><div class='no-product'><p>CHƯA CÓ SẢN PHẨM TRONG GIỎ!</p></div>";
                                    }
                                }
                                else{
                                $_SESSION['cart'] = array();}
                                ?>
                                <div class="go_shopping">
                                    <input type="submit" name="update_cart" value="Cập nhật giỏ hàng" class="cap_nhat_cart"/>
                                    <a href="<?php echo $base?>/cart.php" class="goa_shopping">GIỎ HÀNG</a></div>
                            </div><!--end cart_order-->
                        </form>
                    </div><!--End Quick-->
                </div><!--end cart_div-->

            </div><!--end nav-->

        </div><!--end container-->
    </div><!---menu-->
</div><!--End Header--->