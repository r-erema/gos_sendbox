<!-- REGULATORY INFORMATION BLOCK START -->
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
    {foreach from = $data.reg_info.buh.arts key=id item=art}
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="{$art.link}" style="color: #134c95;" target="_blank">{$art.title}</a></p>
        {foreach from = $art.paragraphs key=id item=paragraph}
            {if is_array($paragraph)}
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                {foreach from = $paragraph key=k item=item}
                    <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;">{$item}</li>
                {/foreach}
                </ul>
            {else}
            <p style="margin-top: 0; margin-bottom: 8px;">{$paragraph}</p>
            {/if}
        {/foreach}
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    {/foreach}
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
    {foreach from = $data.reg_info.eco.arts key=id item=art}
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="{$art.link}" style="color: #134c95;" target="_blank">{$art.title}</a></p>
        {foreach from = $art.paragraphs key=id item=paragraph}
            {if is_array($paragraph)}
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    {foreach from = $paragraph key=k item=item}
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;">{$item}</li>
                    {/foreach}
                </ul>
            {else}
                <p style="margin-top: 0; margin-bottom: 8px;">{$paragraph}</p>
            {/if}
        {/foreach}
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    {/foreach}
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

    {foreach from = $data.reg_info.kadr.arts key=id item=art}
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="{$art.link}" style="color: #134c95;" target="_blank">{$art.title}</a></p>
        {foreach from = $art.paragraphs key=id item=paragraph}
            {if is_array($paragraph)}
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    {foreach from = $paragraph key=k item=item}
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;">{$item}</li>
                    {/foreach}
                </ul>
            {else}
                <p style="margin-top: 0; margin-bottom: 8px;">{$paragraph}</p>
            {/if}
        {/foreach}
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    {/foreach}

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

    {foreach from = $data.reg_info.jur.arts key=id item=art}
        <p style="font-size: 15px; margin-top: 0; margin-bottom: 8px;"><a href="{$art.link}" style="color: #134c95;" target="_blank">{$art.title}</a></p>
        {foreach from = $art.paragraphs key=id item=paragraph}
            {if is_array($paragraph)}
                <ul style="margin-top: 0; margin-bottom: 8px; padding-left: 20px;">
                    {foreach from = $paragraph key=k item=item}
                        <li style="font-size: 13px; margin-bottom: 5px; margin-top: 0;">{$item}</li>
                    {/foreach}
                </ul>
            {else}
                <p style="margin-top: 0; margin-bottom: 8px;">{$paragraph}</p>
            {/if}
        {/foreach}
        <p style="margin-top: 0; margin-bottom: 0;">&nbsp;</p>
    {/foreach}

</div>
<!-- REGULATORY INFORMATION FOR JURIST CONTENT END -->
</td>
</tr>
<tr>
    <td height="10" bgcolor="#ffffff">
        <!-- padding -->
    </td>
</tr>
<!-- REGULATORY INFORMATION BLOCK END -->