<?php
session_start();
if(empty($_SESSION["magv"]) || $_SESSION["role"]!="2")
  header("location:../../gv.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php
  $sql2 = "SELECT * FROM giangvien where magv= '{$_SESSION['magv']}'";
  $sql  = "SELECT * FROM nganh,khoa where khoa.makhoa = nganh.makhoa ";
  $sql3 = "SELECT * FROM khoa";
  $r = $exp->fetch_all($sql);
  $r3 = $exp->fetch_all($sql3);

  $info = $exp->fetch_one($sql2);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thêm ngành</title>

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
                <h2><?php echo $info["tengv"]; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="glyphicon glyphicon-user"></i> Giảng viên &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_index.php">Thông tin cá nhân</a></li>
                      <li><a href="admin_cpw.php">Đổi mật khẩu</a></li>
                      <li><a href="admin_canhan.php">Chỉnh sửa thông tin cá nhân</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Thêm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="admin_add_khoa.php">Thêm khoa</a></li>
                      <li><a href="admin_add_nganh.php">Thêm ngành</a></li>
                      <li><a href="admin_add_lop.php">Thêm lớp</a></li>
                    <li><a href="admin_add_hocphan.php">Thêm học phần</a></li>
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
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($info['avatar']); ?>" alt=""><?php echo $info["tengv"]; ?>
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

            <div class="x_panel">
              <div class="x_title">
                <h2>Thêm Ngành</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <form method="post" action="../nganh/add.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã Ngành
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input name="manganh" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên Ngành
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="tennganh" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Số năm đào tạo
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="sonamdt" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Khoa
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select  name="makhoa" class="form-control">
                        <?php foreach ($r3 as $key => $value) {
                         ?>
                        <option value="<?php echo $value["makhoa"]; ?>"><?php echo $value["tenkhoa"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button class="btn btn-primary" type="submit" name="submit">Thêm</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <!-- end x panel -->

            <div class="x_panel">
              <div class="x_title">
                <h2>Danh sách ngành</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Settings 1</a>
                      </li>
                      <li><a href="#">Settings 2</a>
                      </li>
                    </ul>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="info">STT</th>
                      <th class="info">Mã ngành</th>
                      <th class="info">Khoa</th>
                      <th class="info">Tên ngành</th>
                      <td class="info">Số năm đào tạo</td>
                      <td colspan="2" class="info">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($r as $key => $value) {

                     ?>
                    <tr>
                      <th scope="row"><?php echo $key; ?></th>
                      <td><?php echo $value["manganh"]; ?></td>
                      <td><?php echo $value["tenkhoa"]; ?></td>
                      <td><?php echo $value["tennganh"]; ?></td>
                      <td><?php echo $value["sonamdt"]; ?></td>
                      <td><a href="../nganh/delete.php?id=<?php echo $value['manganh']; ?>" onclick="return confirm('Chắc chắn xóa?')"><button type="button" name="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td>
                      <td><a href="../nganh/edit.php?id=<?php echo $value['manganh']; ?>"><button type="button" name="button" class="btn btn-primary"><i class="fa fa-wrench"></i></button></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>
              <!-- list khoa -->
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
