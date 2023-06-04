<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        $this->load->model('customermodel');

    }


	public function index()
	{
    if($this->adminmodel->logged_id())
		{
      $data['js']=$this->load->view('include/js.php',NULL,TRUE);
      $data['css']=$this->load->view('include/css.php',NULL,TRUE);
      $data['product']=$this->adminmodel->get_product();
      $this->load->view("pages/admin",$data);
    }else{
      redirect('home');
    }
  }

  public function order(){
    $data['js']=$this->load->view('include/js.php',NULL,TRUE);
    $data['css']=$this->load->view('include/css.php',NULL,TRUE);
    $data['order']=$this->adminmodel->get_order();
    $this->load->view("pages/admin-order",$data);
  }

  public function do_upload(){
    $name = $this->input->post('name');
    $category = $this->input->post('category');
    $qty = $this->input->post('qty');
    $price = $this->input->post('price');
    $description = $this->input->post('description');

    $config['upload_path'] = './assets/product';
    $config['allowed_types'] = 'gif|jpg|png|jiff|jpeg';
    $config['file_name'] = $name;
    $config['overwrite'] = false;
    $config['max_filename_increment']=100;
    // $config['max_size']             = 100;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('image'))
    {
        $upload_data = $this->upload->data();
        $imagelink = 'assets/product/'.$upload_data['file_name'];
        $this->adminmodel->insert_product($name,$category,$qty,$price,$description,$imagelink);
        redirect('admin');
    }
  }
  // edit pakai form are u sure
  public function edit_order(){
    $status = $this->input->post('status');
    $id_order = $this->input->post('id_order');

    if ($status=="Sedang dikirim") {
      $newstatus="Sudah dikirim";
      $this->adminmodel->edit_order($newstatus,$id_order);
    }
    else if ($status=="Siap di pick-up") {
      $newstatus="Selesai";
      $this->adminmodel->edit_order($newstatus,$id_order);
      $dataTemp = $this->customermodel->findtemp($id_order);
      foreach ($dataTemp as $items) {
          $product_detail=$this->customermodel->find($items['id_product']);
          $this->adminmodel->add_one_product($items['id_product'],$product_detail->qty);
          $this->customermodel->deletetemp($id_order);
      }
    }
    redirect('admin/order');
  }

  public function edit_product(){
    $id_product = $this->input->post('id_product');
    $name = $this->input->post('name');
    $category = $this->input->post('category');
    $qty = $this->input->post('qty');
    $price = $this->input->post('price');
    $description = $this->input->post('description');

    $config['upload_path'] = './assets/product';
    $config['allowed_types'] = 'gif|jpg|png|jiff|jpeg';
    $config['file_name'] = $name;
    $config['overwrite'] = false;
    $config['max_filename_increment']=100;
    $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image')){
	        $imagelink=$this->input->post('old');
          $this->adminmodel->edit_product($id_product,$name,$category,$qty,$price,$description,$imagelink);
          redirect('admin');
	    }
		else{
					$upload_data = $this->upload->data();
          $imagelink = 'assets/product/'.$upload_data['file_name'];
          $this->adminmodel->edit_product($id_product,$name,$category,$qty,$price,$description,$imagelink);
          redirect('admin');
			}

  }

  // delete pakai form are u sure
  public function delete_product(){
    $id = $this->input->post('id_product');
    $this->adminmodel->delete_product($id);
    redirect('admin');

  }


}
?>
