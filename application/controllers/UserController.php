<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	
	public function index()
	{
        $this->load->view('header');
        //$this->load->helper('url');
		$this->load->view('Login');
	}
    
    public function signupUserAction(){
        $this->load->view('header');
        $this->load->view('Signup');
    }
    public function signinUserAction(){
        if($this->input->post()){

            //Save form data to variables
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //Save variables to an array
            $credentials = array(
                'email'=>$email,
                'password'=>$password
            );
            //print json_encode($credentials);
            //var_dump($credentials);
            //echo $credentials['fullname'];
            $this->form_validation->set_rules('email', 'email', 'required|max_length[100]|trim');
            $this->form_validation->set_rules('password', 'password', 'required|max_length[20]|min_length[8]|trim');
            //Load the model
            if ($this->form_validation->run() == FALSE){
                $data['message'] = "Sorry,Invalid email or password,Password should only have maximum 20 characters";
                $this->load->view('header');
                $this->load->view('Signup',$data);
            }else{
            $this->load->model('UserModel');
            $this->UserModel->insertUserDetails($credentials);
            }

        }
    }
    public function loginUserAction(){

        //Check if the form submit is POST request
        if($this->input->post()){
    
            //Save form data to variables?
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //Save variables to an array
            $credentials = array(
                'email'=>$email,
                'password'=>$password
            );
            $this->form_validation->set_rules('email', 'email', 'required|max_length[100]|trim');
            $this->form_validation->set_rules('password', 'password', 'required|max_length[20]|trim');
            if ($this->form_validation->run() == FALSE){
                $data['message'] = "Sorry,Incorrect email or password";
                $this->load->view('header');
                $this->load->view('Login',$data);
            }
            else{
                //Load the model
                $this->load->model('UserModel');
                //Call the model by passing array.
                if(!$this->UserModel->checkUserDetails($password)){
                    $data['message'] = "Sorry,Incorrect email or password,Try Again";
                    $this->load->view('header');
                    $this->load->view('Login',$data);
                } 
                else {
                    //echo "Thank you for signing up.";
                    //Pass success message to view to show to the user
                    $this->session->set_userdata('email',$email);
                    //$data['fullname']  = $this->session->userdata('fullname');
                    $this->session->set_flashdata('item','Thankyou for sign in');
                    redirect(base_url('admin/manage-products'));
                } 
            }
        } 
        else {
            //If it is not POST request, show the signup view to the user so that he can enter details and POST.
            $this->load->view('header');
            $this->load->view('Login');
        }
    }
    public function manageProducts(){
        if(isset($_SESSION["email"])){
            $this->load->view('header');
            $this->load->view('Home');
        }
        else{
            $data['message'] = "Access Denied,Please Login";
            $this->load->view('header');
            $this->load->view('Login',$data);//redirect
        }
    }
    public function logoutUserAction(){
        $this->session->sess_destroy();
        $this->load->view('header');
        $this->load->view('Login');//redirect
        
        
        
    }
}
