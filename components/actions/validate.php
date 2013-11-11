<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$id = $_GET["id"];

$query = "select * from user where password='".$id."'";
$result = doQuery($query);
$user_rows = getResult($result);

if($user_rows != NULL)
{
	$query = "update user set active='1' where user_id='".$user_rows[0]['user_id']."' and password='".$id."'";
	$result = doQuery($query);
	$_SESSION['active'] = "yes";
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$LOGIN.'">';
}
else
{
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url='.$INDEX.'">';
}

?>