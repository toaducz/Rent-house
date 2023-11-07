<?php
include('config/config.php');
?>
<?php
if (isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset']) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $sql = "UPDATE admin  set password='$pass' where email='$email'";
  $result = $db->query($sql);
}
?>