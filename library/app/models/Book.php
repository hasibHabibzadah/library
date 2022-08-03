<?php
class Book
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function updateBook($data){
         $this->db->query("UPDATE books SET  isbn = :isbn, book_name = :book_name, book_author= :book_author, book_edition = :book_edition, published_year = :published_year where id= :id ");
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':isbn', $data['isbn']);
        $this->db->bind(':book_name', $data['bookName']);
        $this->db->bind(':book_author', $data['bookAuthor']);
        $this->db->bind(':book_edition', $data['edition']);
        $this->db->bind(':published_year', $data['published_year']);
        
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }


    public function deleteBook($id){
        $this->db->query("DELETE FROM books where id = :id");
        $this->db->bind(":id",$id);

        
        if($this->db->execute()){
            echo "Yes it was successfull";
            return true;
        }else{
            echo "NO IT";
            false;
        }

    }

   


    public function showBook(){
        $this->db->query("SELECT * FROM books");
        $result = $this->db->resultSet();

        return $result;
    }

    public function register($data)
    {
        $this->db->query("INSERT INTO books(isbn,book_name,book_author,book_edition,published_year) VALUES 
                        (:isbn,:book_name,:book_author,:book_edition,:published_year)");
        $this->db->bind(":isbn", $data['isbn']);
        $this->db->bind(":book_name", $data['bookName']);
        $this->db->bind(":book_author", $data['bookAuthor']);
        $this->db->bind(":book_edition", $data['edition']);
        $this->db->bind(":published_year", $data['published_year']);

        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function singlePost($id){
        $this->db->query("SELECT * FROM books WHERE id=:id");
        $this->db->bind(':id', $id);

      $row = $this->db->single();
    
      return $row;
    }
}
