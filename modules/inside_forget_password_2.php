<?
$email = $_POST["email"];
$query = "select * from user where email='".$email."'";
$result = doQuery($query);
$rows = getResult($result);

if(count($rows)>0)
{
	$data = $rows[0];
	$username = $data["name"];
	$password = $data["password"];
	
					
	// Mail
	require($_SERVER["DOCUMENT_ROOT"]."/".$BASE_DIR."phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "yemyatthein@gmail.com"; // SMTP username
	$mail->Password = "yemyat"; // SMTP password
	$webmaster_email = "yemyatthein@gmail.com"; //Reply to this email ID
	$email= $_POST['email']; // Recipients email ID
	$mail->From = $webmaster_email;
	$mail->FromName = "FollowTheTrend";
	$mail->AddAddress($email,$name);
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = "Your account information";
	$mail->Body = "Hi,<br/>
	<p>
	Here is the link to reset your password.
	</p>
	<br/>
	<p>
	".$DOMAIN.$BASE_DIR."/".$RESET."?email=".$_POST['email']."&key=".$password."
	<br/>
	Best Regards,<br/>
	FollowTheTrend Team"
	; //HTML Body				
	$mail->Send();
	// -------------------------
	echo '<div align="center" style="background-color:#FFFF33"><h3>';
	echo "The links to reset your password has been sent to your email";
	echo '</h3></div>';
}
else
{
	echo '
	<div align="center" style="background-color:#FFFF33"><h3>Sorry. There is no user with this email address.</h3></div>
	';
}
?>