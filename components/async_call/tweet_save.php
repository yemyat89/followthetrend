<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

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

$num = $_POST["count"];
$result = $_SESSION["fav".$num];

$user= $result->from_user;
$text_n= addslashes($result->text);
$res_str= $result->created_at;
$image= $result->profile_image_url;

$query = "insert into favourite values('NULL','".$user."','".$text_n."','".$res_str."','".$image."','".$_SESSION["trend"]."')";
echo $query."<br/>";
$flag = doQuery($query);	
echo $flag;
$current = date("Y-m-d H:i:s",time()-date("Z"));
$query = "update trend set created_at='".$current."' where name='".$_SESSION["trend"]."'";
$flag = doQuery($query);
?>