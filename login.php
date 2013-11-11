<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_LOGIN_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Sign In</title>

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
		<p>
		<?
		
		if($_SESSION["login"]=="success"){ ?>
		<div id="prompt_login"><h3>Your resgistration was successful. We have sent an email to activate your account.</h3></div>
		<? } 
		else if($_SESSION["status"]=="error"){ ?>
		<div id="prompt_login"><h3>Incorrect Username or Password.</h3></div>
		<?
		}
		else if($_SESSION["active"]=="yes"){ ?>
		<div id="prompt_login"><h3>Your account is activated and can be used now.</h3></div>
		<?
		}
		?>
		</p>

		<div style="margin-left:90px;" align="left"><h1>Sign In</h1></div>
		
		
		<div class="loginbox">
		<form name="new" method="post" action="<? echo $LOGIN_PROCESS; ?>">
		<table align="center" cellspacing="6">
 	 		<tr>
			    <td>Username</td>
			    <td valign="middle">
      				
			        <input name="username" type="text" size="30" />
        			</td>
  			</tr>
  			<tr>
    			<td valign="middle">Password </td>
    			<td><input name="password" type="password" size="30" /></td>
  			</tr>
  			<tr>
    			<td>&nbsp;</td>
    			<td align="right">
      				<label>
      				<input type="submit" name="submit" value="Sign in" />
      				</label>
     			</td>
  			</tr>
  			<tr>
    		<td colspan="2">
            <input type="checkbox" name="remember" /> Remember me |
            &nbsp;<a href="<? echo $FORGET_PASSWORD; ?>">Forgot password?</a>                      
            </td>
   
 			</tr>
		</table>
        
		</form>
		</div>
        
		<div style="margin-top:20px;margin-left:78px;">
		<a href="<? echo $SIGNUP; ?>"><img src="<? echo $IMAGE_DIR; ?>reg2.png" width="450" height="90"/></a>
		</div>
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
<p>&nbsp;</p>
</div>	



<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
?>

<? 
unset($_SESSION["login"]);
unset($_SESSION["status"]);
unset($_SESSION["active"]);
?>

</body>
</html>
