<?php
if(!defined('InEmpireCMS'))
{
        exit();
}
if($returnshowplnum==1)//返回总评论数显示
{
	echo $num."<!--empirecms.infocomment-->";
}
?>
<?php
$plstep=$num-$page*$line;//起始楼层
while($r=$empire->fetch($sql))
{
	$plusername=$r[username];
	if(empty($r[username]))
	{
		$plusername='匿名';
	}
	if($r[userid])
	{
		$plusername="<a href='$public_r[newsurl]e/space/?userid=$r[userid]' target='_blank' class='c4095ce'>$r[username]</a>";
	}
	$saytime=date('Y-m-d H:i:s',$r['saytime']);
	$m=$empire->fetch1("select userpic from {$dbtbpre}enewsmemberadd where userid='$r[userid]' limit 1");
	$userpic=$m['userpic']?$m['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';

	//ip
	$sayip=ToReturnXhIp($r[sayip]);
	$saytext=RepPltextFace(stripSlashes($r['saytext']));//替换表情
	$includelink=" onclick=\"replyComment(".$r[plid].")\"";
?>

				<li class="pl<?=$r[plid]?>">
                	<a href="<?=$public_r[newsurl]."e/space/?userid=".$r[userid]?>" class="tx fl" target="_blank"><img src="<?=$userpic?>" class="lazy" width="48" height="48"/></a>
                    <div class="plnr f14">
                    	<?=$plusername?> <em><abbr class="time" title="<?=$saytime?>"><?=$saytime?></abbr></em>
                        <span>
                        	<?=$saytext?>
                        </span>
                        <span class="pldig right"> <a href="JavaScript:makeRequest('<?=$public_r[newsurl]?>e/pl/doaction.php?enews=DoForPl&doaction=<?=$doaction?>&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=1&doajax=1&ajaxarea=zcpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">支持</a>(<em id="zcpldiv<?=$r[plid]?>"><?=$r[zcnum]?></em>) | <a href="JavaScript:makeRequest('<?=$public_r[newsurl]?>e/pl/doaction.php?enews=DoForPl&doaction=<?=$doaction?>&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=0&doajax=1&ajaxarea=fdpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">反对</a>(<em id="fdpldiv<?=$r[plid]?>"><?=$r[fdnum]?></em>) | <a href="javascript:"<?=$includelink?>>回复</a></span>
                    </div>
                    <div class="louceng"><?=$plstep?>#</div>
<div class="replyComment" id="replyComment<?=$r[plid]?>">
<form method="post" name="saypl" id="saypl">
<input name="username" type="hidden" id="username" value="<?=$r[username]?>"/>
<input name="id" type="hidden" id="id" value="<?=$id?>" />
<input name="classid" type="hidden" id="classid" value="<?=$classid?>" />
<input name="enews" type="hidden" id="enews" value="AddPl" />
<input name="repid" type="hidden" id="repid" value="<?=$r[plid]?>" />
<textarea name="saytext" id="saytext"></textarea>
<div class="plsub"><span></span><input name="" type="button" value="评论" class="button small blue yh" onclick="addPl();"/> <a href="javascript:void();" onClick="closepl(<?=$r[plid]?>)" class="closepl">取消</a></div>
</form>
</div>
                </li>
      
<?php
	//楼层
	$plstep=$plstep-1;
}
?>
<div id="ecmspage">
<?=$listpage?>
</div>