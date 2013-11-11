<?

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$username=$_POST["username"];
$password=md5($_POST["password"]);

if($_POST["remember"]=="on")
{

	setcookie("username",$username,time()+60*60*24*365, "/");
	setcookie("password", $password,time()+60*60*24*365, "/");
}

$query = "select * from user where name='$username' and password='$password' and active='1'";
$result = doQuery($query);
$rows = getResult($result);
//var_dump($rows);
//exit;

if($rows != NULL)
{
	//var_dump($_SERVER);
	session_start();
	$_SESSION["userid"] = $rows[0]["user_id"];
	$_SESSION["username"] = $rows[0]["name"];
	$_SESSION["password"] = $rows[0]["password"];
	header( 'Location: '.$INDEX) ;
	
	
}
else{
	session_start();
	$_SESSION["status"] = "error";
	header( 'Location: '.$LOGIN );
}

?>