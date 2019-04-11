<?php 
include_once('header.php');
include_once('User.php');
?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/login.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Login in</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php 
          if ($_SERVER['REQUEST_METHOD'] == "POST") {

           if(!empty($_POST['username']) && !empty($_POST['password'])) {
               $user=new User();
                $author=$user->loginValidate($_POST['username'],$_POST['password']);
                  if (is_array($author) || is_object($author)) {
                    //print_r($author);
                      $_SESSION['username']=$_POST['username'];
                      echo "<p>You are successfully logged in</p>";
                       echo "<p><a href='index.php'>Home page </p>";
                  }else {
                      echo "Username or password is incorrect!";
                      echo "<p> <a href='login.php'> Login again </a> <p>";
                  } 
            }else {
                  echo "Username or password is empty!";
                   echo "<p> <a href='login.php'> Login again </a> <p>";
            }
           }elseif(isset($_SESSION['username'])){
            echo "<p> You are already logged in.</p>";
          }else {
            ?>
            <p> Username: admin, password: admin </p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Username" id="username" required name="username"data-validation-required-message="Please enter your username.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" id="password" required name="password"data-validation-required-message="Please enter your password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Login in</button>
          </div>
        </form>
        <?php 
          }

        ?>
      </div>
    </div>
  </div>

<?php
include_once('footer.php');
?>