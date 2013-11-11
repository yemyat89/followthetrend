<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FORGET_PASSWORD_1);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>FollowTheTrend | Cannot sign in</title>

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
	    <br/>		
        <?
		if(isset($_POST["submit"]))
		{			
			include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FORGET_PASSWORD_2);
		}
		else
		{
		?>
		<div style="margin-left:20px;" align="left">
        <h1>Forgot password?</h1>
		<form name="new" method="post" action="<? echo $FORGET_PASSWORD; ?>">
		<table cellspacing="6">
 	 		<tr>
			    <td>Your Email: </td>
			    <td valign="top" align="right">
      				
			        <input name="email" type="text" size="25" maxlength="60" />
      				<input type="submit" name="submit" value="Send My Info" />
      				
        		</td>
  			</tr>
		</table>
		</form>
		</div>
		<?
		}
		?>
		</td>
	  <td class="mainright">
		<?
		include($_SERVER["DOCUMENT_ROOT"].$RIGHT_SIDE);
		?>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
<?
include($_SERVER["DOCUMENT_ROOT"].$LOWER);
?>

</div>	

<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FORGET_PASSWORD_3);
?>



</body>
</html>