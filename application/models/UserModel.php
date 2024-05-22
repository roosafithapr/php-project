<?php

//Model Function that saves data to database
class UserModel extends CI_Model {

    function checkUserDetails($password){

        $this->db->select('*'); 
        $this->db->from('admin');
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
         return true;
        } else {
         return false;
        }
        
    } 
    
    function insertUserDetails($credentials){
        $email = $credentials['email'];
        $que=$this->db->get_where('user',['email'=> $email]);
		$row = $que->num_rows();
        //better to write these logic in usercontroller..return true or false like checkuserdetails function
		if($row){
		
            $data="<h3 style='color:red'>This user already exists</h3>";
            echo $data;
            $this->load->view('Header');
            $this->load->view('Login');
		}
        else{
            $this->db->insert('user',$credentials);
            $data="<h3 style='color:blue'>Your account created successfully,Now Login</h3>";
            echo $data;
            $this->load->view('Header');
            $this->load->view('Login');
        }

		/*else
		{
		$que=$this->db->query("insert into student values('','$n','$e','$p','$m','$c')");
		
		$data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
		}	*/		
    }
}
?>