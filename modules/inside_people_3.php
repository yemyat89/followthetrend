<?
echo '<hr style="margin-right:20px; margin-left:20px;"/>';
                
for($d=0; $d<count($rows); $d++){
	$query = "select * from trend_user as tu, trend as t where tu.trend_id=t.trend_id and tu.user_id=".$rows[$d]["user_id"];
	$result = doQuery($query);
	$tr= getResult($result);	
?>
<div style="border:none; width:560px; margin-left:20px; margin-top:10px; padding:10px">
<table width="100%" border="0">
<tr>
<td width="50px">
<a style='font-size:23px;' href='<? echo $PROFILE."?pid=".$rows[$d]["user_id"]; ?>' >
<img src='<? echo $rows[$d]["photo"]; ?>' width='40px' height='40px' style="border:solid thin" />
</a>
</td>
<td style="border:solid thin; padding-left:10px;">
<span style="font-size:23px;"><? echo "<a style='font-size:23px;' href='".$PROFILE."?pid=".$rows[$d]["user_id"]."'>".$rows[$d]["name"]."</a>"; ?></span> <? if($tr!=NULL){ ?>( interested in the trend <a style="font-size:23px;" href="<? echo $TREND; ?>?tname=<? echo urlencode($tr[$d]["name"]); ?>"><? echo $tr[0]["name"]; ?></a> )<? } else{ ?> <i>(not interested in any trend lately) </i><? } ?>
</td>
</tr>
</table>
</div> 
<?
}
?>