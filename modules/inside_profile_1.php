<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 

session_start();

$current_user_id = $_SESSION["userid"];
$profile_id = $_GET['pid'];

//Exist or not
if(!is_numeric($profile_id))
{
	$query = "select * from user where name='".$profile_id."'";
	$result = doQuery($query);
	$user = getResult($result);	
	
	$profile_id = $user[0]["user_id"];
}
else
{
	$query = "select * from user where user_id='".$profile_id."'";
	$result = doQuery($query);
	$user = getResult($result);		
}

$profile_name = $user[0]["name"];
?>