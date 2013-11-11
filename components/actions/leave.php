<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "delete from trend_user where user_id='".$_SESSION["userid"]."'";
doQuery($query);

$query = "delete from trend where trend_id not in (select trend_id from trend_user)";
$flag = doQuery($query);

$query = "delete from chat where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from user_chat where chat_id not in (select chat_id from chat)";
$flag = doQuery($query);

$query = "delete from link where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from favourite where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from user_link where link_id not in (select link_id from link)";
$flag = doQuery($query);

header( 'Location: '.$INDEX );
?>