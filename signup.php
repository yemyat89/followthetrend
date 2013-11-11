<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_SIGNUP_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Sign Up</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $SIGNUP_SCRIPT; ?>"></script>

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
        
		
		<div class="title" style="padding-top:0px; margin-left:30px; padding-bottom:10px;">Register The New Account</div>
		
		
		<div align="left" class="signup">
		<span class="error" id="all_err"></span>
		<form method="post" enctype="multipart/form-data" onsubmit="return validate(this)" action="<? echo $TEMp_REG; ?>">
	    <table border="0" cellspacing="5">
                  <tr>
                    <td align="left" valign="top">Username* </td>
                    <td valign="top"><label></label>
                      <input name="username" maxlength="25" type="text" style="width:100%" /><br/>					
					</td>
                  </tr>
				  <tr>
                    <td align="left" height="30" valign="top">Password* </td>
                    <td valign="top"><label></label>
                    <input name="password" type="password" maxlength="25" style="width:100%"  /></td>
                  </tr>
				  <tr>
                    <td align="left" height="30" valign="top">Confirm Password* </td>
                    <td valign="top"><label></label>
                    <input name="password2" type="password" style="width:100%" maxlength="25" /><br/>
					<span class="error" id="pwd_err"></span>
					</td>
                  </tr>
				  <tr>
                    <td align="left" height="29" valign="top">Email* </td>
                    <td valign="top"><label>
                      <input name="email" type="text" maxlength="60" style="width:100%"  /><br/>
					<span class="error" id="email_err"></span>
                     
                    </label>
                    
                     </td>
                  </tr>
				  
				  
				  <tr>
                    <td align="left" height="29" valign="top">Photo </td>
                    <td valign="top"><label>
					 
                      <input  style="width:100%" name="uploaded_file" type="file" ACCEPT="text/html" />
					  
					  <div style="font-size:14px; font-weight:normal; font-style:italic">Under 350KB and JPEG,GIF or PNG.</div>
                     
                    </label>
                    
                     </td>
                  </tr>
				  
				  <tr>
                    <td align="left" height="29" valign="top">About you <div style="font-size:14px; font-weight:normal; font-style:italic">&nbsp;(250 words)</div></td>
                    <td valign="top"><label>
                      <textarea name='about'  onkeypress="return imposeMaxLength(this, 250);" style="width:100%; height:80px" ></textarea>
                     
                    </label>
                    <br/>
                     </td>
                  </tr>
				  
				  <tr style="display:normal">                    
                    
                    <td style="border-top:none; padding-top:10px;" colspan="2" width="314" valign="top"><label></label>
                    
					<input type="checkbox" name="terms" /> I agree <a href="<? echo $TERMS; ?>">terms and conditions</a>.<br/>
					<span class="error" style="margin-left:10px;" id="term_err"></span>
                    </td>
                    
                  </tr>
				  
				  <tr>                    
                    <td style="padding-right:0px;" align="right" colspan="2" width="314" valign="top"><label></label>
					<input type="submit" name="signup" value="Sign Up" />
                    </td>
                  </tr>
        </table>
		</form>
		
	 </div>
	 
	 
	 
	 </td>
     <td class="mainright">
          
          <?
		include($_SERVER["DOCUMENT_ROOT"].$RIGHT_SIDE);
		?>
       
     
  </td>
</td></tr></table>
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
