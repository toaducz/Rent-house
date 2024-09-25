<?php
session_start();
include('engine.php');
include('navbar.php');
?>
<?php
include("config.php");
$u_email = $_SESSION["email"];
$sql = "SELECT * from owner where email='$u_email'";
$result = mysqli_query($db, $sql);
$rows = mysqli_fetch_assoc($result)
    ?>
<h3 style="font-weight: bold; text-align: center;">Đổi mật khẩu</h3>
<hr><br>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" value="<?php echo $rows['owner_id']; ?>" name="owner_id">
        </div>
        <div class="form-group">
            <label for="old_password">Mật khẩu cũ:</label>
            <input type="password" class="form-control" id="old_password" placeholder="Nhập mật khẩu cũ"
                name="old_password" required>
        </div>
        <div class="form-group">
            <label for="password1">Mật khẩu mới:</label>
            <input type="password" class="form-control" id="password1" placeholder="Nhập mật khẩu mới" name="password"
                required>
        </div>
        <div class="form-group">
            <label for="password2">Xác nhận mật khẩu mới:</label>
            <input type="password" class="form-control" id="password2" placeholder="Xác nhận mật khẩu" required>
        </div>
        <div><button id="submit" name="owner_update_password" class="btn btn-primary btn-block"
                onclick="return Validate()">Xác nhận</button></div><br>
    </form>
</div>
<script type="text/javascript">
    function Validate() {
        var pass = "<?php echo $rows['password']; ?>"
        var old_password = document.getElementById("old_password").value;
        var password = document.getElementById("password1").value;
        var confirmPassword = document.getElementById("password2").value;
        if (pass != old_password) {
            alert("Mật khẩu cũ không đúng.");
            return false;
        }
        if (password.length < 6) {
            alert("Mật khẩu không đủ 6 chữ cái.");
            return false;
        }
        if (password != confirmPassword) {
            alert("Mật khẩu không khớp.");
            return false;
        }
        return true;
    }
</script>