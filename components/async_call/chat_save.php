<?
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
$_SESSION["trend"] = $_GET["tname"];
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
if($_SESSION["talkname"] != $_GET["tname"] || $_SESSION["userid"]=="")
{
	//Do nothing
}
else{
	$current = date("Y-m-d H:i:s",time()-date("Z"));
	$query = "insert into chat values(NULL,'".$current."','".$_GET['words']."','".$_SESSION['trend']."')";	

	$flag = doQuery($query);	
	if($flag){	
		$query = "select chat_id from chat where words='".$_GET['words']."' and chtime='$current'";	
		$result = doQuery($query);
		$rows = getResult($result);
		$chat_id = $rows[0][0];
		
		$query = "insert into user_chat values ('".$_SESSION["userid"]."','$chat_id')";
		$flag2 = doQuery($query);	
	}			

	$current = date("Y-m-d H:i:s",time()-date("Z"));
	$query = "update trend set created_at='".$current."' where name='".$_SESSION["trend"]."'";
	$flag = doQuery($query);
}
?>