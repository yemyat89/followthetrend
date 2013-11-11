<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();
$email = $_GET["email"];
$md = $_GET["key"];

$query = "select * from user where password='".$md."'";
$result = doQuery($query);
$rows = getResult($result);
if(count($rows)<1)
{
	echo '
	<script>
		parent.location = "'.$INDEX.'"
	</script>
	';
}

if(isset($_POST['signup']))
{	
	try{
				
		$query = "update user set password='".md5($_POST['password'])."' where email='".$email."'";		
		$flag = doQuery($query);		
		$_SESSION['modify'] = "ok";
	}
	catch(Exception $ex)
	{
		echo 'Incorrect username or password.';
	}
}

$query = "select * from user where user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);
$user = $rows[0];
?>