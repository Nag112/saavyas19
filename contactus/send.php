      <?php
    $email_to = "hospitality@saavyas.org";
    $email_subject = "Hi I have a query";
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required 
    $email_message = "Form details below.\n\n";   
    function clean_string($string) {
      return $string;
   }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Query : ".clean_string($message)."\n";
 
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$retval = mail($email_to, $email_subject, $email_message, $headers);  
    if( $retval == true ) {
            $var = "Message sent successfully...";
         }else {
            $var = "Message could not be sent please try again later...";
         }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Saavyas'19</title>
    <meta name="theme-color" content="#000000">
<style>
@import url("https://fonts.googleapis.com/css?family=Caudex");

.success-page {
  width: 360px;
  padding: 15% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  border:#01CBC6 2px solid;
  max-width: 360px;
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
h2
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
    position: fixed;
    top:5%;
    left:95%;
    color:white;
    text-decoration: none;
    z-index: 150;
}
@media only screen and (max-width: 462px) 
{
    .log
    {
        left:90%;
    }
  }
</style>
</head>
<body>
   <a href="../../"><i class="log fa fa-home" style="font-size:28px;" ></i></a>
    <div class="success-page">
        <div class="form">
         <h2><?php echo $var;?> </h2>          
        </div>
      </div>
      </body>
</html>
