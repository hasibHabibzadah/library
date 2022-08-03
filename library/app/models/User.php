<?php 

class User {

    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }



    public function login($email,$password = '123456'){
        $this->db->query("SELECT * FROM `admin` WHERE email=:email");
        $this->db->bind(":email",$email);

        $row = $this->db->single();

        $hashed_password = $row->password;

        $checkThePassword = password_verify($password, $hashed_password);

        var_dump($checkThePassword);

        if($checkThePassword){
            return $row;
        }else{
            return false;
        }
    }


    public function register($data){
        $this->db->query("INSERT INTO admin(name,lastname,email,password,confirm_password) VALUES (:name,:lastname,:email,:password,:confirm_password)");
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":lastname", $data['lastname']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":password", $data['password']);
        $this->db->bind(":confirm_password", $data['confirm_password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM admin WHERE email=:email");
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        // check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}