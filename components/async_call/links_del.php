<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$_SESSION["trend"] = $_SESSION["talkname"];

$query = "select * from trend_user where user_id='".$_SESSION["userid"]."'";
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

$query = "delete from link where link_id='".$_POST["id"]."'";
$flag = doQuery($query);	

if($flag){	
	$query = "delete from user_link where link_id='".$_POST["id"]."'";
	$flag2 = doQuery($query);	
}	
else
	echo "Fail";

$current = date("Y-m-d H:i:s",time()-date("Z"));
$query = "update trend set created_at='".$current."' where name='".$_SESSION["trend"]."'";
$flag = doQuery($query);
?>