<?php

$owner_id = '';
$full_name = '';
$email = '';
$password = '';
$phone_no = '';
$address = '';
$id_type = '';
$id_photo = '';
$errors = array();
$db = new mysqli('localhost', 'root', '', 'renthouse');

if ($db->connect_error) {
	echo "Error connecting database";
}
if (isset($_POST['owner_register'])) {
	owner_register();
}
if (isset($_POST['owner_login'])) {
	owner_login();
}


function owner_register()
{
	if (isset($_FILES['id_photo'])) {
		$id_photo = 'owner-photo/' . $_FILES['id_photo']['name'];
		if (!empty($_FILES['id_photo'])) {
			$path = "owner-photo/";
			$path = $path . basename($_FILES['id_photo']['name']);
			if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
				echo "File " . basename($_FILES['id_photo']['name']) . " đã được tải lên";
			} else {
				echo "Có lỗi, vui lòng thử lại!";
			}
		}
	}
	global $owner_id, $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo, $errors, $db;
	$owner_id = validate($_POST['owner_id']);
	$full_name = validate($_POST['full_name']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$phone_no = validate($_POST['phone_no']);
	$address = validate($_POST['address']);
	$id_type = validate($_POST['id_type']);
	$id_photo = $_POST['id_photo'];
	$sql = "INSERT INTO owner(owner_id,full_name,email,password,phone_no,address,id_type,id_photo) VALUES('$owner_id','$full_name','$email','$password','$phone_no','$address','$id_type','$path')";
	if ($db->query($sql) === TRUE) {
		header("location:owner-login.php");
	}
}


function owner_login()
{
	global $email, $db;
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	$sql = "SELECT * FROM owner where email='$email' AND password='$password' LIMIT 1";
	$result = $db->query($sql);
	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc();
		$logged_user = $data['email'];
		session_start();
		$_SESSION['email'] = $email;
		header('location:owner/owner-index.php');
	} else {

?>

<style>
	.alert {
		padding: 20px;
		background-color: #DC143C;
		color: white;
	}

	.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
	}

	.closebtn:hover {
		color: black;
	}
</style>
<div class="container">
	<div class="alert">
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		<strong>Email/Mật khẩu không đúng hoặc tài khoản không tồn tại.</strong> Nếu bạn chưa có tài khoản, vui lòng
		đăng kí tại <a href="owner-register.php" style="color: lightblue;"><b>đây</b></a>.
	</div>
</div>


<?php
	}
}


function validate($data)
{
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>