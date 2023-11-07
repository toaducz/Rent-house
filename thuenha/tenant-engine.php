<?php

$tenant_id = '';
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


if (isset($_POST['tenant_register'])) {
	tenant_register();
}

if (isset($_POST['tenant_login'])) {
	tenant_login();
}

if (isset($_POST['tenant_update'])) {
	tenant_update();
}
if (isset($_POST['tenant_update_password'])) {
	tenant_update_password();
}

function tenant_register()
{
	if (isset($_FILES['id_photo'])) {
		$id_photo = 'tenant-photo/' . $_FILES['id_photo']['name'];

		// echo $_FILES['image']['name'].'<br>';

		if (!empty($_FILES['id_photo'])) {
			$path = "tenant-photo/";
			$path = $path . basename($_FILES['id_photo']['name']);
			if (move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
				echo "file " . basename($_FILES['id_photo']['name']) . " đã được tải lên";
			} else {
				echo "Có lỗi, vui lòng thử lại!";
			}
		}
	}
	global $tenant_id, $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo, $errors, $db;
	$tenant_id = validate($_POST['tenant_id']);
	$full_name = validate($_POST['full_name']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$phone_no = validate($_POST['phone_no']);
	$address = validate($_POST['address']);
	$id_type = validate($_POST['id_type']);
	$id_photo = $_POST['id_photo'];
	$sql = "INSERT INTO tenant(tenant_id,full_name,email,password,phone_no,address,id_type,id_photo) VALUES('$tenant_id','$full_name','$email','$password','$phone_no','$address','$id_type','$path')";
	if ($db->query($sql) === TRUE) {
		header("location:tenant-login.php");
	}
}


function tenant_login()
{
	global $email, $db;
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$sql = "SELECT * FROM tenant where email='$email' AND password='$password' LIMIT 1";
	$result = $db->query($sql);
	if ($result->num_rows == 1) {
		$data = $result->fetch_assoc();
		$logged_user = $data['email'];
		session_start();
		$_SESSION['email'] = $email;
		header('location:index.php');
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
		<strong>Email/Mật khẩu không đúng hoặc tài khoản không tồn tại.</strong>Nếu chưa có tài khoản, vui lòng đăng kí
		tại <a href="tenant-register.php" style="color: lightblue;"><b>đây</b></a>.
	</div>
</div>



<?php
	}
}



function tenant_update()
{
	global $owner_id, $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo, $errors, $db;
	$tenant_id = validate($_POST['tenant_id']);
	$full_name = validate($_POST['full_name']);
	$email = validate($_POST['email']);
	$phone_no = validate($_POST['phone_no']);
	$address = validate($_POST['address']);
	$id_type = validate($_POST['id_type']);
	$sql = "UPDATE tenant SET full_name='$full_name',email='$email',phone_no='$phone_no',address='$address',id_type='$id_type' WHERE tenant_id='$tenant_id'";
	$query = mysqli_query($db, $sql);
	if (!empty($query)) {
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
<script>
	window.setTimeout(function () {
		$(".alert").fadeTo(1000, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 2000);
</script>
<div class="container">
	<div class="alert" role='alert'>
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		<div><strong>Nội dung đã được cập nhật.</strong></div>
	</div>
</div>

<?php
	}
}


function tenant_update_password()
{
	global $owner_id, $full_name, $email, $password, $phone_no, $address, $id_type, $id_photo, $errors, $db;
	$tenant_id = validate($_POST['tenant_id']);
	$password = validate($_POST['password']);
	$sql = "UPDATE tenant SET password='$password' WHERE tenant_id='$tenant_id'";
	$query = mysqli_query($db, $sql);
	if (!empty($query)) {
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
<script>
	window.setTimeout(function () {
		$(".alert").fadeTo(1000, 0).slideUp(500, function () {
			$(this).remove();
		});
	}, 2000);
</script>
<div class="container">
	<div class="alert alert-success" role='alert'>
		<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		<div><strong>Nội dung đã được cập nhật.</strong></div>
	</div>
</div>


<?php
		header("location:profile.php");
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