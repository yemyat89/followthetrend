<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
?>

<table align="center" width="350" id="chat_box" style="display:none; position:fixed; bottom:31px; right:0px;" height="65" border="1" cellspacing="0">
    <tr>
		<td bgcolor="#CCCCCC" align="right">
		<div style="float:left">
		Post something on Bulletin Board
		</div>
		<a href="#" id="chat-close">X</a>
		</td>
    </tr>
 	<tr>
		<td align="center" width="100%" height="65px" style="background-color:#FFF" class="chatinput">     
			<div align="center" style="background-color:#FFF">
				<table style="background-color:#FFF">
					<tr>
						<td>
						<input name="words" style="font-family: sans-serif; font-size: 14px;" onkeydown="if (event.keyCode == 13) document.getElementById('talk_box').click()" id="input_ch" type="text" size="30" maxlength="80" />
						</td>
						<td>
						<button id="talk_box">Talk</button>
						</td>
					</tr>
				</table>
			</div>
		</td>
  	</tr>
</table>

<div style="display:none" id="checker"></div>

<div class="footer2">
	<table width="100%">
		<tr>
			<td valign="middle">
			<a class="r" id="online-link2" href="#"><img style="margin-bottom:-3px;" src="<? echo $IMAGE_DIR; ?>onlineppl.png" title="People who are interested in this trend" width="20" height="15" /></a> |
			 <a href="#" id="chat-link"><img style="margin-bottom:-3px;" src="<? echo $IMAGE_DIR; ?>Talk.jpg" title="Post on the Bulletin" width="18px" height="15px" /></a> | <a title="Share links that you find interesting for the people in the talk" id="share-link" href="#">Links</a> | <a title="Stop following this trend" href="<? echo $LEAVE; ?>">Leave</a> | <a href="<? echo $LOGOUT; ?>">Sign out</a><? if($_SESSION["userid"]!=""){echo ' | <a href="'.$SETTINGS.'"><em>'.$_SESSION["username"].'</em></a>';} ?>&nbsp;&nbsp;
			</td>
		</tr>
	</table>
</div>
