<?php 
if(isset($_POST['takecash'])){

$number=$_POST['phone'];
$_SESSION['phone']=$number;
$amount=$_POST['amount'];
$command="jpesa";
$action="deposit";

$username="richard.agwetu";
$password="dangersisrael";

$IS_GET="3"; 
$url = "https://secure.jpesa.com/api.php?command=".$command."&action=".$action."&username=".$username."&password=".$password."&IS_GET=".$IS_GET."&number=".$number."&amount=".$amount."";
$json = file_get_contents($url);
$safe_json = str_replace("\n", "\\n", $json);
$str = $safe_json;
$str=explode("|",$str);

$tid=$str[1];
echo json_encode("Transaction Initiated please Enter Your Pin to confirm: Code> ".$tid);
if($tid){
$_SESSION['tid']=$tid;
verify();
}else{

}
}

//verifying payments

function verify(){
	//$request=$_POST['my_request_is'];  
   //$jpesacode=$request;
     $message="success";
    $failed="failed";
     $command="jpesa"; 
$action="info";
$username="richard.agwetu";
$password="dangersisrael";
$IS_GET="3"; 
$pending="pending";
$complete="complete";
$failed="failed";
$tid=$_SESSION['tid'];
$tid = trim($tid);
$url = "https://secure.jpesa.com/api.php?command=jpesa&action=info&username=$username&password=$password&IS_GET=3&tid=$tid";
$str = file_get_contents($url);
if (strpos($str,'[ERROR]')===false) {
$str = json_decode(str_replace('[SUCCESS]','',$str),true);
$status=$str['status'];
json_encode($status);
//echo $status;
}
 if($status=="complete"){
     $message=$complete;
     header("Location: success.php?id=<?php echo $idy ?>&seat=<?php echo $seat"); 
    
} else if($status=="pending"){
$message=$pending;

}else{
$message=$failed;
echo("<script>alert('Transaction Cancelled Redirecting');</script>");
//header("")
}
echo json_encode($message);
//echo $message;


}
?>