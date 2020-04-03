<?php
$no;
switch($_GET["FwcMo"])
{
  case "54esmdr0qf" :
      $event = "Cultural";
      $no = 1;
      break;
      case "55esmdr1qf" :
      $event = "Technical";
      $no = 2;
      break;
      case "56esmdr2qf" :
      $event = "Entertainment";
      $no = 3;
      break;
      case "57esmdr3qf" :
      $event = "Literature";
      $no = 4;
      break;
      default:
      $event = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="../assets/images/saavyas-font.png">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Saavyas'19</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caudex">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/reg.css">
</head>
<body>

<div class="bg-contact100" >
<div class="container-contact100">
  <div class="wrap-contact100">
    <div class="contact100-pic js-tilt" data-tilt>
      <img src="assets/images/img-01.png" alt="IMG">
    </div>

    <form class="contact100-form validate-form" action="register.php" method="POST">
      <span class="contact100-form-title">
      <h1 class="text-dark text-center"><?php echo $event;?></h1>
      <p class="text-dark text-center">For group events, enter the name of the teamleader</p>
      <p class="text-dark text-center">NOTE:All participants must be students of govt. approved college</p>
      </span>
      <div class="wrap-input100 validate-input" data-validate = "Name is required">
        <input class="input100" type="text" name="name" placeholder="Name">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-user" aria-hidden="true"></i>
        </span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
      </div>
      <div class="wrap-input100 validate-input" data-validate = "Phone number is required">
        <input class="input100" type="text" name="phone" placeholder="Phoneno.">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-phone" aria-hidden="true"></i>
        </span>
      </div>
      <div class="wrap-input100 validate-input" data-validate = "college name is required">
        <input class="input100" type="text" name="college" placeholder="college name">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-university" aria-hidden="true"></i>
        </span>
      </div>
      <div class="wrap-input100">
        <select class="input100" name="event">
          <?php
          switch($no)
          { 
            case 1:
            echo '<option value="all" class="option">ALL EVENTS</option>';
            break;
            case 2:
             echo '<option value="rw" class="option">Robo Wars</option><br><option value="rr" class="option">Robo race</option><br><option value="rs" class="option">Robo soccer</option><br><option value="pg" class="option">Programmatics</option><br> <option value="lf" class="option">Line follower</option>';
             break;    
             case 3:
             echo '<option value="pc" class="option">Pro-cricket</option><br><option value="ce" class="option">Chunin exam</option><br><option value="fs" class="option">Futsal</option><br><option value="tow" class="option">Tug of war</option><br> 
             <option value="ipl" class="option">IPL auction</option><br><option value="mm" class="option">Marauder map</option><br><option value="baz" class="option">Bazinga</option><br><option value="tv" class="option">Trivium</option><br><option value="bc" class="option">Binge challenge</option><br><option value="ip" class="option">In-fest photography</option>
             <br><option value="cs" class="option">Counter Strike</option><br><option value="nfs" class="option">NFS</option><br><option value="fifa" class="option">FIFA</option><br><option value="pubg" class="option">PUBG</option>';
             break;   
             case 4:
             echo '<option value="fth" class="option">Feel the heat</option><br><option value="tc" class="option">Turn coat</option>';
             break;         
          }
          ?>
        </select>
      
      </div>

      <div class="container-contact100-form-btn">
        <button class="contact100-form-btn" name="submit" type="submit"> 
        pay & register
        </button>
      </div>
    </form>

    
  </div>
<p style="color:white">please contact the developer regarding registration issues<br>Nag Charan : <a href="tel:+918499085120" style="color:#74B9FF">+91 8499085120</a> or <a href="mailto:tech@saavyas.org" style="color:#74B9FF">tech@saavyas.org</a></p>
</div>
</div>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="assets/js/tilt.jquery.min.js"></script>
<script >
$('.js-tilt').tilt({
  scale: 1.1
})
</script>
<script src="assets/js/main.js"></script>
<script src="../assets/js/particles.js"></script> 
	<script src="../assets/js/main.js"> </script> 
</body>
</html>