<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('adminmodel');
        $this->load->model('customermodel');
    }

	public function index()
	{
    $this->load->helper(array('form', 'url'));
			if($this->adminmodel->logged_id())
			{
				redirect("home");
			}
      if($this->customermodel->logged_id())
			{
				redirect("home");
			}

      else{
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('captcha_str', 'Captcha', 'matches[password]');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_validate_captcha');

        $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
            <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');


				if ($this->form_validation->run() == TRUE) {
	            $email = $this->input->post("email", TRUE);
              $password = MD5($this->input->post('password', TRUE));
              $checking = $this->adminmodel->check_login(array('email' => $email), array('password' => $password));
              $checking2 = $this->customermodel->check_login(array('email' => $email), array('password' => $password));

	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {
	                    $session_data = array(
	                        'username' => $apps->email
	                    );
	                    $this->session->set_userdata($session_data);
	                    redirect('admin/');

	                }
              }else if ($checking2 != FALSE) {
                foreach ($checking2 as $apps) {
                    $session_data = array(
                        'name' => $apps->first_name." ".$apps->last_name,
                        'id_customer' => $apps->id_customer
                    );
                    $this->session->set_userdata($session_data);
                    redirect('customer/');
                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i>Data yang anda masukkan salah !</div></div>';
                $data['css'] = $this->load->view('include/css.php',NULL,TRUE);

                $path='./assets/captcha/';
                if(!file_exists($path)){
                  $buat= mkdir($path,0777);
                  if(!$buat){
                    return;
                  }

                }
                $kata = array_merge(range('0','9'),range('A','Z'));
                $acak = shuffle($kata);
                $str= substr(implode($kata),0,5);

                $data_ses= array('captcha_str'=>$str);
                $this->session->set_userdata($data_ses);
                $vals = array(
                  'word'=> $str,
                  'img_path'	 => $path,
                  'img_url'	 => base_url().'assets/captcha/',
                 'img_width'	 => '150',
                 'img_height' => 40,
                 'border' => 0,
                 'expiration' => 7200

                );
                $cap = create_captcha($vals);
                $data['captcha_image'] = $cap['image'];

	            	$this->load->view('pages/login', $data);
	            }

	        }else{
              $data['css'] = $this->load->view('include/css.php',NULL,TRUE);
              $path='./assets/captcha/';
              if(!file_exists($path)){
                $buat= mkdir($path,0777);
                if(!$buat){
                  return;
                }

              }
              $kata = array_merge(range('0','9'),range('A','Z'));
              $acak = shuffle($kata);
              $str= substr(implode($kata),0,5);

              $data_ses= array('captcha_str'=>$str);
              $this->session->set_userdata($data_ses);
              $vals = array(
                'word'=> $str,
                'img_path'	 => $path,
                'img_url'	 => base_url().'assets/captcha/',
               'img_width'	 => '150',
               'img_height' => 40,
               'border' => 0,
               'expiration' => 7200

              );
              $cap = create_captcha($vals);
              $data['captcha_image'] = $cap['image'];

	            $this->load->view('pages/login',$data);
	        }

		}

	}

  public function validate_captcha(){
      if($this->input->post('captcha') != $this->session->userdata['captcha_str'])
      {
          $this->form_validation->set_message('validate_captcha', '<div class="alert alert-danger" style="margin-top: 3px">
              <div class="header"><b><i class="fa fa-exclamation-circle"></i> Captcha salah</div>');
          return false;
      }else{
          return true;
      }
    }


            // $this->session->unset_userdata('captcha');
            // $this->session->unset_userdata('image');
            // redirect('home', 'refresh');

  // public function kirim(){
  //   $po_captcha = $this->input->post('captcha');
  //
  //   if($po_captcha != $this->session->userdata('captcha_str')){
  //     $this->session->set_flashdata('notif', '<div class="alert alert-danger" style="margin-top: 3px">
  //         <div class="header"><b><i class="fa fa-exclamation-circle"></i> Captcha salah </div></div>');
  //         redirect('login');
  //   }
  //
  // }
}
