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
                <h3 style="font-weight: bold;">Bạn muốn là ai?</h3>
                <hr>
                <p>Bạn muốn đăng kí như là?</p><br><br>
                <button type="submit" class="btn btn-info" onclick="window.location.href='tenant-register.php'"
                    style="width:200px;">Người thuê</button>
                <button type="submit" class="btn btn-info" onclick="window.location.href='owner-register.php'"
                    style="width:200px;">Người cho thuê</button>
            </div>

        </div>
    </div>
</section>