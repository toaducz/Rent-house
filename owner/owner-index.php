<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("location:../index.php");
}
include("navbar.php");
include("delete.php");
include("engine.php");
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <div class="container-fluid">
    <ul class="nav nav-pills nav-justified">
      <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Trang chủ</a></li>
      <li style="background-color: #FAC0E6"><a data-toggle="pill" href="#menu4">Tin nhắn</a></li>
      <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Thêm thông tin nhà ở</a></li>
      <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">Xem nhà</a></li>
      <li style="background-color: #FFFAF0"><a data-toggle="pill" href="#menu3">Cập nhật nhà</a></li>
      <li style="background-color: #FAFAF0"><a data-toggle="pill" href="#menu6">Nhà được thuê</a></li>
    </ul>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div>
          <h3 style="text-align:center;">Người cho thuê</h3>
        </div>
        <div class="container">
          <?php
          include("../config/config.php");
          $u_email = $_SESSION["email"];

          $sql = "SELECT * from owner where email='$u_email'";
          $result = mysqli_query($db, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
            <img src="../images/avatar.png" alt="avatar" style="height:200px; width: 100%">
            <h1>
              <?php echo $rows['full_name']; ?>
            </h1>
            <p class="title">
              <?php echo $rows['email']; ?>
            </p>
            <p><b>Số liên hệ: </b>
              <?php echo $rows['phone_no']; ?>
            </p>
            <p><b>Địa chỉ: </b>
              <?php echo $rows['address']; ?>
            </p>
            <p><b>Loại giấy tờ: </b>
              <?php echo $rows['id_type']; ?>
            </p>
            <p><img src="../<?php echo $rows['id_photo']; ?>" height="100px"></p>


            <!--Trang ca nhan modal -->
            <p><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Cập nhật trang cá
                nhân</button></p>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- noi dung modal-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cập nhật trang cá nhân</h4>
                  </div>
                  <div class="modal-body">

                    <form method="POST">
                      <div class="form-group">
                        <label for="full_name">Họ tên:</label>
                        <input type="hidden" value="<?php echo $rows['owner_id']; ?>" name="owner_id">
                        <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>"
                          name="full_name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>"
                          name="email" readonly>

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
                        <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>" name="id_type"
                          readonly>

                      </div>
                      <div class="form-group">
                        <label>Id:</label><br>
                        <img src="../<?php echo $rows['id_photo']; ?>" id="output_image" height="100px" readonly>
                      </div>
                      <div class="form-group">
                        <a href="change-password.php">Đổi mật khẩu? </a>
                      </div>
                      <hr>
                      <div><button id="submit" name="owner_update" class="btn btn-primary btn-block">Cập nhật</button>
                      </div><br>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="menu4" class="tab-pane fade">
        <div class="container">
          <div>
            <h3>Xem tin nhắn</h3>
          </div>
          <?php
              $owner_id = $rows['owner_id'];
              $sql1 = "SELECT * FROM chat where owner_id='$owner_id' ";

              $query1 = mysqli_query($db, $sql1);

              if (mysqli_num_rows($query1) > 0) {
                while ($row = mysqli_fetch_assoc($query1)) {

                  $tenant_id = $row['tenant_id'];
                  $sql2 = "SELECT * FROM tenant where tenant_id='$tenant_id' ";

                  $query2 = mysqli_query($db, $sql2);

                  if (mysqli_num_rows($query2) > 0) {
                    while ($rows = mysqli_fetch_assoc($query2)) {
          ?>
          <link rel="stylesheet" type="text/css" href="message-style.css">
<!-- 
          <div class="tab">
            <button class="tablinks" id="defaultOpen"
              onmouseover="openCity(event, '<?php echo $rows["full_name"]; ?>')">
              <?php echo $rows["full_name"]; ?>
            </button>
          </div> -->

          <div id="<?php echo $rows["full_name"]; ?>" class="tabcontent">
            <?php
                      $sql3 = "SELECT * FROM chat where tenant_id='$tenant_id' AND owner_id='$owner_id' ";

                      $query3 = mysqli_query($db, $sql3);

                      if (mysqli_num_rows($query3) > 0) {
                        while ($ro = mysqli_fetch_assoc($query3)) {
                          echo $ro["message"] . "<br>";
                        }
                      }
            ?>
          </div>

          <div class="clearfix"></div>
          <?php

                    }
                  }
                }
              }
            }
          } ?>
        </div>
      </div>
      <div id="menu1" class="tab-pane fade">
        <div>
          <h3 style="text-align:center;">Thêm thông tin căn hộ</h3>
        </div>
        <div class="container">


          <div id="map_canvas"></div>
          <form method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="country">Quốc gia:</label>
                  <select class="form-control" name="country" required="required">
                    <option value="">--Chọn quốc gia--</option>
                    <option value="Việt Nam">Việt Nam</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="province">Tỉnh/Thành phố:</label>
                  <select class="form-control" name="province" required="required">
                    <option value="">--Chọn Tỉnh/Thành phố--</option>
                    <option value="HỒ Chí Minh">Hồ Chí Minh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="district">Quận/Huyện:</label>
                  <select class="form-control" name="district" required="required">
                    %{--Hồ Chí Minh--}%
                    <option value="">--Chọn Quận/Huyện--</option>
                    <option value="Quận 1">Quận 1</option>
                    <option value="Quận 2">Quận 2</option>
                    <option value="Quận 3">Quận 3</option>
                    <option value="Quận 4">Quận 4</option>
                    <option value="Quận 5">Quận 5</option>
                    <option value="Quận 6">Quận 6</option>
                    <option value="Quận 7">Quận 7</option>
                    <option value="Quận 8">Quận 8</option>
                    <option value="Quận 9">Quận 9</option>
                    <option value="Quận 10">Quận 10</option>
                    <option value="Quận 11">Quận 11</option>
                    <option value="Quận 12">Quận 12</option>
                    <option value="Quận Tân Phú">Quận Tân Phú</option>
                    <option value="Quận Tân Bình">Quận Tân Bình</option>
                    <option value="Thành Phố Thủ Đức">Thành phố Thủ Đức</option>
                    <option value="Quận Hóc Môn">Quận Hóc MÔn</option>
                    <option value="Quận Củ Chi">Quận Củ Chi</option>
                    <option value="Quận Nhà Bè ">Quận Nhà Bè</option>
                    <option value="Quận Bình Chánh">Quận Bình Chánh</option>
                    <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="city">Địa chỉ:</label>
                  <input type="text" class="form-control" id="city" placeholder="Nhập địa chỉ" name="city">
                </div>
                <div class="form-group">
                  <label for="Booked">Tình trạng:</label>
                  <select class="form-control" name="booked">
                    <option value="">--Tình trạng--</option>
                    <option value="Còn trống">Còn trống</option>
                    <option value="Được thuê">Được thuê</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ward_no">Số nhà:</label>
                  <input type="text" class="form-control" id="ward_no" placeholder="Nhập số nhà" name="ward_no">
                </div>
                <div class="form-group">
                  <label for="contact_no">Thông tin liên hệ.:</label>
                  <input type="text" class="form-control" id="contact_no" placeholder="Nhập thông tin liên hệ"
                    name="contact_no">
                </div>
                <div class="form-group">
                  <label for="property_type">Hình thức cho thuê:</label>
                  <select class="form-control" name="property_type">
                    <option value="">--Chọn hình thức--</option>
                    <option value="Nguyên căn">Nguyên căn</option>
                    <option value="Một lầu">Một tầng</option>
                    <option value="MỘt phòng">MỘt phòng</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="estimated_price">Giá:</label>
                  <input type="estimated_price" class="form-control" id="estimated_price" placeholder="Nhập giá"
                    name="estimated_price">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="total_rooms">Tổng số phòng:</label>
                  <input type="number" class="form-control" id="total_rooms" placeholder="Nhập tổng số phòng"
                    name="total_rooms">
                </div>
                <div class="form-group">
                  <label for="bedroom">Số phòng ngủ:</label>
                  <input type="number" class="form-control" id="bedroom" placeholder="Nhập số phòng ngủ" name="bedroom">
                </div>
                <div class="form-group">
                  <label for="living_room">Số phòng khách:</label>
                  <input type="number" class="form-control" id="living_room" placeholder="Nhập tổng số phòng khách"
                    name="living_room">

                </div>
                <div class="form-group">
                  <label for="kitchen">Số nhà bếp:</label>
                  <input type="number" class="form-control" id="kitchen" placeholder="Nhập số nhà bếp" name="kitchen">
                </div>
                <div class="form-group">
                  <label for="bathroom">Số nhà vệ sinh:</label>
                  <input type="number" class="form-control" id="bathroom" placeholder="Nhập số nhà vệ sinh"
                    name="bathroom">

                </div>
                <div class="form-group">
                  <label for="description">Mô tả:</label>
                  <textarea type="comment" class="form-control" id="description" placeholder="Nhập mô tả"
                    name="description"></textarea>

                </div>
                <table class="table table-bordered">
                  <tr>
                    <div class="form-group">
                      <label><b>Chiều rộng/Chiều dài:</b><span
                          style="color:red; font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Mét</span></label>
                      <td><input type="number" name="latitude" placeholder="Chiều rộng" id="latitude"
                          class="form-control" required /></td>

                      <td><input type="number" name="longitude" placeholder="Chiều dài" id="longitude"
                          class="form-control" required /></td>

                    </div>
                  </tr>
                </table>
                <table class="table" id="dynamic_field">
                  <tr>
                    <div class="form-group">
                      <label><b>Hình Ảnh:</b></label>
                      <td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list"
                          required accept="image/*" /></td>
                      <td><button type="button" id="add" name="add" class="btn btn-danger col-lg-12">Hiện thêm</button>
                      </td>
                    </div>
                  </tr>
                </table>
                <input name="lat" type="text" id="lat" hidden>
                <input name="lng" type="text" id="lng" hidden>
                <hr>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg col-lg-12" value="Thêm thông tin"
                    name="add_property">
                </div>
              </div>
            </div>
          </form>
          <br><br>
        </div>
      </div>
      <div id="menu2" class="tab-pane fade">
        <div>
          <h3 style="text-align:center;">Xem chi tiết</h3>
        </div>
        <div class="container-fluid">
          <input type="text" id="myInput" onkeyup="viewProperty()" placeholder="Tìm kiếm..." title="Type in a name">
          <div style="overflow-x:auto;">
            <table id="myTable">
              <tr class="header">
                <th>Id.</th>
                <th>Quốc gia</th>
                <th>Tỉnh/Thành phố</th>
                <th>Quận/Huyện</th>
                <th>Địa chỉ</th>
                <th>Số nhà.</th>
                <th>SDT.</th>
                <th>Loại hình cho thuê</th>
                <th>Rông</th>
                <th>Dài</th>
                <th>Giá</th>
                <th>Tổng phòng</th>
                <th>Phòng ngủ</th>
                <th>Phòng khách</th>
                <th>Nhà bếp</th>
                <th>Nhà vệ sinh</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
              </tr>
              <?php
              $u_email = $_SESSION['email'];
              $sql1 = "SELECT * from owner where email='$u_email'";
              $result1 = mysqli_query($db, $sql1);
              if (mysqli_num_rows($result1) > 0) {
                while ($rowss = mysqli_fetch_assoc($result1)) {
                  $owner_id = $rowss['owner_id'];

                  $sql = "SELECT * from add_property where owner_id='$owner_id'";
                  $result = mysqli_query($db, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                      $property_id = $rows['property_id'];
              ?>
              <tr>
                <td>
                  <?php echo $rows['property_id'] ?>
                </td>
                <td>
                  <?php echo $rows['country'] ?>
                </td>
                <td>
                  <?php echo $rows['province'] ?>
                </td>
                <td>
                  <?php echo $rows['district'] ?>
                </td>
                <td>
                  <?php echo $rows['city'] ?>
                </td>
                <td>
                  <?php echo $rows['ward_no'] ?>
                </td>
                <td>
                  <?php echo $rows['contact_no'] ?>
                </td>
                <td>
                  <?php echo $rows['property_type'] ?>
                </td>
                <td>
                  <?php echo $rows['latitude'] ?>
                </td>
                <td>
                  <?php echo $rows['longitude'] ?>
                </td>
                <td>
                  <?php echo $rows['estimated_price'] ?> VND
                </td>
                <td>
                  <?php echo $rows['total_rooms'] ?>
                </td>
                <td>
                  <?php echo $rows['bedroom'] ?>
                </td>
                <td>
                  <?php echo $rows['living_room'] ?>
                </td>
                <td>
                  <?php echo $rows['kitchen'] ?>
                </td>
                <td>
                  <?php echo $rows['bathroom'] ?>
                </td>
                <td>
                  <?php echo $rows['description'] ?>
                </td>
                <td>
                  <?php $sql2 = "SELECT * from property_photo where property_id='$property_id'";
                      $query = mysqli_query($db, $sql2);

                      if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) { ?>
                  <img src="<?php echo $row['p_photo'] ?>" width="50px">
                  <?php }
                      }
                    }
                  }
                }
              } ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div id="menu3" class="tab-pane fade">
        <div>
          <h3 style="text-align:center;">Cập nhật</h3>
        </div>
        <div class="container-fluid">
          <input type="text" id="myInput" onkeyup="updateProperty()" placeholder="Tìm kiếm..." title="Type in a name">
          <div style="overflow-x:auto;">
            <table id="myTable">
              <tr class="header">
                <th>Id.</th>
                <th>Quốc gia</th>
                <th>Tỉnh/Thành phố</th>
                <th>Quận/Huyện</th>
                <th>Địa chỉ</th>
                <th>Số nhà.</th>
                <th>SDT.</th>
                <th>Loại hình cho thuê</th>
                <th>Rông</th>
                <th>Dài</th>
                <th>Giá</th>
                <th>Tổng phòng</th>
                <th>Phòng ngủ</th>
                <th>Phòng khách</th>
                <th>Nhà bếp</th>
                <th>Nhà vệ sinh</th>
                <th>Mô tả</th>
                <th>Hình ảnh</th>
                <th>Chỉnh sửa/Xóa</th>
              </tr>
              <?php

              $sql = "SELECT * from add_property where owner_id='$owner_id'";
              $result = mysqli_query($db, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                  $property_id = $rows['property_id'];
              ?>
              <tr>
                <td>
                  <?php echo $rows['property_id'] ?>
                </td>
                <td>
                  <?php echo $rows['country'] ?>
                </td>
                <td>
                  <?php echo $rows['province'] ?>
                </td>
                <td>
                  <?php echo $rows['district'] ?>
                </td>
                <td>
                  <?php echo $rows['city'] ?>
                </td>
                <td>
                  <?php echo $rows['ward_no'] ?>
                </td>
                <td>
                  <?php echo $rows['contact_no'] ?>
                </td>
                <td>
                  <?php echo $rows['property_type'] ?>
                </td>
                <td>
                  <?php echo $rows['latitude'] ?>
                </td>
                <td>
                  <?php echo $rows['longitude'] ?>
                </td>
                <td>
                  <?php echo $rows['estimated_price'] ?> VND
                </td>
                <td>
                  <?php echo $rows['total_rooms'] ?>
                </td>
                <td>
                  <?php echo $rows['bedroom'] ?>
                </td>
                <td>
                  <?php echo $rows['living_room'] ?>
                </td>
                <td>
                  <?php echo $rows['kitchen'] ?>
                </td>
                <td>
                  <?php echo $rows['bathroom'] ?>
                </td>
                <td>
                  <?php echo $rows['description'] ?>
                </td>
                <td>
                  <?php $sql2 = "SELECT * from property_photo where property_id='$property_id'";
                  $query = mysqli_query($db, $sql2);

                  if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                  <img src="<?php echo $row['p_photo'] ?>" width="50px">
                  <?php }
                  } ?>
                </td>
                <form method="POST">
                  <td>
                    <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
                    <a data-toggle="pill" class="btn btn-success" name="update_property"
                      onclick="<?php $property_id = $rows['property_id'] ?>" href="#menu5">Sửa</a>
                      <input type="submit" class="btn btn-danger" name="delete_property" value="Xóa">
                  </td>
              </tr>
              </form>
              <?php }
              } ?>
            </table>
          </div>
        </div>
      </div>
      <div id="menu5" class="tab-pane fade">
        <div>
          <h3 style="text-align:center;">Chỉnh sửa chi tiết căn hộ</h3>
        </div>
        <div class="container">
          <div id="map_canvas"></div>
          <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="country">Quốc gia:</label>
                  <select class="form-control" name="country" required="required">
                    <option value="">--Chọn Quốc gia--</option>
                    <option value="Việt Nam">Việt Nam</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="province">Tỉnh/Thành phố:</label>
                  <select class="form-control" name="province" required="required">
                    <option value="">--Chọn Tỉnh/Thành phố--</option>
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="district">Quận/Huyện:</label>
                  <select class="form-control" name="district" required="required">
                    %{--Hồ Chí Minh--}%
                    <option value="">--Chọn Quận/Huyện--</option>
                    <option value="Quận 1">Quận 1</option>
                    <option value="Quận 2">Quận 2</option>
                    <option value="Quận 3">Quận 3</option>
                    <option value="Quận 4">Quận 4</option>
                    <option value="Quận 5">Quận 5</option>
                    <option value="Quận 6">Quận 6</option>
                    <option value="Quận 7">Quận 7</option>
                    <option value="Quận 8">Quận 8</option>
                    <option value="Quận 9">Quận 9</option>
                    <option value="Quận 10">Quận 10</option>
                    <option value="Quận 11">Quận 11</option>
                    <option value="Quận 12">Quận 12</option>
                    <option value="Quận Tân Phú">Quận Tân Phú</option>
                    <option value="Quận Tân Bình">Quận Tân Bình</option>
                    <option value="Thành Phố Thủ Đức">Thành phố Thủ Đức</option>
                    <option value="Quận Hóc Môn">Quận Hóc MÔn</option>
                    <option value="Quận Củ Chi">Quận Củ Chi</option>
                    <option value="Quận Nhà Bè ">Quận Nhà Bè</option>
                    <option value="Quận Bình Chánh">Quận Bình Chánh</option>
                    <option value="Quận Bình Thạnh">Quận Bình Thạnh</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="city">Phường/Xã:</label>
                  <input type="text" class="form-control" id="city" placeholder="Nhập Phường/Xã" name="city">
                </div>
                <div class="form-group">
                  <label for="vdc/municipality">Loại nhà:</label>
                  <select class="form-control" name="vdc_municipality">
                    <option value="">--Chọn Loại nhà--</option>
                    <option value="Chung Cư">Chung Cư</option>
                    <option value="Nhà ở cũ">Nhà ở cũ</option>
                    <option value="Nhà tái định cư">Nhà tái định cư</option>
                  </select>

                </div>
                <div class="form-group">
                  <label for="Booked">Tình trạng:</label>
                  <select class="form-control" name="booked">
                    <option value="">--Tình trạng--</option>
                    <option value="Còn trống">Còn trống</option>
                    <option value="Được thuê">Được thuê</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ward_no">Nhập số nhà:</label>
                  <input type="text" class="form-control" id="ward_no" placeholder="Nhập số nhà" name="ward_no">
                </div>
                <div class="form-group">
                  <label for="contact_no">Số điện thoại liên hệ</label>
                  <input type="text" class="form-control" id="contact_no" placeholder="Nhập số điện thoại."
                    name="contact_no">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="property_type">Hình thức cho thuê:</label>
                  <select class="form-control" name="property_type">
                    <option value="">--Chọn hình thức--</option>
                    <option value="Nguyên căn">Nguyên căn</option>
                    <option value="Một tầng">Một tầng</option>
                    <option value="Một phòng">MỘt phòng</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="estimated_price">Giá:</label>
                  <input type="estimated_price" class="form-control" id="estimated_price" placeholder="Nhập giá"
                    name="estimated_price">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="total_rooms">Tổng số phòng:</label>
                  <input type="number" class="form-control" id="total_rooms" placeholder="Nhập tổng số phòng"
                    name="total_rooms">
                </div>
                <div class="form-group">
                  <label for="bedroom">Số phòng ngủ:</label>
                  <input type="number" class="form-control" id="bedroom" placeholder="Nhập số phòng ngủ" name="bedroom">
                </div>
                <div class="form-group">
                  <label for="living_room">Số phòng khách:</label>
                  <input type="number" class="form-control" id="living_room" placeholder="Nhập tổng số phòng khách"
                    name="living_room">

                </div>
                <div class="form-group">
                  <label for="kitchen">Số nhà bếp:</label>
                  <input type="number" class="form-control" id="kitchen" placeholder="Nhập số nhà bếp" name="kitchen">
                </div>
                <div class="form-group">
                  <label for="bathroom">Số nhà vệ sinh:</label>
                  <input type="number" class="form-control" id="bathroom" placeholder="Nhập số nhà vệ sinh"
                    name="bathroom">

                </div>
                <div class="form-group">
                  <label for="description">Mô tả:</label>
                  <textarea type="comment" class="form-control" id="description" placeholder="Nhập mô tả"
                    name="description"></textarea>

                </div>
                <table class="table table-bordered">
                  <tr>
                    <div class="form-group">
                      <label><b>Chiều rộng/Chiều dài:</b><span
                          style="color:red; font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Mét</span></label>
                      <td><input type="number" name="latitude" placeholder="Chiều rộng" id="latitude"
                          class="form-control" required /></td>

                      <td><input type="number" name="longitude" placeholder="Chiều dài" id="longitude"
                          class="form-control" required /></td>
                    </div>
                  </tr>
                </table>
                <table class="table" id="dynamic_field">
                  <tr>
                    <div class="form-group">
                      <label><b>Hình Ảnh:</b></label>
                      <td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list"
                          required accept="image/*" /></td>
                      <td><button type="button" id="add" name="add" class="btn btn-danger col-lg-12">Hiện thêm</button>
                      </td>
                    </div>
                  </tr>
                </table>
                <input name="lat" type="text" id="lat" hidden>
                <input name="lng" type="text" id="lng" hidden>
                <hr>
                <hr>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg col-lg-12" value="Cập nhật" name="update_property">
                </div>
              </div>
            </div>
          </form>
          <br><br>

        </div>
      </div>

      <div id="menu6" class="tab-pane fade">
        <div>
          <h3 style="text-align:center;">Chi tiết thuê nhà</h3>
        </div>
        <div class="container">
          <input type="text" id="myInput" onkeyup="bookedProperty()" placeholder="Tìm kiếm..." title="Type in a name">

          <table id="myTable">
            <tr class="header">
              <th>Thuê bởi</th>
              <th>TĐịa chỉ người thuê</th>
              <th>Tỉnh/Thành phố</th>
              <th>Quận/Huyện</th>
              <th>Xã/Phường</th>
              <th>Số nhà</th>
            </tr>
            <?php
            include("../config/config.php");
            $u_email = $_SESSION["email"];

            $sql3 = "SELECT * from owner where email='$u_email'";
            $result3 = mysqli_query($db, $sql3);

            if (mysqli_num_rows($result3) > 0) {
              while ($rowss = mysqli_fetch_assoc($result3)) {
                $owner_id = $rowss['owner_id'];

                $sql2 = "SELECT * from add_property where owner_id='$owner_id'";
                $result2 = mysqli_query($db, $sql2);

                if (mysqli_num_rows($result2) > 0) {
                  while ($ro = mysqli_fetch_assoc($result2)) {
                    $property_id = $ro['property_id'];

                    $sql = "SELECT * from booking where property_id='$property_id'";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <tr>

              <?php
                        $tenant_id = $rows['tenant_id'];
                        $property_id = $rows['property_id'];
                        $sql1 = "SELECT * from tenant where tenant_id='$tenant_id'";
                        $result1 = mysqli_query($db, $sql1);

                        if (mysqli_num_rows($result1) > 0) {
                          while ($row = mysqli_fetch_assoc($result1)) {
              ?>
              <td>
                <?php echo $row['full_name']; ?>
              </td>
              <td>
                <?php echo $row['address']; ?>
              </td>
              <td>
                <?php echo $ro['province']; ?>
              </td>
              <td>
                <?php echo $ro['district']; ?>
              </td>
              <td>
                <?php echo $ro['city']; ?>
              </td>
              <td>
                <?php echo $ro['ward_no']; ?>
              </td>
            </tr>
            <?php }
                        }
                      }
                    }
                  }
                }
              }
            } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>




<script>
  function viewProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
      tr[i].style.display = "none";
      for (var j = 0; j < th.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
            tr[i].style.display = "";
            break;
          }
        }
      }
    }
  }
</script>
<script>
  function updateProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
      tr[i].style.display = "none";
      for (var j = 0; j < th.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
            tr[i].style.display = "";
            break;
          }
        }
      }
    }
  }
</script>
<script>
  function bookedProperty() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");
    for (i = 1; i < tr.length; i++) {
      tr[i].style.display = "none";
      for (var j = 0; j < th.length; j++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
            tr[i].style.display = "";
            break;
          }
        }
      }
    }
  }
</script>
<script>
  $(document).ready(function () {
    var i = 1;
    $('#add').click(function () {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });





    $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    $('#submit').click(function () {
      $.ajax({
        url: "name.php",
        method: "POST",
        data: $('#add_name').serialize(),
        success: function (data) {
          alert(data);
          $('#add_name')[0].reset();
        }
      });
    });
  });  
</script>
