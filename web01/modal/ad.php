<?php 
include "../base.php";
?>

<h3 style="text-align: center;"><?= $as['ad']; ?></h3>
<hr>

<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;">   
    <tr>
        <td style="text-align: right;"><?= $hs['ad'] ?>:</td>
        <td>
            <input type="text" name="text">
        </td>
    </tr>
    
</table>
<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">

    <!-- 資料表ad -->
    <input type="hidden" name="table" value="ad">
</div>
</form>