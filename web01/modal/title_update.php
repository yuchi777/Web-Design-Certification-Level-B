<?php 
include "../base.php";
?>
<!-- 更新標題圖片 -->
<h3 style="text-align: center;">更新標題圖片</h3>
<hr>

<form action="api/upload.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;">  

    <tr>
        <td style="text-align: right;"><?= $hs['title'] ?>:</td>
        <td>
            <input type="file" name="img">
        </td>
    </tr>
    
</table>

<div style="text-align: center;">

    <!-- 更新 -->
    <input type="submit" value="更新">
    <input type="reset" value="重置">
    
    <input type="hidden" name="table" value="title">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">

</div>
</form>