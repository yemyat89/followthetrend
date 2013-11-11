<?
include($_SERVER["DOCUMENT_ROOT"].$TWITTER);
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();



if($_SESSION["userid"]=="")
{
	echo '
	<script>
		parent.location = "'.$LOGIN.'"
	</script>
	';
}

if(isset($_POST['update']))
{	
	try{
				
		if($_POST['password'] == NULL)
		{
			$query = "update user set name='".$_POST['username']."', about='".$_POST['about']."', email='".$_POST['email']."' where user_id='".$_SESSION['userid']."'";
		}
		else{
			$query = "update user set name='".$_POST['username']."',password='".md5($_POST['password'])."', about='".$_POST['about']."', email='".$_POST['email']."' where user_id='".$_SESSION['userid']."'";
		}		
		
		$flag = doQuery($query);		
		$_SESSION['modify'] = "ok";
	}
	catch(Exception $ex)
	{
		echo 'Incorrect username or password.';
	}
		
	//$_SESSION['st'] = "success";
	
}

$query = "select * from user where user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);

$user = $rows[0];

?>