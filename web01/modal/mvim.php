<?php 
include "../base.php";
?>

<h3 style="text-align: center;"><?= $as['mvim']; ?></h3>
<hr>

<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;">   
    <tr>
        <td style="text-align: right;"><?= $hs['mvim'] ?>:</td>
        <td>
            <input type="file" name="img">
        </td>
    </tr>
    
</table>
<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">

    <!-- 資料表mvim -->
    <input type="hidden" name="table" value="mvim">
</div>
</form>