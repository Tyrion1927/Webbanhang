<!DOCTYPE html>
<html lang="vi">
<?php require_once("../apps/config.php");?>
<?php require_once("headeradm.php"); ?>
<?php
if (isset($_POST['btn_them'])){
    $product = mysqli_query($conn,"SELECT * from sanpham") or die('Cannot select table!');
    $product_items = mysqli_fetch_array($product);
    $tensp = trim($_POST['title']);
    $tensp=str_replace("'","&#39;",$tensp);
    $description = $_POST['description'];
    $dm = $_REQUEST['type_product'];
    $masp = $_POST['masp'];
    $xuatxu = $_POST['xuatxu'];
    $sizee = $_POST['sizee'];
    $keywords = $_POST['keywords'];
    $mausac = $_POST['mausac'];
    $prices = trim($_POST['price']);
    if($prices==""){$prices=0;}
    $content = $_POST['content'];
    $content=str_replace("'","&#39;",$content);
    $path = dirname(dirname(__FILE__))."/images/"; // file sẽ lưu vào thư mục images
    $tmp_name = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $size = $_FILES['image']['size'];
    $url = $_REQUEST['imageurl'];
    $bsname = basename($url);
    $path1 = dirname(dirname(__FILE__))."/images/$bsname"; // file sẽ lưu vào thư mục images
    if ( !$tensp || !$masp || !$prices ){
        echo "Vui lòng nhập thông tin đầy đủ";
    }
    else {
        if(!empty($tmp_name) && empty($url)) {
            if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpg")
            {
                if($_FILES['image']['size'] > 1048576 )
                {
                    echo '<p class="uptc">File không được lớn hơn 1mb!</p>';
                }
                else {
             move_uploaded_file($tmp_name, $path . $name);
            $insert = mysqli_query($conn, "INSERT INTO sanpham(id_sub,tensp,code_product,price,description,content,image_sp,xuatxu,sizess,mausac,parent_name_sub) VALUE('" . $dm . "','" . $tensp . "','" . $masp . "','" . $prices . "','" . $description . "','" . $content . "','" . $name . "','" . $xuatxu . "','" . $sizee . "','" . $mausac . "','" . $keywords . "')");
            $thanhcong = '<span id="add-product-ss">thêm sản phẩm thành công</span>';
                }
            }

        }
        else if(empty($tmp_name) && !empty($url)) {
            $getcontent= file_get_contents($url);
            if(!empty($getcontent)) {
                file_put_contents($path1, $getcontent);
                 $inserts = mysqli_query($conn, "INSERT INTO sanpham(id_sub,tensp,code_product,price,description,content,image_sp,xuatxu,sizess,mausac,parent_name_sub) VALUE('" . $dm . "','" . $tensp . "','" . $masp . "','" . $prices . "','" . $description . "','" . $content . "','" . $bsname . "','" . $xuatxu . "','" . $sizee . "','" . $mausac . "','" . $keywords . "')");
                    $thanhcong = '<span id="add-product-ss">thêm sản phẩm thành công</span>';
            } else $thanhcong = '<span id="add-product-ss">thêm ảnh thất bại !</span>';
        }
}}
?>
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
            <li class="active"><a href="product.php">Sản phẩm</a></li>
            <li class="active"><a href="new-product.php">Thêm sản phẩm mới</a></li>
         </ol>
         <div class="col-xs-12">
            <form name="formnewpost" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" enctype="multipart/form-data" role="form">
               <input name="id" type="hidden" value="0">
               <div class="form-group">
                  <label for="type_product" class="col-sm-3 control-label required">Loại sản phẩm</label>
                  <div class="col-sm-9">
                     <select name="type_product" id="type_product" class="form-control">
                     <option value="">Chọn danh mục</option>
                    <?php
                        $danhmucchinh_query = mysqli_query($conn,"SELECT * from menu") or die('Cannot select table!');
                        while ($item = mysqli_fetch_array($danhmucchinh_query)){
                            echo "<option disabled>".$item["name_menu"]."</option>";
                            $danhmuc_query = mysqli_query($conn,"SELECT * from sub_menu where `id_catalog` = ".$item['id_catalog']) or die('Cannot select table!');
                            while ($danhmuc_items = mysqli_fetch_array($danhmuc_query)){
                                echo "<option value='".$danhmuc_items['id_sub']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$danhmuc_items['name_sub']."</option>";
                            }
                        }

                         ?>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label for="masp" class="col-sm-3 control-label required">Mã sản phẩm</label>
                  <div class="col-sm-9">
                     <input name="masp" type="text" value="" class="form-control" placeholder="Mã sản phẩm" required="" maxlength="100">
                  </div>
               </div>
               <div class="form-group">
                  <label for="title" class="col-sm-3 control-label required">Tên sản phẩm</label>
                  <div class="col-sm-9">
                     <input name="title" type="text" value="" class="form-control" placeholder="Tên sản phẩm ( ~ 70 ký tự )" required="" maxlength="100">
                  </div>
               </div>
               <div class="form-group">
                  <label for="keywords" class="col-sm-3 control-label">Từ khóa</label>
                  <div class="col-sm-9">
                     <input name="keywords" type="text" value="" class="form-control" placeholder="meta keywords" maxlength="255">
                  </div>
               </div>
                <div class="form-group">
                    <label for="xuatxu" class="col-sm-3 control-label">xuất xứ</label>
                    <div class="col-sm-9">
                        <input name="xuatxu" type="text" value="" class="form-control" placeholder="place of sale" maxlength="255">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sizee" class="col-sm-3 control-label">Kích thước</label>
                    <div class="col-sm-9">
                        <input name="sizee" type="text" value="" class="form-control" placeholder="size" maxlength="255">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mausac" class="col-sm-3 control-label">Màu sắc</label>
                    <div class="col-sm-9">
                        <input name="mausac" type="text" value="" class="form-control" placeholder="màu sắc" maxlength="255">
                    </div>
                </div>
               <div class="form-group">
                  <label for="description" class="col-sm-3 control-label">Mô tả</label>
                  <div class="col-sm-9">
                     <textarea name="description" class="form-control" placeholder="meta description ( ~ 160 ký tự )" maxlength="255"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label for="price" class="col-sm-3 control-label required">Giá</label>
                  <div class="col-sm-9">
                     <input name="price" type="text" value="" class="form-control" placeholder="Giá sản phẩm (đơn vị: VNĐ)" required="" maxlength="255">
                  </div>
               </div>
               <div class="form-group">
                  <label for="content" class="col-sm-3 control-label">Nội dung</label>
                  <div class="col-sm-9">
                       <textarea name="content" rows="5" class="form-control ckeditor" placeholder="Mô tả cho sản phẩm" ></textarea>
                   </div>
                </div>
                  <div class="form-group" >
                     <label class="col-sm-3 control-label">Ảnh</label>
                      <div class="col-sm-9 col-sm-offset-3">
                      <ul class="nav nav-tabs" role="tablist">
                       <li class="active"><a href="#img-file" role="tab" data-toggle="tab">Upload từ máy tính</a></li>
                       <li><a href="#img-url" role="tab" data-toggle="tab">Lấy từ URL</a></li>
                     </ul>
                      <div class="tab-content" style="margin-top: 15px; min-height: 50px;">
                          <div class="tab-pane active" id="img-file">
                              <label for="image" class="col-sm-3 control-label">Từ máy tính</label>
                              <div class="col-sm-9">
                                 <input name="image" type="file" class="form-control" accept="image/*">
                              </div>
                          </div>
                          <div class="tab-pane" id="img-url">
                              <label for="url" class="col-sm-3 control-label"> Từ URL</label>
                              <div class="col-sm-9">
                                 <input name="imageurl" type="text" class="form-control" placeholder="Đường dẫn tới hình ảnh" maxlength="255">
                              </div>
                          </div>
                        </div>
                     </div>
                  </div>
                <?php
                if(!empty($thanhcong)) {echo $thanhcong;}
                ?>
                  <div class="form-group">
                     <div class="col-sm-offset-3 col-sm-9">
                         <input type="submit" name="btn_them" class="btn btn-submit" value="Thêm mới"><small><i class="fa fa-plus"></i></small>
                        <button type="submit" class="btn btn-danger"><small><i class="fa fa-save"></i></small> Lưu nháp</button>
                        <a class="btn btn-warning" href="#"><small><i class="fa fa-reply"></i></small> Trở về</a>
                     </div>
                  </div>
            </form>
            </div>
         </div>
         <!--END #main-->
      </div>
<script type="text/javascript" src="plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="plugins/ckfinder/ckfinder.js"></script>
<script>
    var editor = CKEDITOR.replace( 'content', {
    filebrowserBrowseUrl : 'plugins/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : 'plugins/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
<style>
   .btn {margin-bottom: 10px;}
</style>
   </body>
</html>
