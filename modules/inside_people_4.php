<?
$query = "select * from user order by rand()";
$result = doQuery($query);
$list_user = getResult($result);
		
?>

<table width="100%" border="0" style="margin-top:10px;">
<tr>
<? for($t=0; $t<4 && $t<count($list_user); $t++){ 
	
	$query = "select * from trend_user as tu, trend as t where tu.trend_id=t.trend_id and tu.user_id=".$list_user[$t]["user_id"];
	$result = doQuery($query);
	$tr2= getResult($result);
?>
	<td align="center" valign="middle" width="25%">
	<div style="border:solid grey thin">
		<a href="<? echo $PROFILE; ?>?pid=<? echo $list_user[$t]["user_id"]; ?>"><img style="border:dotted thin; margin-top:20px;" src="<? echo $list_user[$t]["photo"]; ?>" width="70px" height="70px" /></a>
		<p>
		<a href="<? echo $PROFILE; ?>?pid=<? echo $list_user[$t]["user_id"]; ?>"><? echo $list_user[$t]["name"]; ?></a><br/>
		<? if($tr2!=NULL){ ?><a href="<? echo $TREND; ?>?tname=<? echo urlencode($tr2[0]["name"]); ?>"><? echo $tr2[0]["name"]; ?></a><? } else{ ?> <i>(no trend) </i><? } ?>
		</p>
	</div>
	</td>
<? } ?>
</tr>
</table>