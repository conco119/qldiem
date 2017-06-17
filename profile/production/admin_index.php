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
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Giảng viên &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-chevron-down"></span></a>
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


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $r['tengv']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3 " align="center">
                  <form method="post" enctype="multipart/form-data" action="../giangvien/update-avatar.php">

                    <img id="avatar" width="200px" height="auto" alt="User Pic" src="data:image/jpeg;base64,<?php echo base64_encode($r['avatar']); ?>" class=" img-responsive"/>
                    <input id="anhdaidien" style="display:none" type="file" name="image">
                    <input type="hidden" name="magv" value="<?php echo $r["magv"]; ?>">
                    <input type="hidden" name="role" value="<?php echo $r['role']; ?>">
                    <br>

                    <button type="button" id="suaanh" class="btn btn-warning">Sửa ảnh</button>
                    <button id="save" style="display:none" type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok">Lưu</i></button>

                  </form>
                </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>


                      <tr>
                        <td>Mã giảng viên:</td>
                        <td><?php echo $r['magv']; ?></td>
                      </tr>

                      <tr>
                        <td>Tên giảng viên:</td>
                        <td><?php echo $r['tengv']; ?></td>
                      </tr>
                      <tr>
                        <td>Ngày sinh</td>
                        <td><?php echo $r['ngaysinh']; ?></td>
                      </tr>
                      <tr>
                        <td>Giới tính:</td>
                        <td><?php echo $r['gioitinh']; ?></td>
                      </tr>

                        <tr>
                        <td>Khoa:</td>
                        <td><?php echo $r["tenkhoa"]; ?></td>
                      </tr>

                        <tr>
                        <td>Chuyên Ngành:</td>
                        <td><?php echo $r["tennganh"]; ?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><a href="mailto:info@support.com"><?php echo $r["email"] ?></a></td>
                      </tr>




                    </tbody>
                  </table>

                  <!-- <a href="#" class="btn btn-primary">My Sales Performance</a> -->
                  <!-- <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
                </div>
              </div>
            </div>
                 <!-- <div class="panel-footer">


                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>

                    </div> -->

          </div>
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
        // save image to dababase
        $(document).ready(function(){
          $('#save').click(function(){
            var image = $('#anhdaidien').val();
            if(image == ""){
              alert("Hãy chọn 1 ảnh!");
              return false;
            }
            else{
              var extension = image.split('.').pop().toLowerCase();
              if(jQuery.inArray(extension,['gif', 'png', 'jpg', 'jpeg']) == -1){
                alert("Ảnh không hợp lệ");
                $('#anhdaidien').val("");
                return false;
              }
            }
          });
        });

        // click button -> select
          $(document).ready(function(){
            $('#suaanh').click(function(){
              $('#anhdaidien').click();
            });
          });

          // lay url của ảnh
          function readURL(input, target){
            if(input.files && input.files[0]){
              var reader = new FileReader();
              var image_target = $(target);
              reader.onload = function(e){
                image_target.attr('src',e.target.result).show();
              }
              reader.readAsDataURL(input.files[0]);
              $('#save').css("display","inline-block");
            }
          }
          // preview image
          $(document).ready(function(){
            $('#anhdaidien').change(function(){
              readURL(this,"#avatar");
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
