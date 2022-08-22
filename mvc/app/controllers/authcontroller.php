<?php
/**
 * Authcontroller contains add,list,display
 */
Class Authcontroller extends Controller
{
//     public $modelcontroller;

//    public function __construct()
//    {
//      $this->modelcontroller=$this->model('Addressmodel');
  //  }
    /**this is a main controller which renders default page of the website*/
    public function main()
    {
        $this->model('Authmodel');
        $this->view("Register");  
    }
    /**This login method renders the realtion between the Authmodel and login*/
    public function login()
    {
        $this->model('Authmodel');
        $this->view("login"); 
    }
    /**Here in this method we are initializing the values for register page*/
	public function register()
    {
        if(isset($_POST['registerbutton']))
        {
        $reg = new Authmodel();
        $email    = $_POST['email'];
        $password = $_POST['password'];
        
        $insert=$reg->register($email,$password);
        if($email==""){
            echo $error_email=  "<span class = 'error'>Please enter your email</span>"; 
        }
        else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
            echo $error_email= "<span class='error'>Please enter a valid email</span>";
        }
        else if($password==""){
            echo $error_password=  "<span class = 'error'>Password cannot be empty</span>"; 
        }
        else if($insert)
        {
            redirect("Please login!",'home/login');
        }
        else{
            redirect("Invalid details",'');
        }
      }
     }
      /**Here in this method we are initializing the values for login page*/
     
     public function login_validation()
     {
        if (isset($_POST['loginbutton'])) {
        $log=new Authmodel();
        $email = stripslashes($_POST['email']);   
        $password = stripslashes($_POST['password']);
         $read=$log->login_validation($email,$password);
         
         if($email=="")
        {
            echo $error_email=  "<span class = 'error'>Please enter your email</span>"; 
        }
        else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
        {
            echo $error_email= "<span class='error'>Please enter a valid email</span>";
        }
        else if($password=="")
        {
            echo $error_password=  "<span class = 'error'>Password cannot be empty</span>"; 
        }
        else if($read==1)
        {
            redirect("Sucessfully logged in !",'');
        }
         else
         {
            redirect("Invalid details!",'');
         }

     }
    }
    }
?>