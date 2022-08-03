<?php 
/***
 * PDO DATABASE classes;
 * Connect to databases;
 * created prepared statments
 * Bind values
 * 
 */

 class Database{
     private $host = DB_HOST;
     private $user = DB_USER;
     private $password = DB_PASS;
     private $dbname = DB_NAME;

     private $dbh;
     private $stmt;
     private $errors;

     public function __construct(){

        // set DSN

        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname.'';
        $options = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->password,$options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->errors; 
        }
     }
     

     // Prepate statment with query 
     public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
     }
     
     // bind the values
     public function bind($param,$value, $type = null){

        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);

     }  
     // excute the prepared statment 

     public function execute(){
         return $this->stmt->execute();
     }

     // get result set as array of abjects

     public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }
     // SINGLE RECORD AS ABJECT
     public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
     }


     // GET OBJECT ROW COUNT 

     public function rowCount(){
         return $this->stmt->rowCount();
     }
 }
