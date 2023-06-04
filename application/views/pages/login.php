<html>
<head>
	<title>Login</title>
	<?php echo $css; ?>
	<style>
	body
      {
          background: url('https://i.imgur.com/IZDzEBK.gif');
          background-repeat: no-repeat !important;
          background-size: cover !important;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: auto;
      }
	.row{
		width:100%;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home"><img src="<?php echo base_url();?>assets/picture/Logo.png"></a>
	</nav>

	<div class="row">
		<div class="container col-sm-8" style="margin-top: 50px">
		</div>
		<div class="col-sm-4 justify-content-center p-4">
			<div class="card p-3">
				<h3>LOGIN</h3>
				<?php echo form_open('Login'); ?>
					<?php if(isset($error)) { echo $error; }; ?>
				<div class="form-group">
					<label>Email</label>
					<div class="input-container">
						<i class="fa fa-user-o icon"></i><input type="text" class="form-control" name="email" placeholder="Enter Email" autofocus>
					</div>
					<p><?php echo form_error('email'); ?></p>
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-container">
						<i class="fa fa-key icon"></i><input type="password" name="password" class="form-control" placeholder="Enter Password">
					</div>
					<p><?php echo form_error('password'); ?></p>
				</div>
				<div class="form-group">
					<label>Captcha</label><br>
					<span><?php echo $captcha_image;?></span>
					<a href="#" onclick="parent.window.location.reload(true)"> <i class="fa fa-refresh" aria-hidden="true"></i></a><br><br>
					<div class="input-container">
						<i class="fa fa-key icon"></i><input type="text" name="captcha" class="form-control" placeholder="Enter Captcha">
					</div>
					<p><?php echo form_error('captcha'); ?></p>
				</div>
				<div>
					<button class="btn" style="width:100%" name="btn-login" id="btn-login" type="submit">
						<span class="btn__inner">
			        <span class="btn__slide"></span>
				        <span class="btn__content">Login</span>
			      </span>
					</button>
  			</div>
				</form>
				<p class="footer">Not a member yet? <a href="<?php echo base_url() ?>index.php/signup">Sign Up Here</a>.</p>
			</div>
	</div>
</div>
<div id="error" style="margin-top: 10px"></div>

</body>
</html>
