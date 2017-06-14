<?php
session_start();
if(empty($_SESSION["magv"]) || $_SESSION["role"]!="2")
  header("location:../../gv.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php
  // lấy thông tin sinhvien cần sửa
  $sql  = "SELECT * FROM sinhvien where masv = '{$_GET['id']}' ";
  $r = $exp->fetch_one($sql);
  // lấy thông tin lơp
  $sql3 = "SELECT * FROM lop";
  $r3 = $exp->fetch_all($sql3);


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sửa</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="../mystyle.css">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../build/css/mystyle.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- top navigation -->

        <!-- /top navigation -->

        <!-- page content -->
        <div class="container page-content">
      <div class="row">

        <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" > -->
          <div class="col-xs-8 col-xs-offset-2 " >

            <div class="x_panel">
              <div class="x_content">
                <br />
                <form method="post"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã sinh viên
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input name="masv" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["masv"]; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên sinh viên
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="tensv" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["tensv"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ngày sinh
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="ngaysinh" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["ngaysinh"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Giới tính
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="radio">
                        <label>
                          <input type="radio" <?php if($r['gioitinh'] == "Nam") echo "checked"; ?> value="Nam" id="optionsRadios1" name="gioitinh" > <span>Nam</span>
                          <input type="radio" <?php if($r['gioitinh'] == "Nữ") echo "checked"; ?> value="Nữ" id="optionsRadios1" name="gioitinh"> <span>Nữ</span>
                        <label>
                      </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Địa chỉ
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="diachi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["diachi"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">email
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["email"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số điện thoại
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="sdt" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["sdt"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="password" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["password"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lớp
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select  name="malop" class="form-control">
                        <?php foreach ($r3 as $key => $value) {
                         ?>
                        <option value="<?php echo $value["malop"]; ?>"  <?php if($r["malop"] == $value["malop"]) echo "selected";  ?>>
                          <?php echo $value["tenlop"];  ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="../production/admin_add_sinhvien.php"><button class="btn btn-default" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                      <button class="btn btn-primary" type="submit" name="submit">Sửa</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <!-- end x panel -->


        </div>

      </div>
    </div>

        <!-- footer content -->
        <footer style="background-color:#efefef">
          <?php if(isset($_POST["submit"]))
          {
            $data["masv"] = $_POST["masv"];
            $data["tensv"] = $_POST["tensv"];
            $data["ngaysinh"] = $_POST["ngaysinh"];
            $data["gioitinh"] = $_POST["gioitinh"];
            $data["diachi"] = $_POST["diachi"];
            $data["email"] = $_POST["email"];
            $data["sdt"] = $_POST["sdt"];
            $data["password"] = $_POST["password"];
            $data["malop"] = $_POST["malop"];
            $where = "masv = '{$r['masv']}'";
            $exp->update("sinhvien",$data,$where);
            echo "<script>"."window.location= '../production/admin_add_sinhvien.php' "."</script>";
          } ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
