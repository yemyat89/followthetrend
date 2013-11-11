<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "insert into feedback values('".$_GET['name']."','".$_GET['email']."','".$_GET['data']."')";	
$flag = doQuery($query);	
$_SESSION["feed"]="finish";	
header( 'Location: '.$FEEDBACK );
?>