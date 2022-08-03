<?php

class Author
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function justOneElement($id){
       
            $this->db->query("SELECT * FROM author WHERE id=:id");
            $this->db->bind(':id', $id);
    
          $row = $this->db->single();
        
          return $row;
        
    }


    public function registerAuthor($data)
    {

        $this->db->query("INSERT INTO author(`name`,lastname,birthdate,deathdate) VALUES 
        (:name,:lastname,:birthdate,:deathdate)");
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":lastname", $data['lastname']);
        $this->db->bind(":birthdate", $data['birthdate']);
        $this->db->bind(":deathdate", $data['deathdate']);
        

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
