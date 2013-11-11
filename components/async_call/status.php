<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "select trend_id from trend where name='".$_SESSION["talkname"]."'";
$result = doQuery($query);
$rows = getResult($result);
$trend_id = $rows[0][0];s

$r = "User id is ".$_SESSION['userid']." -> ";
fwrite($fh, $r);
$wr = "Here is => ".$_SESSION["talkname"];
$current = date("Y-m-d H:i:s",time()-date("Z"));
$query = "update trend_user set latest='$current' where user_id='".$_SESSION["userid"]."' and trend_id='$trend_id' and flag='0'";
$flag = doQuery($query);


?>