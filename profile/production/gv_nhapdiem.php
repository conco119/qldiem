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
    $sql2 ="select * from sinhvien";
  $r = $exp->fetch_one($sql);

//show nganh
 $sql_nganh ="SELECT * from nganh";
 $nganh = $exp->fetch_all($sql_nganh);
//show hoc phan
  $sql_hocphan = "SELECT * FROM hocphan";
  $hocphan = $exp->fetch_all($sql_hocphan);
//show hoc ky
  $sql_hocky ="SELECT * FROM hocky";
  $hocky = $exp->fetch_all($sql_hocky);
// show lan hoc
$sql_lanhoc ="SELECT * FROM lanhoc";
$lanhoc = $exp->fetch_all($sql_lanhoc);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giảng viên</title>

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
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Giảng viên &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gv_index.php">Thông tin cá nhân</a></li>
                      <li><a href="gv_cpw.php">Đổi mật khẩu</a></li>
                      <li><a href="gv_nhapdiem.php">Nhập điểm</a></li>
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
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($r['avatar']); ?>" alt=""><?php echo $r["tengv"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="gv_index.php"> Thông tin cá nhân</a></li>
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
                <h2>Nhập điểm</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />
                <form method="post" action="" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ngành
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="nganh" class="form-control" name="nganh">
                        <option slected hidden >Chọn</option>
                        <?php foreach ($nganh as $key => $value): ?>
                          <option value="<?php echo $value['manganh']; ?>"><?php echo $value['tennganh']; ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lớp
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="lop" class="form-control" name="lop">
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên sinh viên
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="tensinhvien" class="form-control" name="lop">
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mã sinh viên
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="masv" name="masv" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên học phần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="hocphan" class="form-control" name="mahp">
                        <option selected hidden>Chọn</option>
                        <?php foreach ($hocphan as $key => $value) {
                          echo "<option value='{$value['mahp']}'>{$value['tenhp']}</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                  <input id="magv" type="hidden" name="" value="<?php echo $r["magv"]; ?>">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mã học phần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="mahocphan"  required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Học kỳ
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="hocky" class="form-control" name="mahp">
                        <option selected hidden>Chọn</option>
                        <?php foreach ($hocky as $key => $value) {
                          echo "<option value='{$value['mahocky']}'>{$value['mahocky']}</option>";
                        } ?>
                      </select>
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm chuyên cần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="diemcc" name="password" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm giữa kì
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="diemgk" name="password" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm thực hành
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="diemth" name="password" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm thi cuối kì
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="diemkt" name="password" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>



                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button id="submit" class="btn btn-primary" type="button" name="submit">Thêm</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <!-- end nhap diem -->

            <div class="x_panel">
              <div class="x_title">
                <h2>Tìm kiếm</h2>
                <input type="text" name="" value="" placeholder="Nhập mã sinh viên" id="search" class="form-control" autocomplete="off">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                      <th class="bold">STT</th>
                      <th class="bold">Mã sinh viên</th>
                      <th class="bold">Mã học phần</th>
                      <th class="bold">Học kỳ</th>
                      <td class="bold">Điểm chuyên cần</td>
                      <td class="bold">Điểm giữa kì</td>
                      <td class="bold">Điểm thực hành</td>
                      <td class="bold">Điểm kiếm tra</td>
                      <td class="bold">Điểm tổng kết</td>
                      <td class="bold">Điểm chữ</td>
                      <td class="bold">Điểm thi lại</td>
                      <td class="bold">Điểm cải thiện</td>
                      <td colspan="2" class="bold">Action</td>
                    </tr>
                  </thead>
                  <tbody id="body-table">

                  </tbody>
                </table>

              </div>
            </div>

            <!-- end bang sinh vien -->

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
    <script type="text/javascript">
      // ajax nganh->lop
      $('#nganh').change(function(){
        $.ajax({
          url: "../ajax/nganh-lop.php",
          type: 'post',
          dataType: "text",
          data:{
            manganh: $('#nganh').val()
          },
          success: function(result){
            $('#lop').html(result);
            $('#tensinhvien').html("");
            $('#masv').val("");

          }
        });
      });
      // ajax lop -> sinh vien
      $('#lop').change(function(){
        $.ajax({
          url: "../ajax/lop-sinhvien.php",
          type: 'post',
          dataType: "text",
          data:{
            malop: $('#lop').val()
          },
          success: function(result){
            $('#tensinhvien').html(result);
            $('#masv').val("");

          }
        });
      });
      //  sinhvien-> ma sinh vien
      $('#tensinhvien').change(function(){
        $('#masv').val($(this).val());
      });

      // hocphan -> mahocphan
      $('#hocphan').change(function(){
        $('#mahocphan').val($(this).val());
      });

      // submit diem
      $('#submit').click(function(){
        $.ajax({
          url: "../ajax/add-diem.php",
          type: "post",
          dataType: "text",
          data:{
            masv: $('#masv').val(),
            mahp: $('#mahocphan').val(),
            magv: $('#magv').val(),
            mahocky: $('#hocky').val(),
            diemcc: $('#diemcc').val(),
            diemgk: $('#diemgk').val(),
            diemth: $('#diemth').val(),
            diemkt: $('#diemkt').val()
          },
          success: function(result){
              alert(result);
          }
        });
      });

      // tim kiem
      $("#search").on("input propertychange keyup",function(){
        $.ajax({
          url: "../ajax/search-sv.php",
          type: "post",
          dataType: "text",
          data: {
            masv: $(this).val()
          },
          success: function(result){
              $('#body-table').html(result);
          }
        });
      });
    </script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
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
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/DateJS/build/date.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
