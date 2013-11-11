<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

try{
$st = urldecode($_GET["tname"]);
$query = "select trend_id from trend where name='".$st."'";
$result = doQuery($query);
$rows = getResult($result);
$trend_id = $rows[0][0];

$query = "select count(*) from trend_user where trend_id='".$trend_id."'";
$result = doQuery($query);
$rows = getResult($result);

$num = $rows[0][0];
}
catch(Exception $ex){
	echo "Error Occured";
}
if($num == 1){ echo 'Only you are interested in this trend.';}
else{echo $num.' people are interested in this trend.';}

?>