<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("location:../index.php");
}
include("navbar.php");
?>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'In'
      ]
    });
  });
</script>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>


</style>

<body>

  <div class="container-fluid">
    <ul class="nav nav-pills nav-justified">
      <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Danh sách căn hộ</a></li>
      <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Danh sách Người cho thuê</a></li>
      <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">Danh sách Người thuê</a></li>
      <li style="background-color: #FAFACD"><a data-toggle="pill" href="#menu3">Danh sách nhà được đặt</a></li>
    </ul>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div>
          <h3>Danh sách căn hộ</h3>
        </div>

        <div class="container-fluid">
          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm..." title="Type in a name">
          <div style="overflow-x:auto;" id="table1">
            <table id="myTable">
              <tr class="header">
                <th>Id.</th>
                <th>Quốc gia</th>
                <th>Tỉnh/Thành phố</th>
                <th>Quận/Huyện</th>
                <th>Địa chỉ</th>
                <th>Số nhà</th>
                <th>Số liên lạc</th>
                <th>Tình trạng</th>
                <th>Chiều rộng</th>
                <th>Chiều dài</th>
                <th>Giá</th>
                <th>Tổng phòng</th>
                <th>Phòng ngủ</th>
                <th>Phòng khách</th>
                <th>Nhà Bếp</th>
                <th>Nhà vệ sinh</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
              </tr>
              <?php
              include("../config/config.php");

              $sql = "SELECT * from add_property";
              $result = mysqli_query($db, $sql);

              if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                  $property_id = $rows['property_id'];
              ?>
              <div class="text-center">
                <a onclick="printDiv()" class="btn btn-primary">In</a>
              </div><br></br>
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
                  <img src="../owner/<?php echo $row['p_photo'] ?>" width="50px">
                  <?php }
                  }
                }
              } ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <script>
        // in  danh sách
        function printDiv() {
          var divToPrint = document.getElementById("myTable");
          newWin = window.open("");
          newWin.document.write(divToPrint.outerHTML);
          newWin.print();
          newWin.close();
        }


      </script>

      <div id="menu1" class="tab-pane fade">
        <div>
          <h3>Danh sách Người cho thuê</h3>
        </div>
        <div class="container-fluid">
          <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Tìm kiếm..." title="Type in a name">

          <table id="myTable2">
            <tr class="header">
              <th>Id.</th>
              <th>Họ tên</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Giấy tờ tùy thân</th>
              <th>Hình ảnh</th>
            </tr>
            <?php
            include("../config/config.php");

            $sql = "SELECT * from owner";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

            ?>
            <div class="text-center">
              <a onclick="printDiv1()" class="btn btn-primary">In</a>
            </div><br></br>
            <tr>
              <td>
                <?php echo $rows['owner_id'] ?>
              </td>
              <td>
                <?php echo $rows['full_name'] ?>
              </td>
              <td>
                <?php echo $rows['email'] ?>
              </td>
              <td>
                <?php echo $rows['phone_no'] ?>
              </td>
              <td>
                <?php echo $rows['address'] ?>
              </td>
              <td>
                <?php echo $rows['id_type'] ?>
              </td>
              <td><img id="myImg" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
              </div>
            </tr>
            <?php }
            } ?>
          </table>
        </div>
      </div>
      <script>
        function printDiv1() {
          var divToPrint = document.getElementById("myTable2");
          newWin = window.open("");
          newWin.document.write(divToPrint.outerHTML);
          newWin.print();
          newWin.close();
        }

      </script>


      <div id="menu2" class="tab-pane fade">
        <div>
          <h3>Danh sách Người thuê nhà</h3>
        </div>
        <div class="container">
          <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Tìm kiếm..." title="Type in a name">

          <table id="myTable3">
            <tr class="header">
              <th>Id</th>
              <th>Họ tên</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Giấy tờ tùy thân</th>
              <th>Hình ảnh</th>
            </tr>
            <?php
            include("../config/config.php");
            $sql = "SELECT * from tenant";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {

            ?>
            <div class="text-center">
              <a onclick="printDiv2()" class="btn btn-primary">In</a>
            </div><br></br>
            <tr>
              <td>
                <?php echo $rows['tenant_id'] ?>
              </td>
              <td>
                <?php echo $rows['full_name'] ?>
              </td>
              <td>
                <?php echo $rows['email'] ?>
              </td>
              <td>
                <?php echo $rows['phone_no'] ?>
              </td>
              <td>
                <?php echo $rows['address'] ?>
              </td>
              <td>
                <?php echo $rows['id_type'] ?>
              </td>
              <td><img id="myImg2" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>

              <div id="myModal2" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img02">
                <div id="caption2"></div>
              </div>

            </tr>
            <?php }
            } ?>
          </table>
        </div>
      </div>
      <script>
        function printDiv2() {
          var divToPrint = document.getElementById("myTable3");
          newWin = window.open("");
          newWin.document.write(divToPrint.outerHTML);
          newWin.print();
          newWin.close();
        }

      </script>

      <div id="menu3" class="tab-pane fade">
        <div>
          <h3>Danh sách nhà được đặt</h3>
        </div>
        <div class="container">
          <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Tìm kiếm..." title="Type in a name">

          <table id="myTable4">
            <tr class="header">
              <th>Id</th>
              <th>Đặt bởi</th>
              <th>Địa chỉ người thuê</th>
              <th>Tỉnh/Thành phố căn hộ</th>
              <th>Quận/Huyện căn hộ</th>
              <th>Số nhà</th>
              <th>Chủ nhà</th>
              <th>Địa chỉ chủ nhà</th>
            </tr>

            <?php
            include("../config/config.php");


            $sql = "SELECT * from booking";
            $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($rows = mysqli_fetch_assoc($result)) {
            ?>
            <div class="text-center">
              <a onclick="printDiv3()" class="btn btn-primary">In</a>
            </div><br></br>
            <tr>
              <td>
                <?php echo $rows['booking_id'] ?>
              </td>
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
              <?php
                    $sql2 = "SELECT * from add_property where property_id='$property_id'";
                    $result2 = mysqli_query($db, $sql2);
                    if (mysqli_num_rows($result2) > 0) {
                      while ($ro = mysqli_fetch_assoc($result2)) {
              ?>
              <td>
                <?php echo $ro['province']; ?>
              </td>
              <td>
                <?php echo $ro['district']; ?>
              </td>
              <td>
                <?php echo $ro['ward_no']; ?>
              </td>
              <?php
                        $owner_id = $ro['owner_id'];
                        $sql3 = "SELECT * from owner where owner_id='$owner_id'";
                        $result3 = mysqli_query($db, $sql3);

                        if (mysqli_num_rows($result3) > 0) {
                          while ($rowss = mysqli_fetch_assoc($result3)) {

              ?>
              <td>
                <?php echo $rowss['full_name']; ?>
              </td>
              <td>
                <?php echo $rowss['address']; ?>
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
      <script>
        function printDiv3() {
          var divToPrint = document.getElementById("myTable4");
          newWin = window.open("");
          newWin.document.write(divToPrint.outerHTML);
          newWin.print();
          newWin.close();
        }

      </script>
    </div>

</body>


<script>
  function myFunction() {
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
  function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable2");
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
  function myFunction3() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput3");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable3");
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
  function myFunction4() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput4");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable4");
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
  // modal
  var modal = document.getElementById("myModal");

  // Lấy hình từ database thêm vào modal - giấy tờ 
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Thẻ <span> đóng modal
  var span = document.getElementsByClassName("close")[0];

  // khi ấn vào thẻ <span> (x), đóng modal
  span.onclick = function () {
    modal.style.display = "none";
  }
</script>

<script>
  // modal
  var modal2 = document.getElementById("myModal2");

  // lấy hình nhét vào modal 2 - ảnh nhà
  var img2 = document.getElementById("myImg2");
  var modalImg2 = document.getElementById("img02");
  var captionText2 = document.getElementById("caption2");
  img2.onclick = function () {
    modal2.style.display = "block";
    modalImg2.src = this.src;
    captionText2.innerHTML = this.alt;
  }
  var span2 = document.getElementsByClassName("close")[1];
  span2.onclick = function () {
    modal2.style.display = "none";
  }
</script>