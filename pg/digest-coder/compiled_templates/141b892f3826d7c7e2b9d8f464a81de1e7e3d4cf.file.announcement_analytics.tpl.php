<?php /* Smarty version Smarty-3.1.18, created on 2014-11-21 08:20:25
         compiled from "templates\announcement_analytics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22032536378e62860b3-50812550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '141b892f3826d7c7e2b9d8f464a81de1e7e3d4cf' => 
    array (
      0 => 'templates\\announcement_analytics.tpl',
      1 => 1416315952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22032536378e62860b3-50812550',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536378e62b4eb3_26071922',
  'variables' => 
  array (
    'data' => 0,
    'art' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536378e62b4eb3_26071922')) {function content_536378e62b4eb3_26071922($_smarty_tpl) {?><!-- ANNOUNCEMENT ANALYTICS ARTICLES BLOCK START -->
<tr>
<td style="padding-top: 15px; padding-bottom: 20px; padding-left: 40px; padding-right: 40px;" bgcolor="#ffffff">
<h1 style="text-align: center; font-size: 30px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 10px;">Анонс аналитических материалов</h1>
<h2 style="text-align: center; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 35px;">Читайте на этой неделе</h2>

<!-- FOR BUHGALTER TITLE START -->
<table class="digest-template-title" width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="255"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Бухгалтеру</h3></td>
        <td width="255"></td>
    </tr>
    <tr>
        <td height="1" bgcolor="#cccccc"><!-- line --></td>
        <td bgcolor="#cccccc"><!-- line --></td>
    </tr>
    <tr>
        <td height="10"></td>
        <td></td>
    </tr>
    <tr>
        <td height="12" colspan="3">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR BUHGALTER TITLE END -->

<!-- FOR BUHGALTER CONTENT START -->
<table width="620" cellspacing="0" cellpadding="0" border="0">
    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['ann_analytics']['buh']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
    <tr>
        <td width="64" valign="top">
            <img src="http://normativka.by/pictures/video/authors/<?php echo $_smarty_tpl->tpl_vars['art']->value['photo'];?>
" alt="" style="margin-top: 3px;" width="64" height="64" />
        </td>
        <td width="12">
            <!-- padding -->
        </td>
        <td width="544" valign="top">
            <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</p>
            <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;"><?php echo $_smarty_tpl->tpl_vars['art']->value['author'];?>
</p>
        </td>
    </tr>
    <tr>
        <td colspan="3" height="15">
            <!-- padding -->
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="3" height="10">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR BUHGALTER CONTENT END -->

<!-- FOR KADROVIK TITLE START -->
<table class="digest-template-title digest-template-title-kadrovik" width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="255"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Кадровику</h3></td>
        <td width="255"></td>
    </tr>
    <tr>
        <td height="1" bgcolor="#cccccc"><!-- line --></td>
        <td bgcolor="#cccccc"><!-- line --></td>
    </tr>
    <tr>
        <td height="10"></td>
        <td></td>
    </tr>
    <tr>
        <td height="12" colspan="3">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR KADROVIK TITLE END -->

<!-- FOR KADROVIK CONTENT START -->
<table width="620" cellspacing="0" cellpadding="0" border="0">
    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['ann_analytics']['kadr']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <tr>
            <td width="64" valign="top">
                <img src="http://normativka.by/pictures/video/authors/<?php echo $_smarty_tpl->tpl_vars['art']->value['photo'];?>
" alt="" style="margin-top: 3px;" width="64" height="64" />
            </td>
            <td width="12">
                <!-- padding -->
            </td>
            <td width="544" valign="top">
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</p>
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;"><?php echo $_smarty_tpl->tpl_vars['art']->value['author'];?>
</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" height="15">
                <!-- padding -->
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3" height="10">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR KADROVIK CONTENT END -->

<!-- FOR JURIST TITLE START -->
<table class="digest-template-title" width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="265"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Юристу</h3></td>
        <td width="265"></td>
    </tr>
    <tr>
        <td height="1" bgcolor="#cccccc"><!-- line --></td>
        <td bgcolor="#cccccc"><!-- line --></td>
    </tr>
    <tr>
        <td height="10"></td>
        <td></td>
    </tr>
    <tr>
        <td height="12" colspan="3">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR JURIST TITLE END -->

<!-- FOR JURIST CONTENT START -->
<table width="620" cellspacing="0" cellpadding="0" border="0">
    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['ann_analytics']['jur']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <tr>
            <td width="64" valign="top">
                <img src="http://normativka.by/pictures/video/authors/<?php echo $_smarty_tpl->tpl_vars['art']->value['photo'];?>
" alt="" style="margin-top: 3px;" width="64" height="64" />
            </td>
            <td width="12">
                <!-- padding -->
            </td>
            <td width="544" valign="top">
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</p>
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;"><?php echo $_smarty_tpl->tpl_vars['art']->value['author'];?>
</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" height="15">
                <!-- padding -->
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="3" height="10">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR JURIST CONTENT END -->

</td>
</tr>
<!-- ANNOUNCEMENT ANALYTICS ARTICLES BLOCK END --><?php }} ?>
