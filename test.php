<?php
if (isset($_POST['submit'])){
$tmp_name = $_FILES['image']['name'];
print_r($tmp_name);
}
?>
<form method="post" enctype="multipart/form-data">
<input name="image" type="file" class="form-control" accept="image/*">
<input type="submit" name="submit"></form>
