<!DOCTYPE html>
<html lang="vi">
<?php
require_once ("../apps/config.php");
?>
<?php include ("headeradm.php"); ?>
   <body>
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
         <div id="main">
            <ol class="breadcrumb">
         <li><a href="index.php"><i class="fa fa-home"></i> Trang quản trị</a></li>
         <li class="active"><a href="user.php">Tài khoản</a></li>
      </ol>
      <div class="col-xs-12">
         <form id="admin-form" method="post" action="" role="form">
            <div class="col-xs-12">
               <div class="form-group">
                  <!-- Single button -->
                  <div class="btn-group">
                     <select id="task" name="task" class="form-control">
                        <option>Tác vụ</option>
                        <option value="delete">Xóa tài khoản</option>
                        <option value="deactive">Khóa</option>
                        <option value="active">Mở khóa</option>
                     </select>
                  </div>
                  <a href="new-user.php" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
                  <div class="btn-group pull-right hidden-xs" id="div-search">
                     <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
                     <span class="fa fa-search"></span>
                  </div>
               </div>
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th><input id="check_all" type="checkbox"></th>
                        <th class="hidden-xs">ID</th>
                        <th>Tài khoản</th>
                         <th class="hidden-sm hidden-xs">Họ và tên</th>
                        <th class="hidden-xs">Email</th>
                        <th>Sửa</th>
                        <th>Tình trạng</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                  $user_query = mysqli_query($conn,"SELECT * from user");
                  /*$user1_query = mysqli_query($conn,"SELECT * from user");*/
                  while ($user_items = mysqli_fetch_array($user_query))
                  {
                  ?>
                     <tr>
                         <?php
                        echo '<td>
                           <input name="id[]" type="checkbox" value="0">
                        </td>
                        <td class="hidden-xs">'.$user_items['id'].'</td>
                        <td>'.$user_items['username'].'</td>
                        <td>'.$user_items['fullname'].'</td>
                        <td class="hidden-xs">'.$user_items['email'].'</td>
                         <td>
                        <a href="new-type_product.php"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa tài khoản"></i></a>
                        </td>
                        <td>
                           <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hoạt động"></i>
                        </td>
                   '; ?> </tr> <?php }?>
                  </tbody>
               </table>
               <div class="text-right">
                  <ul class="pagination" id="step5">
                     <li class="disabled"><span>«</span></li>
                     <li class="active"><span>1</span></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li><a href="#">»</a></li>
                  </ul>
               </div>
               <p><strong><i class="fa fa-bookmark"></i>Ghi chú: </strong></p>
               <p class="note-items"><i class="fa fa-check text-success"></i> Tài khoản đang hoạt động.</p>
               <p class="note-items"><i class="fa fa-times text-danger"></i> Tài khoản bị khóa.</p>
            </div>
         </form>
      </div>
         </div>
         <!--END #main-->
      </div>
   </body>
</html>
