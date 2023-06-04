<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Valental!</title>
	<?php echo $js;
	echo $css;?>
	<style>
	.name h4 {
		font-size: 80px;
		color: #ff4655;
		text-shadow: 4px 8px 2px #000;
		font-weight: bold;
	}

	.name p {
		font-size: 30px;
		color: #FBB80E;
		text-shadow: 2px 4px 2px #000;
		font-weight: bold;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	@media screen and (max-width: 650px) {
		.name h4 {
			font-size: 60px;
		}

		.name p{
			font-size: 25px;
		}
	}

	@media screen and (max-width: 540px) {
		.name h4 {
			font-size: 50px;
		}

		.name p{
			font-size: 20px;
		}
	}

	@media screen and (max-width: 361px) {
		.name h4{
			font-size: 40px;
		}
		.name p {
			font-size: 15px;
		}
	}
	</style>
</head>
<body>
	<div>
		<div class = "background">
		<div class="content">
			<?php echo $navbar;
				if ($this->session->userdata('name')) {?>
					<br><br>
					<div class="name">
						<h4>V A L E N T A L<h4>
						<p>Hello, <?php echo $this->session->userdata('name'); ?></p>
					</div>
					<div>
						<a href="<?php echo base_url().'index.php/customer/products'; ?>"  class="btn btn--light" role="button" aria-pressed="true">
			      <span class="btn__inner">
			        <span class="btn__slide"></span>
			        <span class="btn__content">Rent for cheap</span>
			      </span>
						</a>
  				</div>
				<?php } else{ ?>
					<br><br><br>
					<div class="name">
						<h4>V A L E N T A L<h4>
					</div>
					<div>
						<a href="<?php echo base_url().'index.php/customer/products'; ?>"  class="btn btn--light" role="button" aria-pressed="true">
	 				 <span class="btn__inner">
	 					 <span class="btn__slide"></span>
	 					 <span class="btn__content">Rent for cheap</span>
	 				 </span>
	 				 </a>
			    </button>
  				</div>
				<?php } ?>
	</div>
	</div>
	</div>
	<?php echo $footer; ?>
</body>
</html>
