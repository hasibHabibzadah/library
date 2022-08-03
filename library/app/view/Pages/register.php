<?php require APPROOT . "/view/inc/header.php"; ?>
<section class="vh-100 bg-image mt-3"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
              <form method="POST" action="<?php echo URLROOT?>/pages/register">

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                  <!-- <span class="invalid-feedback"><?php echo $data['name_error']?></span> -->
                  
                  <?php echo "<p class='text-danger'>". $data['name_error']."</p>";?>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" name="lastname" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your LastName</label>
                  <?php echo "<p class='text-danger'>". $data['lastname_error']."</p>";?>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                 
                  <?php echo "<p class='text-danger'>". $data['email_error']."</p>";?>

                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <?php echo "<p class='text-danger'>". $data['password_error']."</p>";?>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="confirm_password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  
                  <?php echo "<p class='text-danger'>". $data['confirm_password_error']."</p>";?>

                </div>


                <div class="d-flex justify-content-center">
                  <input type="submit"
                    class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white " value="Register"/>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="<?php echo URLROOT?>/pages/index"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require APPROOT . "/view/inc/footer.php"; ?>