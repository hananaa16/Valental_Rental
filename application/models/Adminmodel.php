<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model
{

    function logged_id()
    {
        return $this->session->userdata('username');
    }


    function check_login($email,$pass)
    {
        $sql = "SELECT * FROM admin WHERE email = ? AND password = ?";
        $query=$this->db->query($sql, array($email, $pass));

        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }

    }

    public function get_product()
    {
      $query = $this->db->query("SELECT * FROM product");
      return $query->result_array();
    }
    public function get_order()
    {
      $query = $this->db->query("SELECT * FROM orders");
      return $query->result_array();
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


    public function insert_product($name,$category,$qty,$price,$description,$imagelink){
        $values = array(
        'name' => $name,
        'category' => $category,
        'qty'=> $qty,
        'price' => $price,
        'description' => $description,
        'image' => $imagelink
        );
        $this->db->insert('product',$values);

    }

    public function edit_order($newstatus,$id_order)
    {
      $values = array(
        'status' => $newstatus
      );
        $this->db->update('orders', $values, array('id_order' => $id_order));

    }

    public function edit_product($id_product,$name,$category,$qty,$price,$description,$imagelink){
      $values = array(
			  'name' => $name,
        'category' => $category,
        'qty'=> $qty,
        'price' => $price,
        'description' => $description,
        'image' => $imagelink
			);
			$this->db->update('product', $values, array('id_product' => $id_product));
    }

    public function delete_product($id){
      $this->db->where('id_product', $id);
      $this->db->delete('product');
    }
    

    public function add_one_product($id_product,$qty){
      $values = array(
        'qty'=> $qty+1,
			);
			$this->db->update('product', $values, array('id_product' => $id_product));

    }

    public function delete_one_product($id_product,$qty){
      $values = array(
        'qty'=> $qty-1,
      );
      $this->db->update('product', $values, array('id_product' => $id_product));
    }
}
