<?php
class Pages extends Controller
{

    
    public function __construct()
    {
        $this->userModel = $this->model("User");
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_var(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => clear($_POST['name']),
                'lastname' => clear($_POST['lastname']),
                'email' => clear($_POST['email']),
                'password' => clear($_POST['password']),
                'confirm_password' => clear($_POST['confirm_password']),
                'name_error' => '',
                'lastname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            

            // Validate name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please Enter your name';
            }

            // validate last name
            if (empty($data['lastname'])) {
                $data['lastname_error'] = 'Please Enter your Lastname';
            }

             // validate email
             if (empty($data['email'])) {
                $data['email_error'] = 'Please Enter your email';
            }
            if (!empty($data['email'])) {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'This email Has already been registered !';
                }
            }

            
            
            // validate password

            if (empty($data['password'])) {
                $data['password_error'] = 'Please Enter your password';
            }
            if(!empty($data['password'])){
                if(strlen($data['password']) < 6) {
                    $data['password_error'] = "Your Password Must be more than 6 characters";
                }
            }

            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = "please Enter confirm password";
            }

            if(!empty($data['confirm_password'])){
                if(!($data['password'] == $data['confirm_password'])){
                    $data['confirm_password_error'] = "it has to much with the password";
                }
            }

         
            

            if(empty($data['password_error']) && empty($data['confirm_password_error']) && empty($data['name_error']) && empty($data['lastname_error']) && empty($data['email_error'])){
                
               $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
               if($this->userModel->register($data)){
                flash("register_succeess",'you are registered');
                redirect("Pages/index");
               }else{
                echo "Something went wrong";
               }

                
            }else{
                $this->view("pages/register",$data);
            }


        }else{
            $data = [
                'name' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'lastname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            $this->view("pages/register",$data);
        }


        

    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $_POST = filter_var(INPUT_POST, FILTER_SANITIZE_STRING);
            $email = clear($_POST['email']);
            $password = clear($_POST['password']);

            $data = [
                'email' => $email,
                'password' => $password,
                'email_error' => '',
                'password_error' => ''
            ];

            if (empty($email)) {
                $data['email_error'] = 'Please fill the email';
            }

            if (empty($password)) {
                $data['password_error'] = 'please fill the password';
            }

            if (!empty($password)) {
                if (strlen($password) < 6) {
                    $data['password_error'] = 'Password chars must be more than 6';
                }
            }


            
            // check for email 
            if (!empty($email)) {
                if ($this->userModel->findUserByEmail($email)) {
                } else {
                    $data['email_error'] = 'No user found';
                }
            }
           


            if (empty($data['email_error'] && empty($data['password_error']))) {
                
                $loggedInUser = $this->userModel->login($data['email'], $data['password']); 
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                    
                }else{
                    $data['password_error'] = "password incorrect";
                    
                    $this->view("pages/index", $data);
                }

            } else {
                $this->view("pages/index", $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];
        }

        $this->view("pages/index", $data);
    }


    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;

        redirect("dashboard/index");
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();

        redirect("Pages/index");
    }
}


