<!-- ANNOUNCEMENT ANALYTICS ARTICLES BLOCK START -->
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
        {foreach from = $data.ann_analytics.buh.arts key=id item=art}
            <tr>
                <td width="64" valign="top">
                    <img src="http://normativka.by/pictures/video/authors/{$art.photo}" alt="" style="margin-top: 3px;" width="64" height="64" />
                </td>
                <td width="12">
                    <!-- padding -->
                </td>
                <td width="544" valign="top">
                    <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;">{$art.title}</p>
                    <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;">{$art.author}</p>
                </td>
            </tr>
            <tr>
                <td colspan="3" height="15">
                    <!-- padding -->
                </td>
            </tr>
        {/foreach}
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
    {foreach from = $data.ann_analytics.kadr.arts key=id item=art}
        <tr>
            <td width="64" valign="top">
                <img src="http://normativka.by/pictures/video/authors/{$art.photo}" alt="" style="margin-top: 3px;" width="64" height="64" />
            </td>
            <td width="12">
                <!-- padding -->
            </td>
            <td width="544" valign="top">
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;">{$art.title}</p>
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;">{$art.author}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" height="15">
                <!-- padding -->
            </td>
        </tr>
    {/foreach}
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
    {foreach from = $data.ann_analytics.jur.arts key=id item=art}
        <tr>
            <td width="64" valign="top">
                <img src="http://normativka.by/pictures/video/authors/{$art.photo}" alt="" style="margin-top: 3px;" width="64" height="64" />
            </td>
            <td width="12">
                <!-- padding -->
            </td>
            <td width="544" valign="top">
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 15px; font-weight: bold; margin-top: 0; margin-bottom: 3px;">{$art.title}</p>
                <p style="font-family: Arial,Helvetica, sans-serif; font-size: 13px; margin-top: 0; margin-bottom: 0; color: #909090;">{$art.author}</p>
            </td>
        </tr>
        <tr>
            <td colspan="3" height="15">
                <!-- padding -->
            </td>
        </tr>
    {/foreach}
    <tr>
        <td colspan="3" height="10">
            <!-- padding -->
        </td>
    </tr>
</table>
<!-- FOR JURIST CONTENT END -->

</td>
</tr>
<!-- ANNOUNCEMENT ANALYTICS ARTICLES BLOCK END -->