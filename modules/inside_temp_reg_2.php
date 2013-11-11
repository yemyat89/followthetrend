<?
try{
	$query = "select * from user where name='".$_POST['username']."'";
	$result = doQuery($query);
	$rows = getResult($result);
	if(count($rows)>0){
		$user_dup = true;
	}
	
	$query = "select * from user where email='".$_POST['email']."'";
	$result = doQuery($query);
	$rows = getResult($result);
	if(count($rows)>0){
		$email_dup = true;
	}
	
	if($user_dup)
	{
		echo '<div align="center" style="background-color:#FFFF33"><h3>Username is already used</h3></div>';	
		echo '<div align="right" style="margin-right:15px;"><a href="'.$SIGNUP.'">Go Back To Registration</a></div>';
	}
	else if($email_dup)
	{
		echo '<div align="center" style="background-color:#FFFF33"><h3>Email is already used</h3></div>';	
		echo '<div align="right" style="margin-right:15px;"><a href="'.$SIGNUP.'">Go Back To Registration</a></div>';
	}
			
	else
	{	
		$filename = basename($_FILES['uploaded_file']['name']);
		if($filename == NULL){
			$filename = "default.gif";
		}
		else
		{
			$filename = '('.$username.") ".$filename;	
		}
		$username = $_POST['username'];
		$password = md5($_POST['password']);
				
		$query = "insert into user values(NULL, '".$_POST['username']."','".$password."','".$_POST['email']."', '"."user_photo/".$filename."', '".$_POST['about']."', '0')";		
		$flag = doQuery($query);

		//------Photo Upload-----
		$photo_ok = false;
		if($flag){
		
			if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {			 
			  
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  if (((($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg")) || (($ext == "gif") && ($_FILES["uploaded_file"]["type"] == "image/gif")) || (($ext == "png") && ($_FILES["uploaded_file"]["type"] == "image/png"))) && ($_FILES["uploaded_file"]["size"] < 350000)) {
				
				  $newname = dirname(__FILE__).'/user_photo/'.$filename;
				
				  if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
					 $photo_ok = true;
				
				  } else {
						echo '<div align="center" style="background-color:#FFFF33"><h3>Error: A problem occurred during file photo!</h3></div>';	
						echo '<div align="right" style="margin-right:15px;"><a href="'.$SIGNUP.'">Try again</a></div>';							 
						$query = "delete from user where name='".$_POST['username']."' and email='".$_POST['email']."'";			
						$flag = doQuery($query);
				  }
				  
			  } else {
					echo '<div align="center" style="background-color:#FFFF33"><h3>Error: Only .jpg or .gif or .png images under 350Kb are accepted for photo.</h3></div>';	
					echo '<div align="right" style="margin-right:15px;"><a href="'.$SIGNUP.'">Try again</a></div>';							 
					$query = "delete from user where name='".$_POST['username']."' and email='".$_POST['email']."'";			
					$flag = doQuery($query);
			  }
			} else {
				$photo_ok = true;				
			}
		}
		//-----------------------
		
		
		if($photo_ok){
		
			// Mail--------------------			
			require("/".$BASE_DIR."phpmailer/class.phpmailer.php");
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
			$mail->Subject = "Activate Your Account";
			$mail->Body = "
				Dear User,<br/>
				<p>
				Thank you for registering.We wish you can have fun with our service.
				Your account information is as followed.
				</p>
				<br/>
				<p>
				<strong>Username:</strong> <em>".$username."</em><br/>
				<strong>Password:</strong> <em>".$_POST['password']."</em></p>
				<br/>
				<p>
				Please activate your account by visitng this link <a href='http://localhost/talktweet/validate?id=".$password."'>http://localhost/talktweet/validate?id=".$password."</a>
				</p>
				<br/>
				
				Best Regards,<br/>
				FollowTheTrend Team"
			; //HTML Body			
			$t = $mail->Send();
			//-------------------------
									
			$_SESSION['login'] = "success";
			echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$LOGIN.'">';
		}
	}
}
catch(Exception $ex)
{
	// do nothing
}
?>