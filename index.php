
<?php include("./script/main.php"); ?>
<?php include("./script/header.php"); ?>
         
<div class="row">
  <div class="col-md-6">
    <!--left side "lamp"-->
  </div>
  <div class="col-md-6">
    <div class="container" id="homePageContainer">
      <h1>myNotes</h1>
      <p><strong>Keep your thoughts near you.</strong></p>
      <hr>
      <div id="error">
        <?php if ($error!="") {
          echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        } ?>
      </div>

      <form method="post" id = "signUpForm">
        <p>Sign Up and have your notes everywhere!</p>
        <fieldset class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Your Email">
        </fieldset>
        <fieldset class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password">
        </fieldset>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="stayLoggedIn" value=1> Stay logged in
          </label>
        </div>
        <fieldset class="form-group">
          <input type="hidden" name="signUp" value="1">
          <input class="btn btn-warning" type="submit" name="submit" value="Sign Up!">
        </fieldset>
        <p>Back to <a class="toggleForms">Log in</a></p>
      </form>

      <form method="post" id = "logInForm">
        <p>Log in using your e-mail and password.</p>
        <fieldset class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Your Email">
        </fieldset>
        <fieldset class="form-group">
          <input class="form-control"type="password" name="password" placeholder="Password">
        </fieldset>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="stayLoggedIn" value=1> Stay logged in
          </label>
        </div>
        <fieldset class="form-group">
          <input type="hidden" name="signUp" value="0">
          <input class="btn btn-warning" type="submit" name="submit" value="Log In!">
        </fieldset>
        <p>Interested? <a class="toggleForms">Sign up now.</a></p>
      </form>
    </div>
  </div>
</div>

<?php include("./script/footer.php"); ?>
