<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("location:index.php");
}
include('navbar.php');
include('tenant-engine.php');
?>
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  button:hover,
  a:hover {
    opacity: 0.7;
  }

  .form-group {
    text-align: left;
  }
</style>
<div>
  <h3 style="text-align:center;">Trang cá nhân</h3>
</div>
<div class="container">
  <?php
  include("config/config.php");
  $u_email = $_SESSION["email"];

  $sql = "SELECT * from tenant where email='$u_email'";
  $result = mysqli_query($db, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {

  ?>
  <div class="card">
    <img src="images/avatar.png" alt="avatar" style="height:200px; width: 100%">
    <h1>
      <?php echo $rows['full_name']; ?>
    </h1>
    <p class="title">
      <?php echo $rows['email']; ?>
    </p>
    <p><b>Số điện thoại: </b>
      <?php echo $rows['phone_no']; ?>
    </p>
    <p><b>Địa chỉ: </b>
      <?php echo $rows['address']; ?>
    </p>
    <p><b>Giấy tờ tùy thân: </b>
      <?php echo $rows['id_type']; ?>
    </p>
    <p><img src="<?php echo $rows['id_photo']; ?>" height="100px"></p>
    <!-- Nut cap nhat trang ca nhan co cua so-->
    <p><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Cập nhật trang cá
        nhân</button></p>
    <!-- cua so -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cập nhật trang cá nhân</h4>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="form-group">
                <label for="full_name">Họ tên:</label>
                <input type="hidden" value="<?php echo $rows['tenant_id']; ?>" name="tenant_id">
                <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>"
                  name="full_name">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>" name="email"
                  readonly>
              </div>
              <div class="form-group">
                <label for="phone_no">Số điện thoại:</label>
                <input type="text" class="form-control" id="phone_no" value="<?php echo $rows['phone_no']; ?>"
                  name="phone_no">
              </div>
              <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" value="<?php echo $rows['address']; ?>"
                  name="address">
              </div>
              <div class="form-group">
                <label for="id_type">Giấy tờ tùy thân:</label>
                <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>" name="id_type" readonly>
              </div>
              <div class="form-group">
                <label>Id:</label><br>
                <img src="<?php echo $rows['id_photo']; ?>" id="output_image" height="100px" readonly>
              </div>
              <div class="form-group">
                <a href="change-password.php">Đổi mật khẩu? </a>
              </div>
              <hr>
              <div><button id="submit" name="tenant_update" class="btn btn-primary btn-block">Cập nhật</button></div>
              <br>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
  } ?>