<?php /* Smarty version Smarty-3.1.18, created on 2014-05-05 11:28:27
         compiled from "templates\regulatory_information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13577536378e62c0a33-69972367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a25a213768405f03903a305ae1d871a04a9b5ae8' => 
    array (
      0 => 'templates\\regulatory_information.tpl',
      1 => 1399282106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13577536378e62c0a33-69972367',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536378e62d0437_61643125',
  'variables' => 
  array (
    'data' => 0,
    'art' => 0,
    'paragraph' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536378e62d0437_61643125')) {function content_536378e62d0437_61643125($_smarty_tpl) {?><!-- REGULATORY INFORMATION BLOCK START -->
<tr>
<td style="padding-top: 40px; padding-left: 40px; padding-right: 40px;" bgcolor="#ffffff">
<h1 style="text-align: center; font-size: 30px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 10px;">Нормативно-правовая информация</h1>
<h2 style="text-align: center; font-size: 18px; font-family: Arial, Helvetica, sans-serif; margin-top: 0; margin-bottom: 35px;">Последние изменения в законодательстве Республики Беларусь</h2>

<!-- REGULATORY INFORMATION FOR BUHGALTER TITLE START -->
<table width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="250"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Бухгалтеру</h3></td>
        <td width="250"></td>
    </tr>
    <tr>
        <td height="1" bgcolor="#cccccc">
            <!-- line -->
        </td>
        <td bgcolor="#cccccc">
            <!-- line -->
        </td>
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
<!-- REGULATORY INFORMATION FOR BUHGALTER TITLE END -->

<!-- REGULATORY INFORMATION FOR BUHGALTER CONTENT START -->
<div style="margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['reg_info']['buh']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="<?php echo $_smarty_tpl->tpl_vars['art']->value['link'];?>
" style="color: #134c95;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></p>
        <?php  $_smarty_tpl->tpl_vars['paragraph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paragraph']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['art']->value['paragraphs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paragraph']->key => $_smarty_tpl->tpl_vars['paragraph']->value) {
$_smarty_tpl->tpl_vars['paragraph']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['paragraph']->key;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['paragraph']->value)) {?>
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paragraph']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                <?php } ?>
                </ul>
            <?php } else { ?>
            <p style="margin-top: 0; margin-bottom: 8px;"><?php echo $_smarty_tpl->tpl_vars['paragraph']->value;?>
</p>
            <?php }?>
        <?php } ?>
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    <?php } ?>
</div>
<!-- REGULATORY INFORMATION FOR BUHGALTER CONTENT END -->

<!-- REGULATORY INFORMATION FOR ECONOMIST TITLE START -->
<table width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="250"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Экономисту</h3></td>
        <td width="250"></td>
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
<!-- REGULATORY INFORMATION FOR ECONOMIST TITLE END -->

<!-- REGULATORY INFORMATION FOR ECONOMIST CONTENT START -->
<div style="margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['reg_info']['eco']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="<?php echo $_smarty_tpl->tpl_vars['art']->value['link'];?>
" style="color: #134c95;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></p>
        <?php  $_smarty_tpl->tpl_vars['paragraph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paragraph']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['art']->value['paragraphs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paragraph']->key => $_smarty_tpl->tpl_vars['paragraph']->value) {
$_smarty_tpl->tpl_vars['paragraph']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['paragraph']->key;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['paragraph']->value)) {?>
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paragraph']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p style="margin-top: 0; margin-bottom: 8px;"><?php echo $_smarty_tpl->tpl_vars['paragraph']->value;?>
</p>
            <?php }?>
        <?php } ?>
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    <?php } ?>
</div>
<!-- REGULATORY INFORMATION FOR ECONOMIST CONTENT END -->

<!-- REGULATORY INFORMATION FOR KADROVIK TITLE START -->
<table width="620" height="34" cellspacing="0" cellpadding="0" border="0">
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
<!-- REGULATORY INFORMATION FOR KADROVIK TITLE END -->

<!-- REGULATORY INFORMATION FOR KADROVIK CONTENT START -->
<div style="margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">

    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['reg_info']['kadr']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="<?php echo $_smarty_tpl->tpl_vars['art']->value['link'];?>
" style="color: #134c95;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></p>
        <?php  $_smarty_tpl->tpl_vars['paragraph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paragraph']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['art']->value['paragraphs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paragraph']->key => $_smarty_tpl->tpl_vars['paragraph']->value) {
$_smarty_tpl->tpl_vars['paragraph']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['paragraph']->key;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['paragraph']->value)) {?>
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paragraph']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p style="margin-top: 0; margin-bottom: 8px;"><?php echo $_smarty_tpl->tpl_vars['paragraph']->value;?>
</p>
            <?php }?>
        <?php } ?>
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    <?php } ?>

</div>
<!-- REGULATORY INFORMATION FOR KADROVIK CONTENT END -->

<!-- REGULATORY INFORMATION FOR JURIST TITLE START -->
<table width="620" height="34" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td height="11" width="266"></td>
        <td rowspan="3"><h3 style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: normal; text-align: center; margin-top: 0; margin-bottom: 0;">Юристу</h3></td>
        <td width="266"></td>
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
<!-- REGULATORY INFORMATION FOR JURIST TITLE END -->

<!-- REGULATORY INFORMATION FOR JURIST CONTENT START -->
<div style="margin-bottom: 10px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">

    <?php  $_smarty_tpl->tpl_vars['art'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['art']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['reg_info']['jur']['arts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['art']->key;
?>
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="<?php echo $_smarty_tpl->tpl_vars['art']->value['link'];?>
" style="color: #134c95;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['art']->value['title'];?>
</a></p>
        <?php  $_smarty_tpl->tpl_vars['paragraph'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paragraph']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['art']->value['paragraphs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paragraph']->key => $_smarty_tpl->tpl_vars['paragraph']->value) {
$_smarty_tpl->tpl_vars['paragraph']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['paragraph']->key;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['paragraph']->value)) {?>
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paragraph']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <p style="margin-top: 0; margin-bottom: 8px;"><?php echo $_smarty_tpl->tpl_vars['paragraph']->value;?>
</p>
            <?php }?>
        <?php } ?>
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    <?php } ?>

</div>
<!-- REGULATORY INFORMATION FOR JURIST CONTENT END -->
</td>
</tr>
<tr>
    <td height="10" bgcolor="#ffffff">
        <!-- padding -->
    </td>
</tr>
<!-- REGULATORY INFORMATION BLOCK END --><?php }} ?>
