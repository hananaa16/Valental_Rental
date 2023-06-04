
    <div class="row">
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
        <div class="col-md-4 p-3">
          <div class="card" data-aos="fade-up">
            <!-- <div class="row"> -->
            <table>
              <tr>
              <td class="pt-2">
                <p class="category pt-3 pl-3"><?php echo $category; ?></p>
                <h5 class="name pl-3"><?php echo $name; ?></h5>
              </td>
              <td class="pt-2">
                <p class="card-price"><?php echo "Rp. ".$price." / hari"; ?></p>
              </td>
            </tr>
            </table>
            <div class="row">
              <div class="item col-sm-12 text-center">
                  <img src="<?php echo base_url().$image; ?>" class="mt-4">
                  <div class="middle">
                    <a href="<?php echo base_url().'index.php/customer/productsdetails?id='.$id_product; ?>">
                      <button class="icon-btn add-btn">
                        <div class="add-icon"></div>
                      <div class="btn-txt">Details</div>
                      </button>
                    </a>
                  </div>
            </div>

            </div>
          </div>
        </div>
   <?php } ?>
 </div>
 <script>
  AOS.init();
</script>
