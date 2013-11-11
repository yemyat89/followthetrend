<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PEOPLE_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Find People</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>


<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $PPL_SCRIPT; ?>"></script>

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
      <td class="mainleft" align="center" style="margin-left:0px">
	    <br/>
		<div style="margin-left:20px; margin-bottom:5px; color:blue">Name or Email of the person:</div>
		<div class="loginbox" style="margin-left:20px;">
		<form name="new" method="get" action="<? echo $PEOPLE; ?>">
		<table align="center" cellspacing="6">
 	 		<tr>			    
			    <td valign="middle">      				
			        <input name="query" type="text" style="width:350px" />
        		</td>  			
    			<td align="right">
      				<label>
      				<input type="submit" name="submit" value="Search" />
      				</label>
     			</td>
  			</tr>  			
		</table>        
		</form>
		</div>
	<? 
	if($_GET["query"]){ 
			include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PEOPLE_2);			
			if($rows != NULL)
			{
				include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PEOPLE_3);
            }   				
		
		if($rows == NULL){
		?>
        <hr style="margin-right:20px; margin-left:20px;"/>
		<div style="border:dotted thin; width:560px; margin-left:20px; margin-top:10px; padding:10px">
        <i>No result found.</i>
        </div>
        <?
		}
	} 
	
	//Random Pick
	?>
	<hr style="margin-right:20px; margin-top:30px; margin-left:20px;"/>
	<div style="margin-left:20px; margin-right:20px; margin-top:10px; padding:10px; border:none;">
	<div style="font-size:21px; color:blue">Random Pick</div>
	<?
	include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PEOPLE_4);
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
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PEOPLE_5);
?>
</body>
</html>