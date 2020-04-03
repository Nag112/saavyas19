<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


$gname = $_POST["name"];
// $sname = $_POST["name2"];
// $tname = $_POST["name3"];
// $fname = $_POST["name4"];
$email = $_POST["email"];
$college = $_POST["college"];
$phone =$_POST["phone"];
$ORDER_ID = "SAAVS".rand(100000,999999) ;
$CUST_ID = "CUST".rand(100000,999999);
$txn_status = "spot";
$time = date("Y-m-d h:i:s");
switch($_POST["event"])
{
 
  case "rw":
  $type = "technical";
  $event = "robowar";
  $TXN_AMOUNT = 500;
  break ;
  case "rr":
  $type = "technical";
  $event = "roborace";
  $TXN_AMOUNT = 150;
  break ;
  case "rs":
  $type = "technical";
  $event = "robosoccer";
  $TXN_AMOUNT = 150;
  break ;
  case "pg":
  $type = "technical";
  $event = "programmatics";
  $TXN_AMOUNT = 50;
  break ;
  case "lf":
  $type = "technical";
  $event = "linefollower";
  $TXN_AMOUNT = 150;
  break ;
  case "pc":
  $type = "entertainment";
  $event = "procricket";
  $TXN_AMOUNT = 150;
  break ;
  case "ce":
  $type = "entertainment";
  $event = "chuninexam";
  $TXN_AMOUNT = 100;
  break ;
  case "fs":
  $type = "entertainment";
  $event = "futsal";
  $TXN_AMOUNT = 400;
  break ;
  case "tow":
  $type = "entertainment";
  $event = "tugofwar";
  $TXN_AMOUNT = 250;
  break ;
  case "ipl":
  $type = "entertainment";
  $event = "iplauction";
  $TXN_AMOUNT = 150;
  break ;
  case "mm":
  $type = "entertainment";
  $event = "maraudersmap";
  $TXN_AMOUNT = 150;
  break ;
  case "buz":
  $type = "entertainment";
  $event = "bazinga";
  $TXN_AMOUNT = 100;
  break ;
  case "tv":
  $type = "entertainment";
  $event = "trivium";
  $TXN_AMOUNT = 100;
  break ;
  case "bc":
  $type = "entertainment";
  $event = "bingechallenge";
  $TXN_AMOUNT = 100;
  break ;
  case "ip":
  $type = "entertainment";
  $event = "infestphotography";
  $TXN_AMOUNT = 50;
  break ;
  case "cs":
  $type = "entertainment";
  $event = "counterstrike";
  $TXN_AMOUNT = 300;
  break ;
  case "fifa":
  $type = "entertainment";
  $event = "fifa";
  $TXN_AMOUNT = 80;
  break ;
  case "nfs":
  $type = "entertainment";
  $event = "nfs";
  $TXN_AMOUNT = 80;
  break ;
  case "pubg":
  $type = "entertainment";
  $event = "pubg";
  $TXN_AMOUNT = 50;
  break ;
  case "fth":
  $type = "literature";
  $event = "feeltheheat";
  $TXN_AMOUNT = 50;
  break ;
  case "tc":
  $type = "literature";
  $event = "turncoat";
  $TXN_AMOUNT = 50;
  break ;
  case "ps":
  $type = "literature";
  $event = "picasso";
  $TXN_AMOUNT = 0;
  break ;
  default:
  $type="none";
  $event = "nan";
  $TXN_AMOUNT = 0;
  break ;
}

$db = mysqli_connect("162.251.85.72","saavyas_admin","Nagacharan@1","saavyas_new") or die("cannot select DB");    
$sql="INSERT INTO registration (event,type,name,email,college,orderid,custid,phone,time,txnstatus) values ('$event','$type','$gname','$email','$college','$ORDER_ID','$CUST_ID',$phone,'$time','$txn_status')";  
if(mysqli_query($db,$sql))
mysqli_close($db);

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
    
    
      echo '<h4>You have successfully registered for the event <h3>'.$event;'</h3></h4>' ;
      echo '<h4>Order Id : '.$ORDER_ID.'</h4>';
      echo '<h4>Name: '.$gname.'</h4>';
      echo '<h4>Time:'.$time.'</h4>';
  
     
 
  ?>
             
        </div>
      </div>
      </body>
</html>
