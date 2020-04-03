<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") 
{
    $orderid = $_POST["ORDERID"];
    $time = $_POST["TXNDATE"];	
    $order = str_replace("SAAVS","19",$orderid);
		$data = $_POST["BANKTXNID"].$order.$_POST["CHECKSUMHASH"];
    $db = mysqli_connect("162.251.85.72","saavyas_admin","Nagacharan@1","saavyas_new") or die("cannot select DB");  
    if ($_POST["STATUS"] == "TXN_SUCCESS") 
    { 
        $sql="UPDATE registration SET txnstatus = 'success' , time = '$time' WHERE orderid='$orderid'"; 
        $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
        $PNG_WEB_DIR = 'temp/';
        include "qrlib.php";    
        if (!file_exists($PNG_TEMP_DIR))
	          mkdir($PNG_TEMP_DIR);
            $filename = $PNG_TEMP_DIR.'test.png';
            $errorCorrectionLevel = 'M';
            $matrixPointSize = 5;
        if (isset($data)) 
          { 
	          $filename = $PNG_TEMP_DIR.'test'.md5( $data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
	          QRcode::png( $data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
           }   
        $imgsource = $PNG_WEB_DIR.basename($filename); 
    }
    else
    {
      $sql = "DELETE from registration WHERE orderid='$orderid'";
    }
$sql2 = "SELECT email,name,event from registration WHERE orderid='$orderid'";  
  $result = mysqli_query($db,$sql2);
  if(mysqli_query($db,$sql)){}
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$email_to = $row["email"];
		$event = $row["event"];
		$name = $row["name"];
	}
}	
mysqli_close($db);

	}

else {
	echo "<h4>Checksum mismatched.</h4>";
}
//     $email_subject = "Hi there !";
//     $email_from = "tech@saavyas.org"; // required
//     $email_message = "Dear ".$name."you have successfully registered for the event".$event;   
//     $email_message .= "Email: ".$email_from."\n";
//    	$email_message .= "please save the qrcode and have to be submitted at the time of event";
// $headers = 'From: '.$email_from."\r\n".
// 'Reply-To: '.$email_from."\r\n" .
// 'X-Mailer: PHP/' . phpversion();
// $retval = mail($email_to, $email_subject, $email_message, $headers);  
//     if( $retval == true ) {
           
//          }else {
        
//          }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Saavyas'19</title>
	<meta name="theme-color" content="#000000">
	<link rel="shortcut icon" href="../assets/images/saavyas-font.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caudex">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
	::-webkit-scrollbar {
    width: 10px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: rgb(50, 51, 53); 
    border-radius: 10px;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #000; 
  }
.success-page {
  width: 45%px;
  padding: 50px 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  border:#01CBC6 2px solid;
  max-width: 35%;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.form button {
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
h4,h3
{
  font-family: 'Caudex';
  color: #FFF;
}
a
{
  color:#EAF0F1; 
}
body {
  background-color: #333945; /* fallback for old browsers */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.log{
    position: absolute;
    top:5%;
    left:90%;
    color:white;
    text-decoration: none;
    z-index: 150;
}
@media only screen and (max-width: 462px) 
{
    .log
    {
        left:85%;
	}
	.form {
		max-width:320px;
	}
	.success-page 
	{
		width:340px;
	}
  }
</style>
</head>
<body>
   <a href="../"><i class="log fa fa-home" style="font-size:28px;" ></i></a>
    <div class="success-page">
        <div class="form">
		  <?php 	
     if (($_POST["STATUS"] == "TXN_SUCCESS")&&($isValidChecksum == "TRUE")) 
     {
      echo '<h4>You have successfully registered for the event <h3>'.$event;'</h3></h4>' ;
      echo '<h4>Order Id : '.$_POST["ORDERID"].'</h4>';
      echo '<h4>Transaction status :'.'<b>success</b>'.'<br/>'.'</h4>';
      echo '<h4>Time:'.$_POST["TXNDATE"].'</h4>';
		  echo '<h4>Amount paid:'.$_POST["TXNAMOUNT"].'</h4>';
		  echo '<img src='.$imgsource.'>';
	}
	else {
		echo "<h4>Payment failure <br>please try again later</h4>" . "<br/>";
	}?>
		         
        </div>
      </div>
      </body>
</html>
