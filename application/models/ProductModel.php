<?php

//Model Function that saves data to database
class ProductModel extends CI_Model {
    /*
    private $table = "product_details";
    public function all($limit=10){
        $offset = $this->uri->segment(3);
        return $this->db->limit($limit,$offset)->get("product_details");

    }
    public function count(){
        return $this->db->count_all_results($this->table);
    }
    */
    public function get_productDetails(){

        $query = $this->db->query("SELECT * FROM product_details");
        if(!empty($query->result())) {
          return $query->result();
        }else{
          return false;
        }
    }
    
    public function insert_ProductDetails($productDetails){

        //Check if insert was successful and return true
        if($this->db->insert('product_details',$productDetails)){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function deleteProductDetails($product_number){
        /*
        if($this->db->delete('product_details',['product_number'=> $product_number])){
            return true;
        }
        else{
            return false;
        }
        */
        /*
        $query =  $this->db->delete('product_details',['product_number'=> $product_number]);
        if(!empty($query->result())) {
            return $query->result();
        }else{
             return false;
        }
        */
        $this->db->delete('product_details',['product_number'=> $product_number]);
    }

    public function editProductDetails($product_number){
        //$query = $this->db->get_where('product_details',['product_number'=> $product_number]);//to print value(placeholder) in edit form 
        //return $query->row(); 
        $query =  $this->db->get_where('product_details',['product_number'=> $product_number]);
        if(!empty($query->result())) {
            return $query->result();
        }else{
             return false;
        }
    }
    
    public function viewProductDetails($product_name){
        //$query = $this->db->get_where('product_details',['product_number'=> $product_number]);//to print value(placeholder) in edit form 
        //return $query->row(); 
        $query =  $this->db->get_where('product_details',['product_name'=> $product_name]);
        if(!empty($query->result())) {
            return $query->result();
        }else{
             return false;
        }
    }

    public function updateProductDetails($productDetails,$product_number){

        return $this->db->update('product_details',$productDetails,['product_number'=> $product_number]);
    }
    public function update_status($productDetails,$product_number){

        return $this->db->update('product_details',$productDetails,['product_number'=> $product_number]);
    }
    
    public function get_searchDetails($product_cat){
        $query =  $this->db->get_where('product_details',['product_cat'=> $product_cat]);
        if(!empty($query->result())) {
            return $query->result();
        }else{
             return false;
        }
    }
}    
?>