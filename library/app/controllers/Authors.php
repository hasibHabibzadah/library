<?php 

class Authors extends Controller{

    public function __construct()
    {
        $this->authorModel = $this->model("Author"); 
    }

    public function index(){

       

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
    
                $data = [
                    
                    'name' => clear($_POST['name']),
                    'lastname' => clear($_POST['lastname']),
                    'birthdate' => clear($_POST['birthdate']),
                    'deathdate' => clear($_POST['deathdate']),
                    'name_err' => '',
                    'lastname_err' => '',
                    'birthdate_err' => '',
                    'deathdate_err' => ''
                ];
    
    
                // STARTING THE VALIDATION
    
                if (empty($data['name'])) {
                    $data['name_err'] = "Please fill out The name";
                }
                if (empty($data['lastname'])) {
                    $data['lastname_err'] = "Please fill out the lastname";
                }
                
                // check if it is error freee
    
                if (empty($data['name_err']) && empty($data['lastname_err']) ) {
    
                    if ($this->authorModel->registerAuthor($data)) {
                        flash("register_success", "YOU are registred");
                        $this->createSession($data);
                    } else {
                        die("something went wrong ");
                    }
                } else {
    
                    $this->view("Authors/index", $data);
                }
            } else {
    
                $data = [
                    'name' => '',
                    'lastname' => '',
                    'birthdate' => '',
                    'deathdate' => '',
                    'name_err' => '',
                    'lastname_err' => '',
                    'birthdate_err' => '',
                    'deathdate_err' => '',
                    
                ];
    
    
                $this->view("Authors/index", $data);
            }
       

        // $this->view("author/index",$data);
    }



    public function createSession($data){

        $_SESSION['authorName'] = $data['name'];

        redirect("books/register");
    }
}