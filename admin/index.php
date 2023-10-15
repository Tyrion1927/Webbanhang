<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <base href=".">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Quản trị hệ thống</title>
      <link rel="shortcut icon" href="favicon.png">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/admin.css" rel="stylesheet">
      <link href="css/introjs.min.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/intro.min.js"></script>
      <script type="text/javascript" src="js/admin.js"></script>
      <!--Hỗ trợ IE nhận dạng thẻ HTML5-->
      <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
   <?php
   require_once ("../apps/config.php");
   ?>
<?php require ("headeradm.php"); ?>
      <div class="clearfix">
         <div id="sidebar-bg"></div>
         <div id="sidebar" role="navigation">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">
                     <i class="fa fa-th"></i><span> Danh mục quản lý</span>
                     <b class="fa fa-plus-sign visible-xs pull-right"></b>
                  </h3>
               </div>
               <ul id="menu" class="list-group">
                  <li class="list-group-item">
                     <a href="post.php">
                     <i class="fa fa-edit"></i> <span>Tin tức</span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="product.php">
                     <i class="fa fa-fire"></i><span>Sản phẩm</span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="type_product.php">
                     <i class="fa fa-bars"></i> <span>Loại sản phẩm</span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="contact.php">
                     <i class="fa fa-envelope-o"></i> <span>Phản hồi<span class="badge pull-right">1</span></span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="slider.php">
                     <i class="fa fa-picture-o"></i> <span>Slider</span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="user.php">
                     <i class="fa fa-user"></i> <span>Tài khoản</span>
                     </a>
                  </li>
                  <li class="list-group-item">
                     <a href="setting.php">
                     <i class="fa fa-wrench"></i> <span>Cấu hình</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div id="main"><!--Phần chứa nội dung chính-->
            <ol class="breadcrumb">
               <li><a href="index.php"><i class="fa fa-home"></i> Trang quản trị</a></li>
            </ol>
            <div class="col-xs-12">
               <div class="menu">
                  <a href="index.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-home"></i><br> <span>Trang quản trị</span>
                  </a>
                  <a href="post.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-edit"></i><br> <span>Tin tức</span>
                  </a>
                  <a href="product.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-fire"></i><br> <span>Sản phẩm</span>
                  </a>
                  <a href="type_product.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-bars"></i><br> <span>Loại sản phẩm</span>
                  </a>
                  <a href="contact.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-envelope-o"></i><br> <span>Phản hồi</span>
                  </a>
                  <a href="slider.php" class="col-md-2 col-sm-5 col-xs-5">
                     <i class="fa fa-picture-o"></i><br> <span>Slider</span>
                     </a>
                  <a href="user.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-user"></i><br> <span>Tài khoản</span>
                  </a>
                  <a href="setting.php" class="col-md-2 col-sm-5 col-xs-5">
                  <i class="fa fa-wrench"></i><br> <span>Cấu hình</span>
                  </a>
               </div>
            </div>
         </div>
         <!--END #main-->
      </div>
   </body>
</html>
