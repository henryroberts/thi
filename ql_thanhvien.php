<?php
ob_start();
include_once("connect.php"); // triệu gọi file kết nối
?>
</script>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    table tr th a {color: #ffffff; text-decoration: none;}
    table tr th a:hover {color: #ffff00;}
	table tr td a {text-decoration:none; color:#024457;}
	table tr td a:hover {text-decoration:underline;}
</style>
</head>

<body>
    <h1><?php echo "Xin chào  <span style=\"color:#167F92; text-transform: uppercase;\">".$_SESSION["user"]."</span><a href=\"logout.php\"><span style=\"float:right; text-decoration: none; color:#167F92; \">Đăng xuất</span></a> "?></h1>
<form method="get">
<table class="responstable">
  
  <tr>
      <th colspan="3">Quản lý thành viên</th>
      <th colspan="3" style="text-align: center"><a href="themmoi_thanhvien.php">Thêm mới một thành viên</a></th>
  </tr>
  <tr>
      <th style="text-align: center">Ma sinh vien</th>
      <th style="text-align: center">Ten sinh vien</th>
      <th style="text-align: center">Lop</th>
      <th style="text-align: center">Sửa</th>
      <th style="text-align: center">Xóa</th>
  </tr>
  <?php
        //lọc ra tất cả thông tin về thành viên
		$sql = "SELECT * FROM `sinh_vien`";
        $query = mysql_query($sql);
        while ($row = mysql_fetch_array($query)) {
            ?>
            <tr>
             <td><?php echo $row["ma_sv"]; ?></td>
             <td><?php echo $row["ten_sv"]; ?></td>
             <td><?php echo $row["lop"]; ?></td>
             <td style="text-align: center"><a href="sua.php?id_tv=<?php echo $row["ma_sv"]; ?>">sửa</a></td>
             <td style="text-align: center"><a onClick="return xoatv();" href="xoa.php?id_tv=<?php echo $row["ma_sv"]; ?>">Xóa</a></td>
           </tr>
           <?php 
        }
  
  ?>
  
</table>
</form>
</body>
</html>
