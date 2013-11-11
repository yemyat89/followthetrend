<?
$term = $_GET["query"];
$pos = strpos($term,"@");
if($pos){
	
	$query = "select * from user where email='".$term."'";
	$result = doQuery($query);
	$rows= getResult($result);
	

}
else{
	$query = "select * from user where name like '%".$term."%'";
	$result = doQuery($query);
	$rows= getResult($result);
	

}
?>