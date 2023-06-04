<!DOCTYPE html>
<html>
<head>
  <?php echo $js;
	echo $css;?>
  <title>Product List</title>
  <style>
  body{
    background-image: url(https://i.imgur.com/mc1SHbe.gif);
  }

  .card{
    border-radius:10px;
    border: none;
    box-shadow: 2px 4px 4px #888888;
    height: 350px;
  }

  .card-price {
  	display: inline-block;
    width: auto;
  	height: 38px;
    box-shadow: 2px 4px 4px #888888;
  	background-color: #6ab070;
  	-webkit-border-radius: 3px 4px 4px 3px;
  	-moz-border-radius: 3px 4px 4px 3px;
  	border-radius: 3px 4px 4px 3px;

  	border-left: 1px solid #6ab070;

  	/* This makes room for the triangle */
  	margin-left: 19px;
  	position: relative;
  	color: white;
  	font-size: 13px;
  	line-height: 38px;
  	padding: 0 10px 0 10px;
  }

  /* Makes the triangle */
  .card-price:before {
  	content: "";
  	position: absolute;
  	display: block;
  	left: -19px;
  	width: 0;
  	height: 0;
  	border-top: 19px solid transparent;
  	border-bottom: 19px solid transparent;
  	border-right: 19px solid #6ab070;
  }

  /* Makes the circle */
  .card-price:after {
  	content: "";
  	background-color: white;
  	border-radius: 50%;
  	width: 4px;
  	height: 4px;
  	display: block;
  	position: absolute;
  	left: -9px;
  	top: 17px;
  }

  img {
  opacity: 1;
  width: 200px;
  height:200px;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  }

  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }

  .item:hover img {
    opacity: 0.3;

  }

  .item:hover .middle {
    opacity: 1;
  }

  .category{
    border:none;
  }

  .category {
  text-decoration: none;
  /* border: 1px solid rgb(146, 148, 248); */
  position: relative;
  overflow: hidden;
  }

  .category:before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    #fff,
    transparent
  );
  transition: all 650ms;
  }

  .category:hover:before {
  left: 100%;
  }

  .icon-btn {
    width: 50px;
    height: 50px;
    border: 1px solid #cdcdcd;
    background: white;
    border-radius: 25px;
    overflow: hidden;
    position: relative;
    transition: width 0.2s ease-in-out;
  }
  .add-btn:hover {
    width: 120px;
  }
  .add-btn::before,
  .add-btn::after {
    transition: width 0.2s ease-in-out, border-radius 0.2s ease-in-out;
    content: "";
    position: absolute;
    height: 4px;
    width: 10px;
    top: calc(50% - 2px);
    background: red;
  }
  .add-btn::after {
    right: 14px;
    overflow: hidden;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
  }
  .add-btn::before {
    left: 14px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
  }
  .icon-btn:focus {
    outline: none;
  }
  .btn-txt {
    opacity: 0;
    transition: opacity 0.2s;
  }
  .add-btn:hover::before,
  .add-btn:hover::after {
    width: 4px;
    border-radius: 2px;
  }
  .add-btn:hover .btn-txt {
    opacity: 1;
  }
  .add-icon::after,
  .add-icon::before {
    transition: all 0.2s ease-in-out;
    content: "";
    position: absolute;
    height: 20px;
    width: 2px;
    top: calc(50% - 10px);
    background: red;
    overflow: hidden;
  }
  .add-icon::before {
    left: 22px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
  }
  .add-icon::after {
    right: 22px;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
  }
  .add-btn:hover .add-icon::before {
    left: 15px;
    height: 4px;
    top: calc(50% - 2px);
  }
  .add-btn:hover .add-icon::after {
    right: 15px;
    height: 4px;
    top: calc(50% - 2px);
  }
  .card-price {
    font-weight: bold;
    float: right;
  }
  .item img {
    width: 200px;
    height: 200px;
  }
  .category {
    color: #FF4655;
    font-weight: bold;
  }
  .name{
    line-heigth:0em;
  }
  @media screen and (max-width: 650px) {
    .item img {
      width: 150px;
      height: 150px;
    }
    .card-price {
      font-size: 12px;
      float: right;
      margin-right: 10px;
    }
    .name {
      font-size: 20px;
    }
  }
  @media screen and (max-width: 540px) {
    .item img {
      width: 150px;
      height: 150px;
    }
    .card-price {
      font-size: 12px;
      float: right;
      margin-right: 10px;
    }
    .name {
      font-size: 20px;
    }
  }
  @media screen and (max-width: 361px) {
    .item img {
      width: 150px;
      height: 150px;
    }
    .card-price {
      font-size: 12px;
      float: right;
      margin-right: 10px;
    }
    .name {
      font-size: 20px;
    }
  }
  </style>
</head>
<body>
  <?php echo $navbar; ?>
<div class="container-fluid">
  <!-- //navigasi category product -->
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center mt-3">
      <!-- <div> -->
        <a href="<?php echo base_url("index.php/customer/productspercategory?id=1")?>"><button class="category pr-5" style="background-color:black; color:white;"><img style='height:50px; width:auto;' src="<?php echo base_url("/assets/picture/Xboxlogo.jpg"); ?>">Xbox</button></a>
      <!-- </div> -->

      <a href="<?php echo base_url("index.php/customer/productspercategory?id=2")?>"><button  class="category pr-4" style="background-color:black; color: white;"><span><img style='height:50px; width:auto;' src="<?php echo base_url("/assets/picture/PSlogo.jpg"); ?>">PlayStation</span></button></a>

      <a href="<?php echo base_url("index.php/customer/productspercategory?id=3")?>"><button  class="category pr-4" style="background-color:black; color: white;"><span><img style='height:50px; width:auto;' src="<?php echo base_url("/assets/picture/Nintendologo.jpg"); ?>">Nintendo</span></button></a>
    </div>
    <div class="col-sm-3"></div>
  </div>
  </div>

  <div class="container mt-4 mb-4" >
    <!-- table data product sudah terfilter -->
    <?php echo $table;?>


	</div>
  <?php echo $footer; ?>
</body>
<script>
  $(document).ready(function() {
    	$('#example').DataTable();
    });
	</script>
</html>
