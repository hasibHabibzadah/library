<?php require APPROOT . "/view/inc/header.php"; ?>


<div class="container mt-5 w-50">

  <!-- Pills navs -->
  <div class=" text-center display-6 mb-5">
    Welcome to <?php echo SITENAME?>
  </div>
  <div class="display-3">
    <?php echo flash('register_success');?>
  </div>
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form method="POST" action="<?php echo URLROOT?>/pages/index">
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="loginName" class="form-control" name="email"/>
          <label class="form-label" for="loginName">Email or username</label>
          <?php echo "<p class='text-danger'>{$data['email_error']}</p>";?>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="loginPassword" class="form-control" name="password" />
          <label class="form-label" for="loginPassword">Password</label>
         
          <?php echo "<p class='text-danger'>{$data['password_error']}</p>";?>
        </div>

        <!-- 2 column grid layout -->
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
          </div>

          <div class="col-md-6 d-flex justify-content-center">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <input type="submit" class="btn btn-primary btn-block mb-4" value="sign in">

        <!-- Register buttons -->
        <div class="text-center">
          <p>Not a member? <a href="<?php echo URLROOT?>/pages/register">Register</a></p>
        </div>
      </form>
    </div>
  </div>
  
  <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="<?php echo URLROOT?>/pages/register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
  </ul>
</div>
<!-- Pills content -->




<?php require APPROOT . "/view/inc/footer.php"; ?>