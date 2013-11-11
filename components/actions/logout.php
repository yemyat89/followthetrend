<?
session_start();
session_destroy();
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
   setcookie("username", "", time()-60*60*24*100, "/");
   setcookie("password", "", time()-60*60*24*100, "/");
}

header( 'Location: '.$INDEX ) ;
?>