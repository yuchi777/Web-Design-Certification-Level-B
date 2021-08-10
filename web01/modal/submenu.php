<?php 
include "../base.php";
?>

<h3 style="text-align: center;">編輯次選單</h3>
<hr>

<form action="api/submenu.php" method="post" enctype="multipart/form-data">
<table style="margin: auto;text-align:center" id="sub">   
    <tr>
        <td>次選單名稱</td>
        <td>主選單連結網址</td>
        <td>刪除</td>
    </tr>
    <!-- <tr>
        <td><input type="text" name="text[]"></td>
        <td><input type="text" name="href[]"></td>
        <td></td>
    </tr> -->
</table>
<div style="text-align: center;">
    <input type="submit" value="新增">
    <input type="reset" value="重置">

    <input type="button" value="更多次選單" onclick="more()">
    
    <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
    <input type="hidden" name="table" value="menu">
</div>
</form>

<script>
    function more(){
        let str =`
                <tr>
                <td><input type="text" name="text2[]"></td>
                <td><input type="text" name="href2[]"></td>
                </tr>
                `;

        $("#sub").append(str);


    }
</script>