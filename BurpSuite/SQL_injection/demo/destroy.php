<?php
session_start();
unset($_SESSION['user']); //session_unset(); Xóa  biến user trong Session
session_destroy(); // Kết thúc phiên session
header("location: index.php?Message=" . "successfully logged out!!"); // Chức năng đăng xuất
?>