<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "select * from user where user_id='".$_SESSION['userid']."'";
$result = doQuery($query);
$user = getResult($result);	

if(isset($_GET["use_default"])){
	if($user[0]["photo"]!=$USER_PHOTO_DB."default.gif")
	{
		$myFile = $user[0]["photo"];
		unlink($_SERVER["DOCUMENT_ROOT"].$myFile);
	}
				
	$query = "update user set photo='".$USER_PHOTO_DB."default.gif' where user_id='".$_SESSION["userid"]."'";	
	doQuery($query);
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$PROFILE.'?pid='.$_SESSION["userid"].'">';
}
if(isset($_POST["upload"])){
//var_dump($_FILES["uploaded_file"]);
	if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
		//Check if the file is JPEG image and it's size is less than 350Kb
		$filename = basename($_FILES['uploaded_file']['name']);
		$ext = substr($filename, strrpos($filename, '.') + 1);		
		
		if (((($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg")) || (($ext == "gif") && ($_FILES["uploaded_file"]["type"] == "image/gif")) || (($ext == "png") && ($_FILES["uploaded_file"]["type"] == "image/png"))) && ($_FILES["uploaded_file"]["size"] < 350000)) {
			//Determine the path to which we want to save this file
			
			$filename = '('.$_SESSION['username'].") ".$filename;	
			$newname = $USER_PHOTO_UPLOAD.$filename;
			//Check if the file with the same name is already exists on the server
				  
   		    //Attempt to move the uploaded file to it's new place
			if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {

				if($user[0]["photo"] != $USER_PHOTO_DB."default.gif")
				{
					$myFile = $user[0]["photo"];
					unlink($myFile);
				}
				
				$query = "update user set photo='".$USER_PHOTO_DB.$filename."' where user_id='".$_SESSION["userid"]."'";
				doQuery($query);
				echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$PROFILE.'?pid='.$_SESSION["userid"].'">';
			} else {
				echo '<div style="margin-left:250px; margin-top:50px; width:750px; background-color:#FFFF33">';
				echo '<div align="center" style=""><h3>Problem with file upload. Please try again.</h3></div>';	
				echo '<div align="right" style="margin-right:80px;"><a style="font-size:20px;" href="'.$PROFILE.'?pid='.$_SESSION["userid"].'">Go back to profile</a></div>'; 
				echo '</div>';		
			}
		}
		else {
				echo '<div style="margin-left:250px; margin-top:50px; width:750px; background-color:#FFFF33">';
				echo '<div align="center" style=""><h3>Error: Only .jpg or .gif or .png images under 350Kb are accepted for photo.</h3></div>';	
				echo '<div align="right" style="margin-right:80px;"><a style="font-size:20px;" href="'.$PROFILE.'?pid='.$_SESSION["userid"].'">Go back to profile</a></div>'; 
				echo '</div>';		
			}
	}
			
	else {
			
				echo '<div style="margin-left:250px; margin-top:50px; width:750px; background-color:#FFFF33">';
				echo '<div align="center" style=""><h3>No file is uploaded.</h3></div>';	
				echo '<div align="right" style="margin-right:80px;"><a style="font-size:20px;" href="'.$PROFILE.'?pid='.$_SESSION["userid"].'">Go back to profile</a></div>'; 
				echo '</div>';		
	}
	
}
if(isset($_GET["submit_about"])){
	$query = "update user set about='".$_GET["about_me"]."' where user_id='".$_SESSION["userid"]."'";
	$result = doQuery($query);	
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$PROFILE.'?pid='.$_SESSION["userid"].'">';
}
?>