<!-- base.php在backend.php載入 -->
<!-- admin.php複製修改 -->


<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $ts[$do]; ?></p>



    
    <!-- 因為刪除iframe所以target在form表單裡刪除 -->
    <form method="post"  action="../web01/api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    
                    <!-- 選單管理頁面 -->
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td width="10%"></td>
                    
                </tr>
                
                <?php
                    // 撈出['parent'=>0]主選單資料
                    $rows = $Menu->all(['parent'=>0]);
                    // echo "<pre>";
                    // print_r($rows);
                    // echo "</pre>";
                    foreach ($rows as $key => $value) {
                ?>

                <tr>
                
                    <td>
                        <!-- acc[] -->
                        <input type="text" name="text[]" value="<?= $value['text']?>" style="width: 90%;">
                    </td>
                    <td>
                        <!-- pw[] / style="width: 90%;-->
                        <input type="text" name="href[]" value="<?= $value['href'] ?>"  style="width: 90%;"> 
                    </td>
                    <td>
                        <!-- 編輯次選單 -->
                        <?= $Menu->count(['parent'=>$value['id']]); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?= $value['id'] ?>" <?= ($value['sh'] == 1)?"checked":""; ?>>
                    </td>
                    <td>
                        <!-- 刪除,可多選所以存成陣列, del[] //有點選才送出值 -->
                        <input type="checkbox" name="del[]" value="<?= $value['id'] ?>">
                    </td>
                    <td>
                        <input type="button" value="編輯次選單" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/submenu.php?id=<?= $value['id'] ?>&#39;)">
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