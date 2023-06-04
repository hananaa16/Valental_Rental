<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('customermodel');

    }

	public function index()
	{
    // Terdapat textbox email dan password (2.5)
    // Terdapat nama, alamat dan no telepon (2.5)
    // Terdapat validasi dan memunculkan peringatan apabila validasi gagal. (10)
    // Email : required dan valid email
    // Password: required dan minimal 8 karakter
    // Nama: required
    // Alamat: required
    // No Telepon: required dan numeric

    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('phonenumber', 'Phone Number', 'required|numeric');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');

      $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');
      $this->form_validation->set_message('min_length', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus sama atau lebih dari 8 karakter </div></div>');
      $this->form_validation->set_message('matches', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> belum sesuai </div></div>');
      $this->form_validation->set_message('numeric', '<div class="alert alert-danger" style="margin-top: 3px"><div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus numerik </div></div>');

      if ($this->form_validation->run() == TRUE) {
        $email = $this->input->post('email');
        $fname = $this->input->post('firstname');
        $lname = $this->input->post('lastname');
        $address = $this->input->post('address');
        $phonenumber = $this->input->post('phonenumber');
        $password = MD5($this->input->post('password'));
        $this->customermodel->insert_customer($email,$fname,$lname,$address,$phonenumber,$password);
        redirect('home');

      }
        else{
          $data['css'] = $this->load->view('include/css.php',NULL,TRUE);
          $this->load->view('pages/signup', $data);
        }


	}
}
?>
