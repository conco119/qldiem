<?php
ob_start();
session_start();
if(empty($_SESSION["magv"]))
  header("location:../../gv.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php
  // lấy thông tin bảng điểm  cần sửa
  $sql  = "SELECT * FROM ctbangdiem,hocphan where masv = '{$_GET['masv']}' and ctbangdiem.mahp = '{$_GET['mahp']}' and ctbangdiem.mahp = hocphan.mahp ";
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
                      <input readonly name="masv" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["masv"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mã học phần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="mahp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["mahp"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tên học phần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="tenhp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["tenhp"]; ?>">
                    </div>
                  </div>




                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm chuyên cần
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="diemcc" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["diemcc"]; ?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm giữa kì
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="diemgk" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["diemgk"]; ?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm thi kết thúc
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="last-name" name="diemkt" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["diemkt"]; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Điểm tổng kết
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input readonly type="text" id="last-name" name="tongket" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $r["tongket"]; ?>">
                    </div>
                  </div>



                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="../production/gv_nhapdiem.php" ><button class="btn btn-default" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
                      <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
                      <a href="thilai.php?masv=<?php echo $_GET['masv']."&"."mahp=".$_GET['mahp']; ?>"><button class="btn btn-primary" type="button" name="submit">Cập nhật điểm thi lại</button></a>
                      <a href="caithien.php?masv=<?php echo $_GET['masv']."&"."mahp=".$_GET['mahp']; ?>"><button style="margin-left:50px;margin-top:20px" class="btn btn-primary" type="button" name="submit">Cập nhật điểm cải thiện</button></a>

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
          <?php
          if(isset($_POST["submit"]))
          {

                  $data['diemcc'] = $_POST['diemcc'];
                  $data['diemgk'] = $_POST['diemgk'];
                  $data['diemkt'] = $_POST['diemkt'];
                  $data['tongket'] = $data['diemcc']/10 + $data['diemgk']/5 + ($data['diemkt']*7)/10;
                    if($data['tongket'] < 4)
                    {
                      $data["diemchu"] = "F";
                      $data["diemso"] = 0;
                    }
                    else if($data['tongket'] >=4 && $data['tongket'] <=4.9)
                    {
                      $data["diemchu"] = "D";
                      $data["diemso"] = 1;
                    }
                    else if($data['tongket'] >=5 && $data['tongket'] <=5.4)
                    {
                      $data["diemchu"] = "D+";
                      $data["diemso"] = 1.5;
                    }
                    else if($data['tongket'] >=5.5 && $data['tongket'] <=5.9)
                    {
                      $data["diemchu"] = "C";
                      $data["diemso"] = 2;
                    }
                    else if($data['tongket'] >=6.0 && $data['tongket'] <=6.9)
                    {
                      $data["diemchu"] = "C+";
                      $data["diemso"] = 2.5;
                    }
                    else if($data['tongket'] >=7.0 && $data['tongket'] <=7.9)
                    {
                      $data["diemchu"] = "B";
                      $data["diemso"] = 3;
                    }
                    else if($data['tongket'] >=8.0 && $data['tongket'] <=8.4)
                    {
                      $data["diemchu"] = "B+";
                      $data["diemso"] = 3.5;
                    }
                    else if($data['tongket'] >=8.5){
                      $data["diemchu"] = "A";
                      $data["diemso"] = 4;
                    }
                  $where = " masv = '{$_GET['masv']}' and mahp='{$_GET['mahp']}' ";
                  $exp->update("ctbangdiem",$data,$where);
                  header("location: ../production/gv_nhapdiem.php");
                }



          ?>
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
