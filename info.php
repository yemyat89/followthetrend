<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_INFO_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | About Us</title>
<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>

</head>
<body class="main">

<div class="header">
<?
include($_SERVER["DOCUMENT_ROOT"].$MENU);
?>
</div>

<div class="middle" align="center">

    <table class="maintable" cellspacing="0">
    <tr>
      <td class="mainleft"> 	
			
			<div align="left" id="aboutus_main">
			<?
			include($_SERVER["DOCUMENT_ROOT"].$INSIDE_INFO_2);
			?>
			</div>
			
			
			
				
		
	 </td>
     <td class="mainright">
     
  	 <?
		include($_SERVER["DOCUMENT_ROOT"].$RIGHT_SIDE);
	 ?>		         
      	 
  </td>
  </tr>
  </table>
<?
include($_SERVER["DOCUMENT_ROOT"].$LOWER);
?>
  <p>&nbsp;</p>
 
</div>	

<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
?>



</body>
</html>
