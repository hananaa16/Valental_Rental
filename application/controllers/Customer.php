<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customermodel');
        $this->load->model('adminmodel');
        $this->load->library('form_validation');

    }


	public function index()
	{

      $data['js']=$this->load->view('include/js.php',NULL,TRUE);
      $data['css']=$this->load->view('include/css.php',NULL,TRUE);
      $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
      $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
      // $data['product']=$this->adminmodel->get_product();
      $this->load->view("pages/home",$data);
  }
  // $movies['data'] = $this->movies->ShowData();
  // $data['script']=$this->load->view('include/script.php',NULL,TRUE);
  // $data['style']=$this->load->view('include/style.php',NULL,TRUE);
  // $data['navbar'] = $this->load->view('template/navbar_movie.php',NULL,TRUE);
  // $data['footer'] = $this->load->view('template/footer_movie.php',NULL,TRUE);
  // $data['table'] = $this->load->view('template/table_movie', $movies, TRUE);
  // $this->load->view('page/movie',$data);

  // $id= $this->input->get('id');
  // $data['script']=$this->load->view('include/script.php',NULL,TRUE);
  // $data['style']=$this->load->view('include/style.php',NULL,TRUE);
  // $data['navbar'] = $this->load->view('template/navbar_movie.php',NULL,TRUE);
  // $data['footer'] = $this->load->view('template/footer_movie.php',NULL,TRUE);
  // $data['table']=$this->movies->ShowDetail($id);
  // $this->load->view('page/movie_details',$data);
  public function products(){
      $data['js']=$this->load->view('include/js.php',NULL,TRUE);
      $data['css']=$this->load->view('include/css.php',NULL,TRUE);
      $product['product']=$this->customermodel->get_product();
      $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
      $data['table']=$this->load->view('template/tableproduct.php',$product,TRUE);
      $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
      $this->load->view("pages/customerview",$data);
  }

  public function productspercategory(){
    $cat= $this->input->get('id');
    $data['js']=$this->load->view('include/js.php',NULL,TRUE);
    $data['css']=$this->load->view('include/css.php',NULL,TRUE);
    $product['product']=$this->customermodel->get_product_category($cat);
    $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
    $data['table']=$this->load->view('template/tableproduct.php',$product,TRUE);
    $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
    $this->load->view("pages/customerview",$data);
  }

  public function productsdetails(){
    $id= $this->input->get('id');
    $data['js']=$this->load->view('include/js.php',NULL,TRUE);
    $data['css']=$this->load->view('include/css.php',NULL,TRUE);
    $data['product']=$this->customermodel->get_product_details($id);
    $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
    // $data['table']=$this->load->view('template/tableproduct.php',$product,TRUE);
    $data['status']="";
    $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
    $this->load->view("pages/customerviewdetails",$data);
  }

  public function productsdetailsrestricted($id_product){
    // $id= $this->input->get('id');
    $data['js']=$this->load->view('include/js.php',NULL,TRUE);
    $data['css']=$this->load->view('include/css.php',NULL,TRUE);
    $data['product']=$this->customermodel->get_product_details($id_product);
    $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
    $data['status']="<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Item is already added!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
    $this->load->view("pages/customerviewdetails",$data);
  }


  public function customerorder(){
    if ($this->session->userdata('name'))
		{
      $id= $this->session->userdata('id_customer');
      $data['js']=$this->load->view('include/js.php',NULL,TRUE);
      $data['css']=$this->load->view('include/css.php',NULL,TRUE);
      $data['order']=$this->customermodel->get_order($id);
      $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
      $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
      $this->load->view("pages/customerorder",$data);
    }else{
      redirect('home');
    }
  }

  public function cart(){
    if ($this->session->userdata('name'))
		{
      $data['js']=$this->load->view('include/js.php',NULL,TRUE);
      $data['css']=$this->load->view('include/css.php',NULL,TRUE);
      $data['navbar']=$this->load->view('template/navbar.php',NULL,TRUE);
      $data['footer']=$this->load->view('template/footer.php',NULL,TRUE);
      $this->load->view("pages/customercart",$data);
    }else{
      redirect('login');
    }
  }


  public function insert_cart(){
    if ($this->session->userdata('name'))
		{
      $id_product= $this->input->get('id');
      $product = $this->customermodel->find($id_product);

      $flag = TRUE;
      $dataTemp = $this->cart->contents();

      foreach ($dataTemp as $items) {
        if ($items['id'] == $product->id_product) {
          $flag = FALSE;
          redirect('customer/productsdetailsrestricted/'.$id_product);
          break;
        }
      }

      if ($flag) {
        $data = array(
          'id'      => $product->id_product,
          'qty'     => 1,
          'price'   => $product->price,
          'name'    => $product->name
        );
          // $this->adminmodel->delete_one_product($product->id_product,$product->qty);

        $this->cart->insert($data);
        redirect('customer/products');
      }

    }else{
      redirect('login');
    }
  }

  public function clear_cart()
 {
     $this->cart->destroy();
     redirect('home');
 }

 public function update_total(){
   $duration= $this->input->post('duration');
   foreach ($this->cart->contents() as $items) {
     $data = array(
            'rowid' => $items['rowid'],
            'qty'   => $duration
    );
     $this->cart->update($data);

   }
    redirect('customer/cart');
 }

 public function delete_cart(){
        $id_order=$this->input->get('id');

        $data = array(
            'rowid' => $id_order,
            'qty' => 0
        );

        // $order_detail=$this->cart->get_item($id_order);
        // $product_detail=$this->customermodel->find($order_detail['id']);
        // $this->adminmodel->add_one_product($order_detail['id'],$product_detail->qty);

        $this->cart->update($data);
        redirect('customer/cart');
    }

    public function checkout(){

      $duration=$this->input->get('duration');
      $id_customer=$this->session->userdata('id_customer');
      $name = $this->session->name;
      $datacustomer = $this->customermodel->get_customer($id_customer);

        $total = $this->cart->total();
        $status = 'Sedang dikirim';
        $no_telp = $datacustomer->no_telp;
        $address = $datacustomer->address;
        $id_order=$this->customermodel->insert_order($id_customer,$name,$total,$duration,$status,$no_telp,$address);

        // $dataTemp=$this->cart->contents();
        // $this->customermodel->checkouttemp($id_order,$dataTemp);
        foreach ($this->cart->contents() as $items) {
            $this->customermodel->checkouttemp($id_order,$items['id']);
        }

        foreach ($this->cart->contents() as $items) {
            $product_detail=$this->customermodel->find($items['id']);
            $this->adminmodel->delete_one_product($items['id'],$product_detail->qty);
        }
        redirect('customer/clear_cart');
    }

    public function edit_order(){
      $status = $this->input->post('status');
      $id_order = $this->input->post('id_order');

      if ($status=="Sudah dikirim") {
        $newstatus="Siap di pick-up";
        $this->customermodel->edit_order($newstatus,$id_order);
      }
      redirect('customer/customerorder');

    }




}

?>
