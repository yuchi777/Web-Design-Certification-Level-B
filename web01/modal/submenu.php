<?php 
include "../base.php";
?>

<h3 style="text-align: center;">編輯次選單<?= $_GET['id']; ?></h3>
<hr>

<form action="api/submenu.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;text-align:center">   
    <tr>
        <td>次選單名稱</td>
        <td>主選單連結網址</td>
        <td>刪除</td>
    </tr>
    <tr>
        <td><input type="text" name="text"></td>
        <td><input type="text" name="href"></td>
        <td></td>
    </tr>
</table>
<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">

    <input type="button" value="更多次選單">

    <input type="hidden" name="table" value="menu">
</div>
</form