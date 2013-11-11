<?
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

$dbname = 'talking';
mysql_select_db($dbname);

function doQuery($query){
	$result = mysql_query($query);
	return $result;
}

function getResult($result)
{
	$toReturn = array();
	while($row = mysql_fetch_array($result)){		
		array_push($toReturn,$row);
	}
	return $toReturn;
}
function closedb(){
	$conn.close;
}
?>
