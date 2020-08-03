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

$f = fopen("copy.csv", "r");

$fr = fread($f, filesize("copy.csv"));
fclose($f);
$lines = array();
$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of...
$cells = array();
$len= count($lines)-2;
$cells = explode(",",$lines[$len]);


$output = '<html><body>';
$output .=  '<table border="1"><tr><th>Timestamp</th><th>Component</th><th>Reason for alarm</th><th>Nature</th><th>Senor type</th><th>Range</th><th>Alarm occurrence</th><th>Alarm type</th><th>Action needed</th></tr>';
$output .= '<tr>';
for($k=0;$k<count($cells)-1;$k++)
		{
		$output .= '<td>'.$cells[$k].'</td>'; }
		
$output .= '</tr></table></body></html>';
//$mail->addCC("user.3@ymail.com","User 3");
//$mail->addBCC("user.4@in.com","User 4");


$mail->Subject = "Critical alert!";
$mail->Body = 
"Hi ,<br/><br/> Critical alert generated due to '.$cause.'<br/>
'.$output.'
";

if(!$mail->Send())
    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else{
//echo "Message has been sent";		
	}
	
	
?>
<script>  </script>
</body>
</html>
