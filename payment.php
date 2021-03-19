<?php session_start(); ?>
<!doctype <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MobiFuel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_kGzAjZWNqPs2KmO13S58T");
   })();


sendmail();

function sendmail(){



var templateParams = {
    name: 'Urgent New Fuel Order',
    notes: 'Hello Administrator,You have Got Anew Order with the Mobifuel App  Login to dashboard for Details.Thanks'
};
 
emailjs.send('gmailme', 'bus_ticket', templateParams)
    .then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
       console.log('FAILED...', error);
    });
}





</script>
    
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #93caf1;">
        <a class="navbar-brand" href="#">
          <img src="images/gas.png" width="30" height="30" class="d-inline-block align-top" alt="">
         Mobi Fuel App
        </a>
      </nav>
      <div class="card bg-light" style="width: 100%;  padding: 10px";>
      <div  class="bg-info card-body d-card" style="width: 50%;margin: 0 auto;">
          <center><h1>Order Details</h1></center>
          <center>Order processed Successfully wait for delivery agent</center>
           <div class="form-group col-md-6">
          <label for="formGroupExampleInput2">Order Code</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" readonly="readonly" value="<?php echo $_SESSION['ordercode']; ?>">
        </div>
      <div class="form-group col-md-6">
          <label for="formGroupExampleInput2">Telephone Number</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" readonly="readonly" value="<?php echo $_SESSION['phone']; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="formGroupExampleInput2">Car type</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" readonly="readonly" value="<?php echo $_SESSION['cartype']; ?>">
          </div>
          <div class="form-group col-md-6">
              <label for="formGroupExampleInput">Type Of Fuel</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly="readonly" value="<?php echo $_SESSION['fueltype']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Number-plate</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly="readonly" value="<?php echo $_SESSION['numberplate']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Litres</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly="readonly" value="<?php echo $_SESSION['litres']; ?>">
              </div>
               <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Amount Total</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly="readonly" value="<?php echo $_SESSION['totalcost']; ?>">
              </div>
                    <p>Modal of Payment:<br>
                      Cash On Delivery
                      <hr>
<form action="payment.php" method="POST">
<input type="hidden" name="code" value="<?php echo $_SESSION['ordercode'] ?>" readonly><br>
<input type="submit" name="cancel" value="cancel Order" style="background-color:red; color:white;">
</form>
<?php 
if(isset($_POST['cancel'])){
 $ordercode=$_POST['code'];
 require_once("db.php");
 $sql="DELETE from orders where ordercode='$ordercode'";
 $dele=mysqli_query($conn,$sql);
 if($dele){
 echo "<script>alert('Order cancelled Successully'); window.location.assign('index.php');</script>";
 }
}

?>
               <!--  Pay With Mobile Money<br>
          <img src="images/money.png" class="rounded float-left" alt="..."><br>
          <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Mobile Money Number</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" readonly="readonly" value="">
              </div> -->
          <!--p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p---->
         <hr>
         <center>Thanks For Using Mobi Fuel</center>
        </div>
      </div>
      <footer class="bg-light py-5">
          <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2020 - Mobi Fuel</div>
          </div>
        </footer>

    </body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
    
    </html>