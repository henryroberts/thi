<?php
ob_start();// loại bỏ thông báo lỗi của header cho xampp phiên bản thấp hoặc các host không hỗ trợ 
	include_once("connect.php"); // triệu gọi fike kết nối
	$id_thanhvien = $_GET["id_tv"]; // nhận biến id_thanhvien để truy vấn
	$sql = "DELETE FROM `sinh_vien` WHERE `ma_sv` = $id_thanhvien"; // truy vấn
	$query = mysql_query($sql); // thực thi truy vấn
	header("location: ql_thanhvien.php"); // thực thi xong thì chuyển hướng admin về trang quản lý
?>