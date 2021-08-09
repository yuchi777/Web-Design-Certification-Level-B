<?php 
include "../base.php";
?>

<h3 style="text-align: center;"><?= $as['title']; ?></h3>
<hr>

<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;">   
    <tr>
        <td style="text-align: right;"><?= $hs['title'] ?>:</td>
        <td>
            <input type="file" name="img">
        </td>
    </tr>
    <tr>
        <td>標題區替代文字:</td>
        <td>
            <input type="text" name="text">
        </td>
    </tr>
</table>

<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
    
    <!-- 資料表title -->
    <input type="hidden" name="table" value="title">

</div>
</form