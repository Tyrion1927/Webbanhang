<?php
session_start();
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
    header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
    header("location:".$_SERVER['HTTP_REFERER']);
}
?>