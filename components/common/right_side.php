<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
?>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $RIGHT_SIDE_SCRIPT; ?>"></script>

<div class="" style="border:solid; border-color:#999; border-width:2px; margin-top:0px; margin-right:0px; margin-left:10px; background-color:#FFFF77;">
	<table width="100%" border="0" cellspacing="0">
        <tr>
            <td width="220" height="36"><font class="title">Popular on Twitter</font></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" height="220" valign="top">	
			  	<div id="loading2_1" style="margin-top:80px; margin-left:140px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
				<div style="padding:10px;" id="twitter_trend">
	        	</div>
			</td>
        </tr>
    </table>
</div>

<div class="" style="background-color:#FFFF77; margin-top:20px; margin-right:0px; margin-left:10px; border:solid; border-color:#999; border-width:2px;">
	<table width="100%" border="0" cellspacing="0">
        <tr>
            <td width="220" height="36"><font class="title">Popular Trends </font></td>
        </tr>
        <tr>
            <td bgcolor="#FFFFFF" valign="top" height="220">
			  	<div id="loading2" style="margin-top:80px; margin-left:140px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
				<div style="padding:10px;" id="popularTrend">
	        	</div>
			</td>
        </tr>
	</table>
</div>
