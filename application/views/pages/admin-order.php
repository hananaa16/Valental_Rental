<!DOCTYPE html>
<html>
<head>
	<?php echo $js;
	echo $css;?>
	<style>
	.nav-item {
		padding-right: 20px;
	}
	.nav-link {
  text-decoration: none;
  /* border: 1px solid rgb(146, 148, 248); */
  position: relative;
  overflow: hidden;
}

.nav-link:before {
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

.nav-link:hover:before {
  left: 100%;
}
	</style>
	<script>

$(document).ready(function() {

		$('#example tbody').on('click','.btnEdit',function(e){
		let editModal=$('#formOrder');
		const id_order = $(this).data('id_order');
		const status = $(this).data('status');
		 $('#formOrder #id_order').val(id_order);
		 $('#formOrder #status').val(status);
		editModal.modal('show');
	})

	});

	</script>
</head>
<body>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="<?php echo base_url() ?>index.php/admin"><img src="<?php echo base_url();?>assets/picture/Logo.png"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url() ?>index.php/admin">Product List</a>
		      </li>
					<li class="nav-item active">
							<a class="nav-link" href="#">Orders <span class="sr-only">(current)</span></a>
		      </li>

		      <li class="nav-item">
							<a class="nav-link" href="<?php echo base_url() ?>index.php/home/logout">Sign Out</a>
		      </li>
		    </ul>
		  </div>
		</nav>

		<div class="modal fade" id="formOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Update Order</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php echo form_open_multipart(base_url(). 'index.php/admin/edit_order'); ?>
						<input type="hidden" name="id_order" id="id_order">
						<input type="hidden" name="status" id="status">
						<h4>Are you sure you want to change the order's status?</h4>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success"><i class="fa fa-check-square" aria-hidden="true"></i> Update</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button></div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>


<h3 class="p-4">Welcome, Admin</h3>
	<div class="container-fluid">
		<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
	  <thead>
	    <tr>
	            <th>No </th>
	            <th>Customer Name</th>
              <th>Price</th>
              <th>Status</th>
              <th>Duration</th>
              <th>Phone Number</th>
              <th>Address</th>
							<th>Update</th>
	        </tr>
	    </thead>
	    <tbody class="text-center">
	      <?php
				foreach ($order as $row){
	          $id_order = $row['id_order'];
	          $customer_name = $row['customer_name'];
	          $price = $row['price'];
            $status = $row['status'];
						$duration = $row['duration']." hari";
						$no_telp = "+62".$row['no_telp'];
						$address = $row['address'];
						$divstatus = "";


						if($status=="Sedang dikirim"){
								$divstatus = '<span class="badge badge-danger">'.$status.'</span>';
						}
						else if($status=="Sudah dikirim"){
								$divstatus = '<span class="badge badge-warning">'.$status.'</span>';
						}
						else if($status=="Siap di pick-up"){
								$divstatus = '<span class="badge badge-primary">'.$status.'</span>';
						}
						else if($status=="Selesai"){
								$divstatus = '<span class="badge badge-success">'.$status.'</span>';
						}

						// $edit= base_url().'index.php/admin/edit_order/'.$row['id_order'];
					?>
						<tr>
						<td><?php echo $id_order;?></td>
						<td><?php echo $customer_name;?></td>
						<td><?php echo "Rp " . number_format($price, 0, ",", "."); ?></td>
						<td><?php echo $divstatus;?></td>
						<td><?php echo $duration;?></td>
						<td><?php echo $no_telp;?></td>
						<td><?php echo $address;?></td>
						<td>
								<a href="#" class="btn btn-info btn-sm btnEdit" data-id_order="<?php echo $id_order;?>"  data-status="<?php echo $status;?>" ><i class="fa fa-check" aria-hidden="true"></i></a>
						</td>
						</tr>


	     <?php } ?>
	    </tbody>
			<tfooter>

			</tfooter>
	  </table>
	</div>

	</div>
</body>
<script>
	$(document).ready(function() {
	    	$('#example').DataTable();
	    });
	</script>
</html>
