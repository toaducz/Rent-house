<?php
include('config/config.php');
?>
<?php
if ($_GET['key'] && $_GET['reset']) {
    $email = $_GET['key'];
    $pass = $_GET['reset'];
    $sql = "SELECT * FROM admin where email='$email' AND password='$password' LIMIT 1";
    $result = $db->query($sql);
    if ($result->num_rows == 1) {
?>
<form method="post" action="submit_new.php">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <p>Enter New password</p>
    <input type="password" name='password'>
    <input type="submit" name="submit_password">
</form>
<?php
    }
}
        ?>