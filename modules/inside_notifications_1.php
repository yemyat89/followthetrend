<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();
if($_SESSION["userid"]=="")
{
	echo '
	<script>
		parent.location = '.$LOGIN.'
	</script>
	';
}
?>