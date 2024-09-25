<?php
session_start();
if (isset($_SESSION["email"])) {
  header("location:index.php");
}

include("navbar.php");
include("tenant-engine.php");

?>

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Người thuê nhà</h3>
  <hr><br><br>
  <form method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Mật khẩu:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="password" required>
    </div>
    <div class="form-group">
      <a href="forgot-password-owner.php">Quên mật khẩu? </a>
    </div>
    <div><input type="submit" id="submit" name="tenant_login" class="btn btn-primary btn-block" value="Đăng nhập"></div>
  </form>
</div>