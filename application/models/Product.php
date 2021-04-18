<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model{
   public function __construct()
   {
      $this->load->database();
   }

   //get and return product rows
   public function getRows($id = ''){
      $this->db->select('id,name,image,price');
      $this->db->from('products');
      if($id){
         $this->db->where('id',$id);
         $query = $this->db->get();
         $result = $query->row_array();
      }else{
         $this->db->order_by('name','asc');
         $result = $this->db->get()->result_array();
      }
      return !empty($result)?$result:false;
   }
   
   //insert transaction data
   public function storeTransaction($data = array()){
      $insert = $this->db->insert('payments',$data);
      return $insert?true:false;
   }
}