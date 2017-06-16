<?php
session_start();
if(empty($_SESSION["magv"]))
  header("location:../../gv.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php
  $sql  = "SELECT * FROM giangvien,nganh,khoa WHERE giangvien.magv = '{$_SESSION['magv']}'
    and giangvien.manganh = nganh.manganh
    and nganh.makhoa = khoa.makhoa";
  $r = $exp->fetch_one($sql);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đổi mật khẩu</title>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">

              <div class="profile_info">
                <span>Xin chào</span>
                <h2><?php echo $r["tengv"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Giảng viên &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_index.php">Thông tin cá nhân</a></li>
                      <li><a href="admin_cpw.php">Đổi mật khẩu</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Thêm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_add_khoa.php">Thêm khoa</a></li>
                      <li><a href="admin_add_nganh.php">Thêm ngành</a></li>
                      <li><a href="admin_add_lop.php">Thêm lớp</a></li>
                      <li><a href="admin_add_sinhvien.php">Thêm sinh viên</a></li>
                      <li><a href="admin_add_hocky.php">Thêm học kỳ</a></li>
                      <li><a href="admin_add_giangvien.php">Thêm giảng viên</a></li>
                    </ul>
                  </li>
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($r['avatar']); ?>" alt="Anh loi"><?php echo $r["tengv"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="admin_index.php"> Thông tin cá nhân</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="container page-content">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">

       <br>

      </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" > -->
          <div class="col-md-8 col-md-offset-3 " >

            <form method="post" action="../giangvien/cpw.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <h3 class=" text-center">Đổi mật khẩu</h3>
              <input type="hidden" name="magv" value="<?php echo $r['magv']; ?>">
              <input type="hidden" name="role" value="<?php echo $r['role']; ?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mật khẩu cũ
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="old-pass" type="password" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mật khẩu mới
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="last-name" name="new-pass" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu mới</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="c-pass">
                </div>
              </div>



              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" name="submit">Đổi mật khẩu</button>
                </div>

              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <br>
                  <?php
                    switch($_GET["id"])
                      {
                        case 1:
                          echo "<p style='color:#04d404'>"."Đổi mật khẩu thành công"."</p>";
                          break;
                        case 2:
                          echo "<p style='color:red'>"."Mật khẩu mới không trùng nhau"."</p>";
                          break;
                        case 3:
                          echo "<p style='color:red'>"."Mật khẩu cũ không chính xác"."</p>";
                          break;
                      }
                   ?>
                </div>

              </div>
            </form>

        </div>
      </div>
    </div>

        <!-- footer content -->
        <footer style="background-color:#efefef">

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
