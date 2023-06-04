<style>
.navbar ul{
	display: flex;
	width: 100%;
	margin: auto;
	max-width: 1000px;
	justify-content: space-between;
	text-align: center;
}
.navbar li {
	padding: 1rem 2rem 1.15rem;
  text-transform: uppercase;
  cursor: pointer;
  color: #ebebeb;
	min-width: 80px;
	margin: auto;
}

.navbar li:hover {
  background-image: url('https://scottyzen.sirv.com/Images/v/button.png');
  /* background-color: #FF4655; */
  background-size: 100% 100%;
  color: #27262c;
  animation: spring 300ms ease-out;
  text-shadow: 0 -1px 0 #ef816c;
	font-weight: bold;
}
.navbar li:active {
  transform: translateY(4px);
}

@keyframes spring {
  15% {
    -webkit-transform-origin: center center;
    -webkit-transform: scale(1.2, 1.1);
  }
  40% {
    -webkit-transform-origin: center center;
    -webkit-transform: scale(0.95, 0.95);
  }
  75% {
    -webkit-transform-origin: center center;
    -webkit-transform: scale(1.05, 1);
  }
  100% {
    -webkit-transform-origin: center center;
    -webkit-transform: scale(1, 1);
  }
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url() ?>index.php/home"><img src="<?php echo base_url();?>assets/picture/Logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>index.php/home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>index.php/customer/products">Products</a>
      </li>
			<?php if ($this->session->userdata('name')) {?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>index.php/customer/customerorder">Orders</a>
      </li>
		<?php }?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>index.php/customer/cart">Cart</a>
      </li>
			<?php if (!$this->session->userdata('name')) {?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>index.php/login">Sign In</a>
      </li>
			<?php }?>
			<?php if ($this->session->userdata('name')) {?>
      <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>index.php/home/logout">Sign Out</a>
      </li>
				<?php }?>
    </ul>
  </div>
</nav>
