<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table class='news-table' cellspacing='0'><tr><td nowrap='nowrap'><label>商品名称</label></td><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
<tr> 
  <td height="25" bgcolor="#FFFFFF">
	<?=$tts?"<select name='ttid'><option value='0'>标题分类</option>$tts</select>":""?>
	<input type=text name=title value="<?=ehtmlspecialchars(stripSlashes($r[title]))?>" size="60"> 
	<input type="button" name="button" value="图文" onclick="document.add.title.value=document.add.title.value+'(图文)';"> 
  </td>
</tr>
<tr> 
  <td height="25" bgcolor="#FFFFFF">属性: 
	<input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>粗体
	<input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>斜体
	<input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>删除线
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"><a onclick="foreColor();"><img src="../data/images/color.gif" width="21" height="21" align="absbottom"></a>
  </td>
</tr>
</table>
</td></tr><tr><td nowrap='nowrap'><label>特殊属性</label></td><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
  <tr>
    <td height="25" bgcolor="#FFFFFF">信息属性: 
      <input name="checked" type="checkbox" value="1"<?=$r[checked]?' checked':''?>>
      审核 &nbsp;&nbsp; 推荐 
      <select name="isgood" id="isgood">
        <option value="0">不推荐</option>
	<?=$ftnr['igname']?>
      </select>
      &nbsp;&nbsp; 头条 
      <select name="firsttitle" id="firsttitle">
        <option value="0">非头条</option>
	<?=$ftnr['ftname']?>
      </select></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">关键字&nbsp;&nbsp;&nbsp;: 
      <input name="keyboard" type="text" size="52" value="<?=stripSlashes($r[keyboard])?>">
      <font color="#666666">(多个请用&quot;,&quot;隔开)</font></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">外部链接: 
      <input name="titleurl" type="text" value="<?=stripSlashes($r[titleurl])?>" size="52">
      <font color="#666666">(填写后信息连接地址将为此链接)</font></td>
  </tr>
</table>
</td></tr><tr><td nowrap='nowrap'><label>发布时间</label></td><td>
<input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="设为当前时间" onclick="document.add.newstime.value='<?=$todaytime?>'">
</td></tr><tr><td nowrap='nowrap'><label>商品编号</label></td><td><input name="productno" type="text" id="productno" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[productno]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>材质</label></td><td>
<input name="materials" type="text" id="materials" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[materials]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>简单描述</label></td><td><textarea name="intro" cols="80" rows="10" id="intro"><?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[intro]))?></textarea>
</td></tr><tr><td nowrap='nowrap'><label>尺寸</label></td><td>
<input name="dimensions" type="text" id="dimensions" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[dimensions]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>重量</label></td><td><input name="weight" type="text" id="weight" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[weight]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>市场价格</label></td><td><input name="tprice" type="text" id="tprice" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[tprice]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>购买价格</label></td><td><input name="price" type="text" id="price" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[price]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>积分购买</label></td><td><input name="buyfen" type="text" id="buyfen" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[buyfen]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>库存</label></td><td><input name="pmaxnum" type="text" id="pmaxnum" value="<?=$ecmsfirstpost==1?"100":ehtmlspecialchars(stripSlashes($r[pmaxnum]))?>" size="60">
</td></tr><tr><td nowrap='nowrap'><label>图片一</label></td><td>
<input name="pic1" type="text" id="pic1" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[pic1]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=pic1<?=$ecms_hashur['ehref']?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td nowrap='nowrap'><label>图片二</label></td><td>
<input name="pic2" type="text" id="pic2" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[pic2]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=pic2<?=$ecms_hashur['ehref']?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td nowrap='nowrap'><label>图片三</label></td><td>
<input name="pic3" type="text" id="pic3" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[pic3]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=pic3<?=$ecms_hashur['ehref']?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td nowrap='nowrap'><label>其它</label></td><td>
<input name="other" type="text" id="other" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[other]))?>" size="">
</td></tr><tr><td nowrap='nowrap'><label>大小</label></td><td>
<input name="size" type="text" id="size" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[size]))?>" size="">
</td></tr><tr><td nowrap='nowrap'><label>颜色</label></td><td>
<input name="cc_color" type="text" id="cc_color" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[cc_color]))?>" size="">
</td></tr><tr><td nowrap='nowrap'><label>规格</label></td><td>
<input name="cc_size" type="text" id="cc_size" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[cc_size]))?>" size="">
</td></tr><tr><td nowrap='nowrap'><label>商品缩略片</label></td><td><input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[titlepic]))?>" size="60">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=titlepic<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td nowrap='nowrap'><label>商品大图</label></td><td><input name="productpic" type="text" id="productpic" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($r[productpic]))?>" size="60">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&infoid=<?=$id?>&filepass=<?=$filepass?>&sinfo=1&doing=1&field=productpic<?=$ecms_hashur[ehref]?>','','width=700,height=550,scrollbars=yes');" title="选择已上传的图片"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><th nowrap='nowrap'>详细内容</th><th></th></tr><tr><td colspan=2><?=ECMS_ShowEditorVar("newstext",$ecmsfirstpost==1?"":stripSlashes($r[newstext]),"Default","","300","100%")?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
          <tr> 
            <td bgcolor="#FFFFFF"> <input name="dokey" type="checkbox" value="1"<?=$r[dokey]==1?' checked':''?>>
              关键字替换&nbsp;&nbsp; <input name="copyimg" type="checkbox" id="copyimg" value="1">
      远程保存图片(
      <input name="mark" type="checkbox" id="mark" value="1">
      <a href="SetEnews.php<?=$ecms_hashur[whehref]?>" target="_blank">加水印</a>)&nbsp;&nbsp; 
      <input name="copyflash" type="checkbox" id="copyflash" value="1">
      远程保存FLASH(地址前缀： 
      <input name="qz_url" type="text" id="qz_url" size="">
              )</td>
          </tr>
          <tr>
            
    <td bgcolor="#FFFFFF"><input name="repimgnexturl" type="checkbox" id="repimgnexturl" value="1"> 图片链接转为下一页&nbsp;&nbsp; <input name="autopage" type="checkbox" id="autopage" value="1"> 自动分页
      ,每 
      <input name="autosize" type="text" id="autosize" value="5000" size="5">
      个字节为一页&nbsp;&nbsp; 取第 
      <input name="getfirsttitlepic" type="text" id="getfirsttitlepic" value="" size="1">
      张上传图为标题图片( 
      <input name="getfirsttitlespic" type="checkbox" id="getfirsttitlespic" value="1">
      缩略图: 宽 
      <input name="getfirsttitlespicw" type="text" id="getfirsttitlespicw" size="3" value="<?=$public_r[spicwidth]?>">
      *高
      <input name="getfirsttitlespich" type="text" id="getfirsttitlespich" size="3" value="<?=$public_r[spicheight]?>">
      )</td>
          </tr>
        </table>
</td></tr></table>