<?php session_start(); ?>
<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/bootstrap.min.js"></script>
    
   
</head>
<body>

       <!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #93caf1;">
    <a class="navbar-brand" href="#">
      <img src="images/gas.png" width="30" height="30" class="d-inline-block align-top" alt="">
     Mobi Fuel App
    </a>
  </nav>
  <br><br>

  <?php 
require_once("db.php");
if(isset($_POST['submit'])){
$password=$_POST['password'];
$email=$_POST['email'];

$sql="SELECT * FROM users where email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);

$numrows=mysqli_num_rows($result);
if($numrows>0){

 while($row = mysqli_fetch_assoc($result)) {
              // echo "Name: " . $row["username"]. "<br>";
              $userrole=$row['userrole'];
                $_SESSION['email']=$email;
                $_SESSION['userrole']=$userrole;
                if($userrole=="admin"){

                
              echo "<script> window.location.assign('admin.php');</script>";
              }else if($userrole=="user"){
              echo "<script> window.location.assign('location.php');</script>";
              }else{
                echo "<script>alert('Oops Unknown error Try Again'); window.location.assign('login.php');</script>";
              }
             // header("Location: dashboard.php");
                exit();
            }


//echo ('<script>alert("Login Successful");</script>');
}else{
  echo ('<script>alert("Login Failed Try Again");</script>');
}

}

  ?>
    
        <div class="card mb-10 bg-info " style="max-width: 980px; margin: 50px;">
                <div class="row no-gutters" >
                  <br>
                  <div class="col-md-5" >
                    <img src="images/garge.png" class="card-img" width="50%" height="100%" alt="...">
                  </div>
                  <div class="col-md-5">
                    <div class="card-body">
                      <center><h2 class="card-title">Login</h2></center>
                      <div class="col-md-10">
                        <form action="login.php" class="px-4 py-3" method="POST">
                          <div class="form-group">
                            <label for="exampleDropdownFormEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                          </div>
                          <div class="form-group">
                            <label for="exampleDropdownFormPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
                          </div>
                          <div class="form-group">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="dropdownCheck">
                              <label class="form-check-label" for="dropdownCheck">
                                Remember me
                              </label>
                            </div>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="SignUp.php">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>

              <!-- Footer -->
<footer class="bg-light py-5">
  <div class="container">
    <div class="small text-center text-muted">Copyright &copy; 2019 - Mobi Fuel</div>
  </div>
</footer>

</body>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>