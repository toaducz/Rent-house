<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:index.php");
}
include("navbar.php");
?>


<section class="container-fluid sign-in-form-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12 sign-up" style="text-align: center;">
                <h3 style="font-weight: bold;">Bạn là ai?</h3>
                <hr>
                <p>Nếu bạn muốn đăng nhập như khách thuê nhà, ấn vào "Người thuê". Nếu bạn muốn cho thuê ngôi nhà của
                    bạn, ấn vào "Người cho thuê".</p><br><br>
                <button type="submit" class="btn btn-info" onclick="window.location.href='tenant-login.php'"
                    style="width:200px;">Người thuê</button>
                <button type="submit" class="btn btn-info" onclick="window.location.href='owner-login.php'"
                    style="width:200px;">Người cho thuê</button>
                <button type="submit" class="btn btn-info" onclick="window.location.href='admin-login.php'"
                    style="width:200px;">Quản trị viên</button>
            </div>

        </div>
    </div>
</section>