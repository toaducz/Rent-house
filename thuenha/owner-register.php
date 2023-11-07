<?php
include("navbar.php");
?>

<div class="container">
  <h3 style="font-weight: bold; text-align: center;">Người cho thuê</h3>
  <hr><br>
  <form method="POST" action="owner-engine.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="full_name">Họ tên:</label>
      <input type="text" class="form-control" id="full_name" placeholder="Nhập họ tên" name="full_name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password1">Mật khẩu:</label>
      <input type="password" class="form-control" id="password1" placeholder="Nhập Password" name="password" required>
    </div>
    <div class="form-group">
      <label for="password2">Xác nhận mật khẩu:</label>
      <input type="password" class="form-control" id="password2" placeholder="Xác nhận mật khẩu" required>
    </div>
    <div class="form-group">
      <label for="phone_no">Số điện thoại.:</label>
      <input type="text" class="form-control" id="phone_no" placeholder="Nhập SDT" name="phone_no" required>
    </div>
    <div class="form-group">
      <label for="address">Địa chỉ:</label>
      <input type="text" class="form-control" id="address" placeholder="Địa chỉ" name="address" required>
    </div>
    <div class="form-group">
      <label for="id_type">Giấy tờ tùy thân:</label>
      <select class="form-control" name="id_type" required>
        <option>Chứng minh thư</option>
        <option>Bằng lái</option>
      </select>
    </div>
    <div class="form-group">
      <label for="card_photo">Xác nhận giấy tờ tùy thân:</label>
      <input type="file" class="form-control" placeholder="Mật khẩu" name="id_photo" accept="image/*"
        onchange="preview_image(event)" required>
    </div>
    <div class="form-group">
      <label>File:</label><br>
      <img src="" id="output_image" / height="200px">
    </div>
    <hr>
    <div><button id="submit" name="owner_register" class="btn btn-primary btn-block"
        onclick="return Validate()">Đăng kí</button></div><br>
    <div class="form-group text-right">
      <label class="">Đăng kí như <a href="tenant-register.php">Khách thuê nhà</a>?</label><br>
    </div><br><br>
  </form>
</div>

<script type='text/javascript'>
  // hiện ảnh giấy tờ mới tải lên
  function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
      var output = document.getElementById('output_image');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
<script type="text/javascript">
  function Validate() {
    var password = document.getElementById("password1").value;
    var confirmPassword = document.getElementById("password2").value;
    if (password.length < 6) {
      alert("Mật khẩu không đủ 6 chữ cái.");
      return false;
    }
    if (password != confirmPassword) {
      alert("Mật khẩu không khớp!.");
      return false;
    }
    return true;
  }
</script>