<!-- base.php在backend.php載入 -->



<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $ts[$do]; ?></p>



    
    <!-- 因為刪除iframe所以target在form表單裡刪除 -->
    <form method="post"  action="../web01/api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>



                <!-- 從mvim.php複製全部過來 -->
                <?php
                    $rows = $Image->all();
                    // echo "<pre>";
                    // print_r($rows);
                    // echo "</pre>";
                    foreach ($rows as $key => $value) {
                ?>

                <tr>
                    <td>
                        <!-- 圖片/尺寸變更w100px h68px -->
                        <img src="../web01/img/<?=$value['img']?>" style="width: 100px;height:68px">
                    </td>
                    
                    <td>
                        <!-- 顯示//有點選才送出值/改多選checkbox,name為陣列 -->
                        <input type="checkbox" name="sh[]" value="<?= $value['id'] ?>" <?= ($value['sh']==1)?"checked":"" ?> > 
                    </td>
                    <td>
                        <!-- 刪除,可多選所以存成陣列, del[] //有點選才送出值 -->
                        <input type="checkbox" name="del[]" value="<?= $value['id'] ?>">
                    </td>
                    <td>

                        <!-- image_update -->
                        <!-- 更換圖片 onclick / php?id= value['id'] / 更換圖片-->
                        <input type="button" value="更換動畫" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/image_update.php?id=<?= $value['id'] ?>&#39;)">
                    
                    
                    </td>
                    <td>
                        <input type="hidden" name="id[]" value="<?= $value['id'] ?>">
                    </td>
                </tr>

                <?php
                }
                ?>



            </tbody>
        </table>


        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>

                    <td width="200px">

                        <!-- URL不要空格 -->
                        <!-- 新增網站標題 -->
                        <!-- onclick 轉址 modal/title.php  -->
                        <!-- &#39;為單引號 -->
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do?>.php&#39;)" value="<?= $as[$do] ?>">
                    </td>

                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">

                        <!-- 傳送表單知道table是哪張資料表 -->
                        <input type="hidden" name="table" value="<?=$do;?>">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
</div>











<!-- 用在front的news頁面 -->
<!-- <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("" + $(this).children(".all").html() + "").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script> -->