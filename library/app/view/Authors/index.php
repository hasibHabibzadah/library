<?php require APPROOT . "/view/inc/header.php"; ?>
<?php require APPROOT . "/view/inc/nav.php"; ?>


<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-75">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card mt-5" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-4">Register The author</h2>
                            <form method="POST" action="<?php echo URLROOT ?>/authors/">
                                <div class="form-outline mb-4">
                                    <input type="text" name="name" id="" class="form-control form-control-lg" />
                                    <label class="form-label" for="author name">Author Name</label>
                                    <!-- <?php echo "<p class='text-danger'>" . $data['name_err'] . "</p>"; ?> -->
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="lastname" id="" class="form-control form-control-lg" />
                                    <label class="form-label" for="last name">Author lastname</label>
                                    <!-- <?php echo "<p class='text-danger'>" . $data['lastname_err'] . "</p>"; ?> -->
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="date" name="birthdate" id="" class="form-control form-control-lg" />
                                    <label class="form-label" for="birthdate">Author birthdate</label>
                                    <!-- <?php echo "<p class='text-danger'>" . $data['birthdate_err'] . "</p>"; ?> -->
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="date" name="deathdate" id="" class="form-control form-control-lg" />
                                    <label class="form-label" for="deathdate">deathdater</label>
                                    <!-- <?php echo "<p class='text-danger'>" . $data['deathdate_err'] . "</p>"; ?> -->
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white " value="Register" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . "/view/inc/footer.php"; ?>