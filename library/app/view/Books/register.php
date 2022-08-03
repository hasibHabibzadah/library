<?php require APPROOT . "/view/inc/header.php"; ?>
<?php require APPROOT . "/view/inc/nav.php"; ?>

<?php 
    print_r($_SESSION);
?>
<section class="vh-100 bg-image mt-4" >
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-75">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card mt-5" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Register a Book</h2>
                            <form method="POST" action="<?php echo URLROOT ?>/books/register">


                                <div class="form-outline mb-4">
                                    <input type="number" name="isbn" id="form3Example3cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="Book Isbn">Book ISBN</label>
                                    <?php echo "<p class='text-danger'>" . $data['isbn_err'] . "</p>"; ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="bookName" id="Book name" class="form-control form-control-lg" />
                                    <label class="form-label" for="Book name">Book Name</label>
                                    <?php echo "<p class='text-danger'>" . $data['bookName_err'] . "</p>"; ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="bookAuthor" id="form3Example1cg" class="form-control form-control-lg" value="<?php echo $_SESSION['authorName']?>" disabled/>
                                    <label class="form-label" for="form3Example1cg">Book Author</label>
                                    <?php echo "<p class='text-danger'>" . $data['bookAuthor_err'] . "</p>"; ?>
                                </div>

                                <div class="form-outline mb-4">
                                    <select name="edition" id="" class="form-control form-control-lg">
                                    <option value="" >Select Book Edition</option>
                                        <?php 
                                            for($i = 1 ; $i<= 20 ;$i++ ):
                                        ?>
                                        <option value="<?php echo $i?>"><?php echo "Edition : ".$i?></option>
                                        <?php endfor;?>
                                    </select>
                                   
                                    <label class="form-label" for="Version">Book Edition</label>
                                    <?php echo "<p class='text-danger'>" . $data['edition_err'] . "</p>"; ?>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="number" name="published_year" id="" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cdg">Published Year</label>

                                    <?php echo "<p class='text-danger'>" . $data['published_year_err'] . "</p>"; ?>

                                </div>


                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white " value="Register" />
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Want to see new list of books?<a href="<?php echo URLROOT ?>/Books/show" class="fw-bold text-body"><u>Click here</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . "/view/inc/footer.php"; ?>