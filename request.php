<?php session_start(); 

if(isset($_POST['Continue'])){
  $var= $_POST['latitude'];
  if(empty($var)){
    header('Location:location.php');

  }
$_SESSION['latitude']=$_POST['latitude'];
$_SESSION['longitude']=$_POST['longitude'];
//echo $_SESSION['latitude;']
}




?>
<html>
<head>
<title></title>
 <link type="text/css" rel="stylesheet" href="bootsrap/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
 <link type="text/css" rel="stylesheet" href="css/style.css">


</head>
<body>
<center>Welcome <?php echo $_SESSION['email']; ?> <p>state your emergency below</center>
      <!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #93caf1;">
    <a class="navbar-brand" href="#">
      <img src="images/gas.png" width="30" height="30" class="d-inline-block align-top" alt="">
     Mobi Fuel App
    </a>
  </nav>
  <div class="card bg-light" style="width: 100%;  padding: 10px";>
  <div  class="bg-info card-body d-card" style="width: 50%;margin: 0 auto;">  
    <h1 class="text-center">Request For Fuel</h1> 
   <center>
  <table >
    
      <tr>
        <th>Fuel</th>
        <th>Prices Per Litre</th>
      </tr>

      <?php require_once("db.php");
$sql="SELECT * from fueltypes";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query)){



       ?>
    <tr>
      <td><?php echo $row['fueltype']; ?></td>
      <td><?php echo $row['price']; ?></td>
      </tr>
     <?php } ?>
  
  </table>
   </center> 
   <br>
<form action="request.php" method="POST">
  
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Type Of Fuel</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="fueltype">
                    <option selected>Choose...</option>
                  <?php  $sql="SELECT * from fueltypes";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($query)){
 ?>
                    <option><?php echo $row['fueltype']; ?></option>
                  
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Telephone Number</label>
                <input type="number" maxlength="10" class="form-control" id="formGroupExampleInput2" placeholder="" required="required" name="phone">
              </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="formGroupExampleInput">Number-plate</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" required="required" name="numberplate">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="formGroupExampleInput2">Car type</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" required="required" name="cartype">
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="formGroupExampleInput">Color</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" required="required" name="carcolor">
                          </div>
                          
                          </div>
              <p>Number of litres:
                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="litres">
                    <option selected>Choose...</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                  </select>
        </p>
  <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="formGroupExampleInput">Latitude</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $_SESSION['latitude']; ?>" readonly="readonly" required="required" name="latitude">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="formGroupExampleInput2">Longitude</label>
                      <input type="text" class="form-control" id="formGroupExampleInput2" readonly="readonly" value="<?php echo $_SESSION['longitude']; ?>" placeholder="" required="required" name="longitude">
                    </div>
                    </div>

        <button type="submit" class="btn btn-primary" name="request">Request</button>           
        <button type="Reset" class="btn btn-primary" href="#">Reset</button>
      </form>
    </div>
</div>
            
            <?php
            require_once("db.php");
if(isset($_POST['request'])){
  $fueltype=$_POST['fueltype'];
  $phone=$_POST['phone'];
  $numberplate=$_POST['numberplate'];
  $cartype=$_POST['cartype'];
  $carcolor=$_POST['carcolor'];
  $litres=$_POST['litres'];
  $latitude=$_POST['latitude'];
  $longitude=$_POST['longitude'];
  $ordercode=rand(0,1000000);

//checking current fuel price

$sqlf="SELECT * from fueltypes where fueltype='$fueltype'";
$query=mysqli_query($conn,$sqlf);
while($row=mysqli_fetch_assoc($query)){
$price=$row['price'];
}
//end checking fuel pricee

//getting total amount
$totalcost=$price * $litres;

$_SESSION['totalcost']=$totalcost;

//saving the order
$sql="INSERT INTO `orders` (`fueltype`, `phone`, `numberplate`, `cartype`, `carcolor`, `litres`, `latitude`, `longitude`,`ordercode`,`status`, `totalcost`) VALUES ('$fueltype', '$phone', '$numberplate', '$cartype', '$carcolor', '$litres', '$latitude', '$longitude','$ordercode','New','$totalcost');";
$query=mysqli_query($conn,$sql);

//saving order

if($query){

  //setting session variables
$_SESSION['ordercode']=$ordercode;
$_SESSION['phone']=$phone;
$_SESSION['numberplate']=$numberplate;
$_SESSION['litres']=$litres;
$_SESSION['fueltype']=$fueltype;
$_SESSION['cartype']=$cartype;
//end settting sessionvariables
  ?>
<script type="text/javascript">
  
  
</script>
  <?php
  //making order successsful and redirecting customer
  echo "<script>alert('Order Successful processed Please Hold on for our Agent to Contact you Shortly');window.location.assign('payment.php');</script>";

?>


<?php


}{
 echo mysqli_error($conn);
  echo "<script>alert('Unknown Error Try Again');";
}
}




             ?>        

                
<footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2020 - Mobi Fuel</div>
    </div>
  </footer>
    
</body>
<script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    
</html>