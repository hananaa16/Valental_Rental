<html>
<head>
  <title>Sign Up</title>
	<?php echo $css; ?>
  <style>
  body
      {
          background: url('https://i.imgur.com/YsRzL3G.gif');
          background-repeat: no-repeat !important;
          background-size: cover !important;
          background-position: center;
          background-attachment: fixed;
          width: 100%;
          height: auto;
      }
    .input-container
    {
      color : #FBB80E;
      border-radius: 47%;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home"><img src="<?php echo base_url();?>assets/picture/Logo.png"></a>
	</nav>
  <div class="row p-4">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="card p-4">
        <h3>REGISTER NEW MEMBER</h3><br>
				<?php echo form_open('Signup'); ?>
          <div class="form-group">
            <label>Email</label>
            <div class="input-container" style="color-background: #FBB80E; border-radius: 47%;">
              <i class="fa fa-envelope icon" aria-hidden="true"></i><input type="text" name="email" class="form-control" placeholder="Email">
            </div>
            <p><?php echo form_error('email'); ?></p>
          </div>
          <div class="form-group">
            <label>First Name</label>
            <div class="input-container">
              <i class="fa fa-user-o icon"></i><input type="text" name="firstname" class="form-control" placeholder="First Name">
            </div>
            <p><?php echo form_error('firstname'); ?></p>
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <div class="input-container">
              <i class="fa fa-user-o icon"></i><input type="text" name="lastname" class="form-control" placeholder="Last Name">
            </div>
            <p><?php echo form_error('lastname'); ?></p>
          </div>
          <div class="form-group">
            <label>Address</label>
            <div class="input-container">
              <i class="fa fa-map-marker icon"></i><input type="text" name="address" class="form-control" placeholder="Address">
            </div>
            <p><?php echo form_error('address'); ?></p>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <div class="input-container">
              <i class="fa fa-phone icon"></i><div class="input-group-prepend"><div class="input-group-text">+62</div></div><input type="text" name="phonenumber" class="form-control" placeholder="Phone Number">
            </div>
            <p><?php echo form_error('phonenumber'); ?></p>
          </div>
          <div class="form-group">
            <label>Password</label>
            <div class="input-container">
              <i class="fa fa-key icon"></i><input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <p><?php echo form_error('password'); ?></p>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <div class="input-container">
              <i class="fa fa-key icon"></i><input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <p><?php echo form_error('cpassword'); ?></p>
          </div>
          <div class="form-group">
            <div class="text-center">
              <button class="btn" style="width:100%" name="btn-register" type="submit">
              <span class="btn__inner">
  			        <span class="btn__slide"></span>
  				        <span class="btn__content">Register</span>
  			      </span>
            </div>
          </div>
        </form>
        <p class="footer">Already a member? <a href="<?php echo base_url() ?>index.php/login">Login here</a>.</p>
      </div>
    </div>
    <div class="col-sm-3">
    </div>
  </div>
</body>
</html>
