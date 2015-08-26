<?php
ob_start(); // xem conment bên file xóa nếu bạn chưa hiểu
include_once("functions.php"); // triệu gọi file functions để dùng cho check form
include_once("connect.php"); // triệu gọi file kết nối để truy vấn
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="themmoi_thanhvien.css" />
</head>
<body>
<?php
// kiểm tra trạng thái xem người dùng đã submit form chưa?
if(isset($_POST["submit"])){
	// kiểm tra username hoặc pass có rỗng không. hàm được xây dựng bên file functions
	if($_POST["user"] == "" || $_POST["lop"] == ""){
		$error = "các trường không được để trống";
				$user = $_POST["user"];
				$pass = $_POST["lop"];
				}
			//đọc lại comment bên file sua nếu bạn chưa hiểu chỗ này
			if(mysql_num_rows(mysql_query("SELECT * FROM `sinh_vien` WHERE `tai_khoan` = '$user'")) >0){
			$error4 = "username đã tồn tại";
			}
	//kiểm tra nếu tồn tại session user, pass, quyền truy cập và không tồn tại lỗi thì truy vấn
	if(isset($user) && isset($pass) && isset($qtc) && !isset($error4)){
				$sql = "INSERT INTO `thanh_vien` VALUES (null, '$user', '$pass', $qtc)";
				$query = mysql_query($sql);
				header("location: ql_thanhvien.php");
		}
	}
?>
<form method="post">
  <h1>Add member</h1>
  <p style="color:#FF0004;"><?php if(isset($error)){ echo $error;}elseif(isset($error2)){echo $error2;}elseif(isset($error3)){echo $error3;}elseif(isset($error4)){echo $error4;} ?></p>
  <fieldset>
	<label for="name">ten sv</label>
	<input type="text" id="name" name="user">
    <label for="name">lop</label>
	<input type="text" id="name" name="lop">
  </select>
  </fieldset>
  <button type="submit" name="submit" />Add member</button>
</form>
</body>
</html>
<?php
}
else{
  header("location: login.php");
  }
?>