<html>
<body>
<?php
//ini_set( "display_errors", 0); 
require "PHPMailer-master/PHPMailerAutoload.php";

$cause = $_SESSION['cause'];

$email=$_SESSION['email'];
					
										$name=$_SESSION['name'];

								
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
/*$mail->Port = 587;
$mail->SMTPSecure = 'tls';*/


$mail->Username = "chinukkinage@gmail.com";
$mail->Password = "CHINU@G.CO.IN";
// if you are going to send HTML formatted emails
$mail->SingleTo =true;
$mail->IsHTML(true);  // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "chinukkinage@gmail.com";
$mail->FromName = "Alarm management system";
$mail->addAddress($email,"User 1");

//$mail->addCC("user.3@ymail.com","User 3");
//$mail->addBCC("user.4@in.com","User 4");

$mail->Subject = "Critical alert!";
$mail->Body = 
"Hi ,<br/><br/> Critical alert generated due to '.$cause.'<br/>";

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else{
//echo "Message has been sent";		
	}
	
	
?>
<script>  </script>
</body>
</html>
