<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Controller function that handles form post
class ProductController extends CI_Controller {

    public function get_products(){
        
        if( $this->input->is_ajax_request()){  
            $this->load->model("ProductModel");
            if(!$this->ProductModel->get_productDetails()){
                $data['result'] = "no-result";
                echo json_encode($data);
            }
            else{
                $data['result'] = $this->ProductModel->get_productDetails();
            
                echo json_encode($data);
            }
        }
        else{
            //$this->load->view('Home');
        } 
        /*
        $this->load->model('ProductModel','product_details');
        $query = $this->product_details->all();
        $total_rows = $this->product_details->count();
        $data["result"] =  $this->product_details->all();
        echo json_encode($data);
        */
    }
    
    public function search_products(){

        if( $this->input->is_ajax_request()){  

            $postData = $this->input->post();
            $product_cat = $postData['search_item'];
            $this->load->model("ProductModel");
            if(!$this->ProductModel->get_searchDetails($product_cat )){
                $data['result'] = "no-result";
                echo json_encode($data);
            }
            else{
                $data['result'] = $this->ProductModel->get_searchDetails($product_cat );
            
                echo json_encode($data);
            }
        }

    }
    public function save_products(){
        
        $postData = $this->input->post();
        $product_number = $postData['product_number'];
        $product_name = $postData['product_name'];
        $product_desc = $postData['product_desc'];
        $product_cat = $postData['product_cat'];
        $product_status = $postData['product_status'];
        $created_at = date("Y-m-d") ;

        $productDetails = array(
            'product_number'=>$product_number, 
            'product_name'=>$product_name,
            'product_desc'=>$product_desc,
            'product_cat'=>$product_cat,
            'product_status'=>$product_status,
            'created_at'=>$created_at

        );
        
        if($this->input->post() && $this->input->is_ajax_request()){ 
            $this->load->model("ProductModel");
            if($this->ProductModel->insert_ProductDetails($productDetails)){
                $data['message'] = "inserted";
                echo json_encode($data);
            }
            else{
                $data['message'] = "not-inserted";
                echo json_encode($data);
            }
        }

    }

    public function delete_products(){
        
        //$postData = $this->input->post();
        //$product_number = $postData['product_number'];
        //console.log($product_number);
        if($this->input->is_ajax_request() && $this->input->post()){
            $this->load->model('ProductModel');
            $postData = $this->input->post();
            $product_number = $postData['product_number'];
            $this->ProductModel->deleteProductDetails($product_number);
            /*
            if(!$this->ProductModel->deleteProductDetails($product_number)){
                //$message = ['status' => 'deleted successfully'];
                //return $this->response->setJSON($message);
                $data['result'] = "no-delete";
                echo json_encode ($data);
            }
            else{
                //$data['result'] = "deleted";
                $data['result'] = $this->ProductModel->deleteproductDetails($product_number);
                echo json_encode($data);
            }
            */
        }
    }

    public function edit_products(){
        /*
        $postData = $this->input->post();
        $product_number = $postData['product_number'];
        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->editProductDetails($product_number);
        return $this->response->setJSON($data);
        */
        if($this->input->post() && $this->input->is_ajax_request()){
            $this->load->model("ProductModel");
            $postData = $this->input->post();
            $product_number = $postData['product_number'];
            if(!$this->ProductModel->editproductDetails($product_number)){
                $data['result'] = "no-result";
                echo json_encode($data);
            }
            else{
                $data['result'] = $this->ProductModel->editproductDetails($product_number);
                echo json_encode($data);
            }
        }
        
        

    }
    public function view_products(){
        /*
        $postData = $this->input->post();
        $product_number = $postData['product_number'];
        $this->load->model('ProductModel');
        $data['products'] = $this->ProductModel->editProductDetails($product_number);
        return $this->response->setJSON($data);
        */
        if($this->input->post() && $this->input->is_ajax_request()){
            $this->load->model("ProductModel");
            $postData = $this->input->post();
            $product_name = $postData['product_name'];
            if(!$this->ProductModel->viewproductDetails($product_name)){
                $data['result'] = "no-result";
                echo json_encode($data);
            }
            else{
                $data['result'] = $this->ProductModel->viewproductDetails($product_name);
                echo json_encode($data);
            }
        }
        
        

    }

    public function update_products(){

        if($this->input->post() && $this->input->is_ajax_request()){
            //$postData = $this->input->post();
            //$product_number = $postData['product_number'];
            $postData = $this->input->post();
            //echo("hai");
            $product_number= $postData['product_number'];
            $product_name= $postData['product_name'];
            $product_desc= $postData['product_desc'];
            $product_cat= $postData['product_cat'];
            $product_status= $postData['product_status'];
            /*
            $data = [
                'product_number' => $postData['product_number'],
                'product_name' => $postData['product_name'],
                'product_desc' => $postData['product_desc'],
                'product_cat' => $postData['product_cat'],
                'product_status' => $postData['product_status'],
            ];*/
            $productDetails = array(
                'product_number'=>$product_number, 
                'product_name'=>$product_name,
                'product_desc'=>$product_desc,
                'product_cat'=>$product_cat,
                'product_status'=>$product_status,
    
            );
            $this->load->model('ProductModel');
            if(!$this->ProductModel->updateProductDetails($productDetails,$product_number)){
                $data['result'] = "no-update";
                echo json_encode($data);

            }
            else{
                $data['result'] = $this->ProductModel->updateProductDetails($productDetails,$product_number);
                echo json_encode($data);
            }
        }

    }

    public function change_status(){

        if($this->input->post() && $this->input->is_ajax_request()){
            $postData = $this->input->post();
            $product_number= $postData['product_number'];
            $product_status= $postData['product_status'];
            $productDetails = array(
                'product_number'=>$product_number, 
                'product_status'=>$product_status,
    
            );
            $this->load->model('ProductModel');
            if(!$this->ProductModel->update_status($productDetails,$product_number)){
                $data['result'] = "no-update";
                echo json_encode($data);

            }
            else{
                $data['result'] = $this->ProductModel->update_status($productDetails,$product_number);
                echo json_encode($data);
            }
        }

    }


}

?>