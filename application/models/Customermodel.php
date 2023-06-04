<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customermodel extends CI_Model
{

    function logged_id()
    {
        return $this->session->userdata('username');
    }


    function check_login($email,$pass)
    {
        $sql = "SELECT * FROM customer WHERE email = ? AND password = ?";
        $query=$this->db->query($sql, array($email, $pass));
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }

    }

    public function get_product()
    {
      $query = $this->db->query('SELECT * FROM product');
      return $query->result_array();
    }

    public function get_product_category($cat)
    {
      if($cat==1){
        $query = $this->db->query('SELECT * FROM product WHERE category = "XBox"');
      }
      else if($cat==2){
        $query = $this->db->query('SELECT * FROM product WHERE category = "PlayStation"');
      }
      else if($cat==3){
        $query = $this->db->query('SELECT * FROM product WHERE category = "Nintendo"');
      }
      else{$query = $this->db->query('SELECT * FROM product');}
      return $query->result_array();

    }
    public function get_product_details($id)
    {
      $query = $this->db->query('SELECT * FROM product WHERE id_product='."$id");
      return $query->result_array();
    }


    public function get_order($id)
    {
      $query = $this->db->get_where('orders', array('id_customer' => $id));
      return $query->result_array();
    }

    public function edit_order($newstatus,$id_order)
    {
      $values = array(
        'status' => $newstatus
      );
        $this->db->update('orders', $values, array('id_order' => $id_order));

    }

    public function insert_customer($email,$fname,$lname,$address,$phonenumber,$password){
      $values = array(
      'first_name' => $fname,
      'last_name' => $lname,
      'address'=> $address,
      'no_telp' => $phonenumber,
      'email' => $email,
      'password' => $password
      );
      $this->db->insert('customer',$values);
    }

    public function get_customer($id){
        $hasil = $this->db->where('id_customer', $id)
                          ->limit(1)
                          ->get('customer');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function insert_order($id_customer,$name,$total,$duration,$status,$no_telp,$address){
      $values = array(
          'id_customer' => $id_customer,
          'customer_name' => $name,
          'price' => $total,
          'status' => $status,
          'duration' => $duration,
          'no_telp' => $no_telp,
          'address' => $address
        );
      $this->db->insert('orders',$values);
      $insert_id = $this->db->insert_id();
      return $insert_id;
    }



    // public function detail_product($id){
    //   $this->db->trans_begin();
		// 	$query = $this->db->get_where('product', array('id_product' => $id));
		// 	$this->db->trans_complete();
    //
		// 	if($this->db->trans_status() === FALSE)
		// 	{
		// 		$this->db->trans_rollback();
		// 		return FALSE;
		// 	}else
		// 	{
		// 		return $query->result_array();
		// 	}
    // }

    public function find($id){
        $hasil = $this->db->where('id_product', $id)
                          ->limit(1)
                          ->get('product');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function checkouttemp($id_order,$id_product){
      $values = array(
          'id_order' => $id_order,
          'id_product' => $id_product
        );
      $this->db->insert('temp',$values);
    }

    public function findtemp($id){
        $hasil = $this->db->where('id_order', $id)
                          ->get('temp');
        if($hasil->num_rows() > 0){
            return $hasil->result_array();
        } else {
            return array();
        }
    }


    public function deletetemp($id){
      $this->db->where('id_order', $id);
      $this->db->delete('temp');
    }


}
?>
