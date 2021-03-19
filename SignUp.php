
<html>
 <head>
  <title>Sign up</title>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
 </head>
 
 <body style=" background-color:white;border;">

        <!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #93caf1;">
    <a class="navbar-brand" href="#">
      <img src="images/gas.png" width="30" height="30" class="d-inline-block align-top" alt="">
     Mobi Fuel App
    </a>
  </nav>

  <div class="card bg-light" style="width: 100%;  padding:5px";>
      <div class="bg-info card-body d-card " style="width: 40%;margin: 0 auto;">
      
     
 <form class="needs-validation" action="SignUp.php" method="POST" >

   <h1>Create your account</h1>
   <img src="images/Fuel_1.PNG" class="rounded mx-auto d-block" alt="...">
 
   <form>
    <div class="row">
      <div class="col">
          <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" placeholder="Email" required="required" name="email">
      </div>
      
    </div>
     <div class="row">
     
      <div class="col">
          <label for="inputEmail4">Password</label>
        <input type="password" class="form-control" placeholder="Password" required="required" name="password">
      </div>
    </div>
  <br>

               <button type="submit" class="btn btn-primary" name="register">Register</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="login.php">Already have an Account? Login</a>
              <a class="dropdown-item" href="index.php">Go Home</a>
    
      </form>
    </form>
  </div>
</div>

/////verification for the sign up////////

<?php require_once("db.php");
if(isset($_POST['register'])){
$email=$_POST['email'];
$password=$_POST['password'];


$sql="INSERT INTO `users` (`email`, `password`, `userrole`) VALUES ('$email', '$password', 'user');";
$query=mysqli_query($conn,$sql);
if($query){
  echo "<script> window.location.assign('login.php');</script>";
}else{
   echo "<script>alert('Failed Try Again with Another Email');</script>";
}
}
 ?>
<footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2020 - Mobi Fuel</div>
    </div>
  </footer>
       
 </body>
</html>