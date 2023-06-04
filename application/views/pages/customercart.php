<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<?php echo $js;
	echo $css;?>
	<style>
	*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}

	body{
		background-color: #ECE8E1;
	}

	.table-wrapper{
	    margin: 10px 10px 70px;
	    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
	}

	.fl-table {
	    border-radius: 5px;
	    font-size: 12px;
	    font-weight: normal;
	    border: none;
	    border-collapse: collapse;
	    width: 100%;
	    max-width: 100%;
	    white-space: nowrap;
	    background-color: white;
	}

	.fl-table td, .fl-table th {
	    text-align: center;
	    padding: 8px;
	}

	.fl-table td {
	    border-right: 1px solid #f8f8f8;
	    font-size: 12px;
	}

	.fl-table thead th {
	    color: #ffffff;
	    background: #FF4655;
	}

	.fl-table thead th:nth-child(odd) {
	    color: #ffffff;
	    background: #343A40;
	}

	.fl-table tr:nth-child(even) {
	    background: #f8f8f8;
	}
	.border {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: -8px;
	}
	.frame{
	  display: flex;
	  flex-direction: row;
	  justify-content: space-around;
	  align-items: center;
	  height: 80px;
	  width: 450px;
	  position: relative;
	   box-shadow:
	   -7px -7px 20px 0px #fff9,
	   -4px -4px 5px 0px #fff9,
	   7px 7px 20px 0px #0002,
	   4px 4px 5px 0px #0001,
	   inset 0px 0px 0px 0px #fff9,
	   inset 0px 0px 0px 0px #0001,
	   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
	 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
	   border-radius: 10px;
	}

	.btn-6{
		padding-top: 5px;
		padding-bottom: 5px;
		border: none;
	  border-radius: 3px;
	  background:#ECE8E1;
	  display: flex;
	  flex-direction: column;
	  justify-content: center;
	  align-items: center;
	  -webkit-tap-highlight-color: rgba(0,0,0,0);
	  -webkit-tap-highlight-color: transparent;
	  box-shadow:
	   -7px -7px 20px 0px #fff9,
	   -4px -4px 5px 0px #fff9,
	   7px 7px 20px 0px #0002,
	   4px 4px 5px 0px #0001,
	   inset 0px 0px 0px 0px #fff9,
	   inset 0px 0px 0px 0px #0001,
	   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
	 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
	  font-size: 16px;
	  color: rgba(42, 52, 84, 1);
	  text-decoration: none;
	}
	.btn-6:active{
	  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
	              -4px -4px 6px 0 rgba(116, 125, 136, .2),
	    inset -4px -4px 6px 0 rgba(255,255,255,.5),
	    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
	}
	@media screen and (max-width: 540px) {
		h3 {
			font-size: 24px;
		}
	}
	@media screen and (max-width: 361px) {
		.frame {
			width: 320px;
		}
		.btn-6 {
			font-size: 12px;
			width: 80px;
			height: 50px;
		}
	}
	</style>
</head>
<body>
		<?php echo $navbar;?>


<?php $duration=0;?>
		<h3 class="p-3" style="-webkit-font-smoothing: antialiased; text-align: center; color: #4f4f4f; font-family: helvetica; font-weight: bold; padding-top: 10px; text-shadow: #f8f8f8 2px 0px 4px">Here is your cart, <?php echo $this->session->userdata('name');
		?> <i class="fa fa-shopping-cart" aria-hidden="true"></i></h3>
		<div class="container-fluid">
		<div class="table-wrapper" style="overflow-x:auto;">
			<table class="fl-table"  style="width:100%; border=0; border-radius: 10px;" >
				<thead>
					<tr class="d-flex">
	        	<th class="col-3">Name</th>
						<th class= "col-3">Qty</th>
		        <th class= "col-3">Item Price</th>
						<th class= "col-3">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php if ($this->cart->contents() == null){ ?>
					<tr class="d-flex"> <td>No items</td></tr>
				<?php } else { ;?>

			<?php
				foreach ($this->cart->contents() as $items): ?>
        <tr class="d-flex">
	        <td class="col-3"><?php echo $items['name']; ?></td>
					<td class="col-3">1</td>
					<td class="col-3"><?php echo "Rp " . number_format($items['price'], 0, ",", ".");?></td>
					<td class="col-3"><a href="<?php echo base_url().'index.php/customer/delete_cart?id='.$items['rowid']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
        </tr>

				<?php $i++; ?>
			<?php  endforeach; ?>

					<tr class="d-flex">
		       <td class="col-8 text-right"><strong>Rental Period</strong></td>
						<td class="col-4">
							<?php echo form_open(base_url(). 'index.php/customer/update_total'); ?>
							<input type="number" style="width:4em" name="duration" value="<?php echo $items['qty']?>">

							<input type="submit" value="Total">
							<?php echo form_close(); ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>

			</table>
		</div>

		<div class ="table-wrapper">
		<table class="fl-table" style="border-radius: 10px;">
			<tbody>
			<?php if ($this->cart->contents() == null){ ?>
				<tr class="d-flex"> <td>No items</td></tr>
			<?php } else { ;?>
			<tr>
        <th>Subtotal</th>
				<?php
					$sub = 0;
					foreach ($this->cart->contents() as $items):
						$sub = $sub + $items['price'];
					endforeach;
				?>
				<td class="right">Rp. <?php echo $this->cart->format_number($sub); ?></td>
			</tr>
			<tr>
				<th><i class="fa fa-clock-o" aria-hidden="true"></i> Duration</th>
				<td><?php echo $items['qty']?> hari</td>
					<?php $duration= $items['qty'];?>
			</tr>
			<tr>
				<th>Total</th>
				<td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
			</tr>
		<?php };?>
		</tbody>
		</table>
	</div>

	<div class="border pb-5">
		<div class="frame">
			<button type="button" class="btn-6"><a href="<?php echo base_url().'index.php/customer/products'?>" style="text-decoration: none; color: black;"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Continue Shopping</a></button>
			<button type="button" class="btn-6"><a href="<?php echo base_url().'index.php/customer/clear_cart'?>" style="text-decoration: none; color: black;"><i class="fa fa-trash-o" aria-hidden="true"></i> Clear Cart</a></button>
			<button type="button" class="btn-6 btnDelete"><a href="<?php echo base_url().'index.php/customer/checkout?duration='.$duration;?>" style="text-decoration: none; color: black;"><i class="fa fa-credit-card" aria-hidden="true"></i> Checkout</a></button>
		</div>
	</div>
	</div>
<?php echo $footer; ?>

</body>

</html>
