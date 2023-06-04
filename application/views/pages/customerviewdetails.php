<!DOCTYPE html>
<html>
<head>
  <?php echo $js;
	echo $css;?>
  <title>Product Details</title>
  <style>
  .social {
  /* position: fixed; */
    top: 20px;
  }
  .social ul {
    padding: 0px;
    -webkit-transform: translate(-270px, 0);
    -moz-transform: translate(-270px, 0);
    -ms-transform: translate(-270px, 0);
    -o-transform: translate(-270px, 0);
    transform: translate(-270px, 0);
  }
  .social ul li {
    display: block;
    margin: 5px;
    background: #FF4655;
    width: 300px;
    text-align: right;
    padding: 10px;
    -webkit-border-radius: 0 30px 30px 0;
    -moz-border-radius: 0 30px 30px 0;
    border-radius: 0 30px 30px 0;
    -webkit-transition: all 1s;
    -moz-transition: all 1s;
    -ms-transition: all 1s;
    -o-transition: all 1s;
    transition: all 1s;
  }
  .social ul li:hover {
    -webkit-transform: translate(130px, 0);
    -moz-transform: translate(130px, 0);
    -ms-transform: translate(130px, 0);
    -o-transform: translate(130px, 0);
    transform: translate(130px, 0);
    background: #FBB80E;

  }
  .social ul li:hover a {
    color: #000;
  }
  .social ul li:hover i {
    color: white;
    background: #FF4655;
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
    -webkit-transition: all 1s;
    -moz-transition: all 1s;
    -ms-transition: all 1s;
    -o-transition: all 1s;
    transition: all 1s;
  }
  .social ul li i {
    margin-left: 10px;
    color: #000;
    background: #fff;
    padding-right: 7px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 20px;
    background: #ffffff;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  @media screen and (max-width: 650px) {

  }

  @media screen and (max-width: 540px) {
  }

  @media screen and (max-width: 361px) {
  }
  </style>
</head>
<body>
  <?php echo $navbar;
  echo $status;
  ?>
  <div class="social">
    <ul>
      <li><a href="<?php echo base_url("index.php/customer/products"); ?>" style="text-decoration:none;color:white;">Back to product<i class="fa fa-angle-left"></i></a></li>
    </ul>
  </div>
  <div class="container mt-4 mb-4" >
        <?php
        $i=1;
        foreach ($product as $row){
            $id_product = $row['id_product'];
            $name = $row['name'];
            $qty = $row['qty'];
            $category = $row['category'];
            $image = $row['image'];
            $price = number_format($row['price'],0,".",".");
            $description = $row['description'];
            ?>

            <div class="row">
              <div class="col-lg-4">
                <img src="<?php echo base_url().$image;?>" style="width:300px;height:300px;">
              </div>
              <div class="col-lg-8">
                <h5 style:"color: #FF4655;"><?php echo $category; ?></h5>
                <h3><?php echo $name; ?></h3>
                <p><?php echo $description; ?></p>
                <p style="font-size: 20px;">Stock: <?php echo $qty; ?></p>
                <div class="row">
                  <div class="col-sm-6">
                    <h4 style="color: #6ab070; font-weight:bold;"><?php echo "Rp. ".$price; ?></h4>
                  </div>
                  <div class="col-sm-6">
                    <?php if ($qty>0){ ;?>
          						<a href="<?php echo base_url().'index.php/customer/insert_cart?id='.$id_product; ?>" class="btn btn-cart" role="button" aria-pressed="true">
          			      <span class="btn__inner">
          			        <span class="btn__slide"></span>
          			        <span class="btn__content"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart</span>
          			      </span>
          						</a>
                    <?php }else{ ;?>
                      <a href="" class="btn btn-cart" role="button disabled" aria-pressed="true">
          			      <span class="btn__inner">
          			        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                      </span>
          						</a>
                    <?php };?>

                  </div>
                </div>
              </div>
            </div>

       <?php } ?>
	</div>
  <br>
  <?php echo $footer; ?>
</body>
<script>
  $(document).ready(function() {
    	$('#example').DataTable();
    });
	</script>
</html>
