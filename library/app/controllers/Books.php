<?php
class Books extends Controller
{

    public function __construct()
    {
        $this->bookModel = $this->model("Book");
        $this->justAuthorName = $this->model("Author");
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            if ($this->bookModel->deleteBook($id)) {
                redirect("books/show");
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('books/show');
        }
    }


    public function update($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'id' => $id,
                'isbn' => clear($_POST['isbn']),
                'bookName' => clear($_POST['bookName']),
                'bookAuthor' => clear($_POST['bookAuthor']),
                'edition' => clear($_POST['edition']),
                'published_year' => clear($_POST['published_year']),
                'isbn_err' => '',
                'bookName_err' => '',
                'bookAuthor_err' => '',
                'edition_err' => '',
                'published_year_err' => ''
            ];

            // STARTING THE VALIDATION
            
            if (empty($data['isbn'])) {
                $data['isbn_err'] = "Please fill out The ISBN";
            }
            if (empty($data['bookName'])) {
                $data['bookName_err'] = "Please fill out the name of book";
            }
            if (empty($data['bookAuthor'])) {
                $data['bookAuthor_err'] = "Please fill out the name of author";
            }
            if (empty($data['edition'])) {
                $data['edition_err'] = "please fill out the Edition of the book";
            }
            if (empty($data['published_year'])) {
                $data['published_year_err'] = "please fill out the published year";
            }


            // check if it is error freee

            if (empty($data['published_year_err']) && empty($data['edition_err']) && empty($data['authorName_err']) && empty($data['bookName_err']) && empty($data['isbn_err'])) {


                if ($this->bookModel->updateBook($data)) {
                    redirect("books/show");
                } else {
                    die("something went wrong");
                }
            } else {
                $this->view("books/update", $data);
            }
        } else {

            $post = $this->bookModel->singlePost($id);

            $data = [
                'id' => $id,
                'isbn' => $post->isbn,
                'bookName' => $post->book_name,
                'bookAuthor' => $post->book_author,
                'edition' => $post->book_edition,
                'published_year' => $post->published_year,
                'isbn_err' => '',
                'bookName_err' => '',
                'bookAuthor_err' => '',
                'edition_err' => '',
                'published_year_err' => ''
            ];

            $this->view("books/update", $data);
        }
    }




    public function show()
    {
        $post = $this->bookModel->showBook();
        $data = [
            'book_list' => $post
        ];

        $this->view("books/show", $data);
    }


    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


            $data = [
                'isbn' => clear($_POST['isbn']),
                'bookName' => clear($_POST['bookName']),
                'bookAuthor' => clear($_SESSION['authorName']),
                'edition' => clear($_POST['edition']),
                'published_year' => clear($_POST['published_year']),
                'isbn_err' => '',
                'bookName_err' => '',
                'bookAuthor_err' => '',
                'edition_err' => '',
                'published_year_err' => ''
            ];


            // STARTING THE VALIDATION

            if (empty($data['isbn'])) {
                $data['isbn_err'] = "Please fill out The ISBN";
            }
            if (empty($data['bookName'])) {
                $data['bookName_err'] = "Please fill out the name of book";
            }
           
                if (empty($data['bookAuthor'])) {
                    $data['bookAuthor_err'] = "Please fill out the name of author";
                }
           
           
            if (empty($data['edition'])) {
                $data['edition_err'] = "please fill out the Edition of the book";
            }
            if (empty($data['published_year'])) {
                $data['published_year_err'] = "please fill out the published year";
            }


            // check if it is error freee

            if (empty($data['published_year_err']) && empty($data['edition_err']) && empty($data['authorName_err']) && empty($data['bookName_err']) && empty($data['isbn_err'])) {

                if ($this->bookModel->register($data)) {
                    flash("register_success", "YOU are registred");
                    $this->unsetTheUnnecessarySessions();
                    redirect("Books/show");
                } else {
                    die("something went wrong ");
                }
            } else {

                $this->view("books/register", $data);
            }
        } else {

            $data = [
                'isbn' => '',
                'bookName' => '',
                'bookAuthor' => "",
                'edition' => '',
                'published_year' => '',
                'isbn_err' => '',
                'bookName_err' => '',
                'bookAuthor_err' => '',
                'edition_err' => '',
                'published_year_err' => ''
            ];


            $this->view("books/register", $data);
        }
    }

    public function unsetTheUnnecessarySessions(){

        unset($_SESSION['authorname']);
        redirect("Books/show");
    }
}
