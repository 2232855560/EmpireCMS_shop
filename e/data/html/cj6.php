<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品名称正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>发布时间正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品编号正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--productno--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_productno]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_productno]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_productno]" type="text" id="add[z_productno]" value="<?=stripSlashes($r[z_productno])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>材质正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--materials--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_materials]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_materials]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_materials]" type="text" id="add[z_materials]" value="<?=stripSlashes($r[z_materials])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>简单描述正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--intro--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_intro]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_intro]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_intro]" type="text" id="add[z_intro]" value="<?=stripSlashes($r[z_intro])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>尺寸正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--dimensions--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_dimensions]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_dimensions]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_dimensions]" type="text" id="add[z_dimensions]" value="<?=stripSlashes($r[z_dimensions])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>重量正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--weight--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_weight]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_weight]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_weight]" type="text" id="add[z_weight]" value="<?=stripSlashes($r[z_weight])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>市场价格正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--tprice--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_tprice]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_tprice]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_tprice]" type="text" id="add[z_tprice]" value="<?=stripSlashes($r[z_tprice])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>购买价格正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--price--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_price]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_price]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_price]" type="text" id="add[z_price]" value="<?=stripSlashes($r[z_price])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>积分购买正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--buyfen--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_buyfen]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_buyfen]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_buyfen]" type="text" id="add[z_buyfen]" value="<?=stripSlashes($r[z_buyfen])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>库存正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--pmaxnum--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_pmaxnum]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_pmaxnum]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_pmaxnum]" type="text" id="add[z_pmaxnum]" value="<?=stripSlashes($r[z_pmaxnum])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>图片一正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--pic1--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_pic1]" type="text" id="add[qz_pic1]" value="<?=stripSlashes($r[qz_pic1])?>"> 
        <input name="add[save_pic1]" type="checkbox" id="add[save_pic1]" value=" checked"<?=$r[save_pic1]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_pic1]" cols="60" rows="10" id="add[zz_pic1]"><?=ehtmlspecialchars(stripSlashes($r[zz_pic1]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_pic1]" type="text" id="pic15" value="<?=stripSlashes($r[z_pic1])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>图片二正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--pic2--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_pic2]" type="text" id="add[qz_pic2]" value="<?=stripSlashes($r[qz_pic2])?>"> 
        <input name="add[save_pic2]" type="checkbox" id="add[save_pic2]" value=" checked"<?=$r[save_pic2]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_pic2]" cols="60" rows="10" id="add[zz_pic2]"><?=ehtmlspecialchars(stripSlashes($r[zz_pic2]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_pic2]" type="text" id="pic25" value="<?=stripSlashes($r[z_pic2])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>图片三正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--pic3--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_pic3]" type="text" id="add[qz_pic3]" value="<?=stripSlashes($r[qz_pic3])?>"> 
        <input name="add[save_pic3]" type="checkbox" id="add[save_pic3]" value=" checked"<?=$r[save_pic3]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_pic3]" cols="60" rows="10" id="add[zz_pic3]"><?=ehtmlspecialchars(stripSlashes($r[zz_pic3]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_pic3]" type="text" id="pic35" value="<?=stripSlashes($r[z_pic3])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>其它正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--other--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_other]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_other]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_other]" type="text" id="add[z_other]" value="<?=stripSlashes($r[z_other])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>大小正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--size--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_size]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_size]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_size]" type="text" id="add[z_size]" value="<?=stripSlashes($r[z_size])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>颜色正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--cc_color--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_cc_color]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_cc_color]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_cc_color]" type="text" id="add[z_cc_color]" value="<?=stripSlashes($r[z_cc_color])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>规格正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--cc_size--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_cc_size]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_cc_size]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_cc_size]" type="text" id="add[z_cc_size]" value="<?=stripSlashes($r[z_cc_size])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品缩略片正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--titlepic--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_titlepic]" type="text" id="add[qz_titlepic]" value="<?=stripSlashes($r[qz_titlepic])?>"> 
        <input name="add[save_titlepic]" type="checkbox" id="add[save_titlepic]" value=" checked"<?=$r[save_titlepic]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_titlepic]" cols="60" rows="10" id="add[zz_titlepic]"><?=ehtmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_titlepic]" type="text" id="titlepic5" value="<?=stripSlashes($r[z_titlepic])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品大图正则：</strong><br>
      ( 
      <input name="textfield" type="text" id="textfield" value="[!--productpic--]" size="20">
      )</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td>附件前缀 
        <input name="add[qz_productpic]" type="text" id="add[qz_productpic]" value="<?=stripSlashes($r[qz_productpic])?>"> 
        <input name="add[save_productpic]" type="checkbox" id="add[save_productpic]" value=" checked"<?=$r[save_productpic]?>>
        远程保存 </td>
    </tr>
    <tr> 
      <td><textarea name="add[zz_productpic]" cols="60" rows="10" id="add[zz_productpic]"><?=ehtmlspecialchars(stripSlashes($r[zz_productpic]))?></textarea></td>
    </tr>
    <tr> 
      <td><input name="add[z_productpic]" type="text" id="productpic5" value="<?=stripSlashes($r[z_productpic])?>">
        (如填写这里，这就是字段的值)</td>
    </tr>
  </table></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="22" valign="top"><strong>商品介绍正则：</strong><br>
      (<input name="textfield" type="text" id="textfield" value="[!--newstext--]" size="20">)</td>
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td><textarea name="add[zz_newstext]" cols="60" rows="10" id="textarea"><?=ehtmlspecialchars(stripSlashes($r[zz_newstext]))?></textarea></td>
        </tr>
        <tr> 
          <td><input name="add[z_newstext]" type="text" id="add[z_newstext]" value="<?=stripSlashes($r[z_newstext])?>">
            (如填写这里，将为字段的值)</td>
        </tr>
      </table></td>
  </tr>
