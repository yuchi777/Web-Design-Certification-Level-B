<?php 
include "../base.php";
?>

<h3 style="text-align: center;"><?= $as['news']; ?></h3>
<hr>

<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;">   
    <tr>
        <td style="text-align: right;"><?= $hs['news'] ?>:</td>
        <td>
            <textarea name="text"  cols="30" rows="5"></textarea>
        </td>
    </tr>
    
</table>
<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">

    <!-- 資料表image -->
    <input type="hidden" name="table" value="news">
</div>
</form>