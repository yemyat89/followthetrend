<?
session_start();
if($_SESSION["userid"]==""){	
	header( 'Location: '.$LOGIN );
	die();
}
if(isset($_POST['title']))
{
	$title = $_POST['title'];
}
else{
	$title = $_GET['title'];
}

if(trim($title)==""){
	header( 'Location: '.$INDEX ) ;
	die();
}

$current = date("Y-m-d H:i:s",time()-date("Z"));

$query = "insert into trend values(NULL,'$title','".$current."')";
$flag = doQuery($query);

if($flag)
{
	$tname = urlencode(stripslashes($title));
	header( 'Location: '.$TREND.'?tname='.$tname ) ;
}
else
{
	$tname = urlencode($title);
}
?>