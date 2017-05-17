<?php session_start(); ?>
<?php require 'layout/_header.php'; ?>
<?php require 'model/DBPDO.php'; ?>

	<div class="container">

		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Đăng nhập</h2>
			</div>
		<form method="post" action="model/lgcheck.php">
			<label for="username">Tên đăng nhập</label>
			<br/>
			<input type="text" id="username" name="username" required="">
			<br/>
			<label for="password">Mật khẩu</label>
			<br/>
			<input type="password" id="password" name="password" required="">
			<br/>
			<button type="submit" name="submit">Đăng nhập</button>
			<br>
			<?php if(isset($_GET["wrong"]))
				echo "<p style='color:red'>Tài khoản hoặc mật khẩu không đúng </p>";
			 ?>
			<br/>
		</form>
			<a href="#"><p class="small">Quên mật khẩu?</p></a>
		</div>
	</div>

<?php require 'layout/_footer.php'; ?>

<!-- <script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
	//document.getElementById("bootstrap").href = "#";
</script> -->

</html>
