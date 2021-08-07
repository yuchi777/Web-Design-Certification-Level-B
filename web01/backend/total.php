<!-- base.php在backend.php載入 -->
<!-- <?= $ts[$do]; ?> -->

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $ts[$do]; ?></p>



    
    <!-- 因為刪除iframe所以target在form表單裡刪除 -->
    <form method="post"  action="../web01/api/edit_total.php">

        <!-- table置中 margin:auto -->
        <table width="50%" style="margin: auto;">
    
            <tbody>
                <tr class="yel">
                    <td width="50%"><?= $hs[$do] ?></td>
                    <td width="50%">

                        <!-- $Total = new DB("total"); -->
                        <input type="text" name="total" value="<?=$Total->find(1)['total'];?>">
                        
                    </td>
                    <!-- <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td> -->
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <!-- <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=title&#39;)" value="新增網站標題圖片"> -->
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
