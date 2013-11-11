<?
$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
$query = "insert into latest_shown values ('".$_SESSION["userid"]."', '".$gmt."')";
$flag = doQuery($query);
if(!$flag){
	$query = "update latest_shown set time='".$gmt."' where user_id='".$_SESSION["userid"]."'";
	doQuery($query);
}
?>