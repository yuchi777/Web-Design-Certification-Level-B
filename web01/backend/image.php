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



                <?php
                // 分頁
                // 撈總筆數 // Image資料表
                $all = $Image->count();
                //幾筆為一頁
                $div = 3;
                //總頁數,無條件進位
                $pages = ceil($all/$div);
                //目前位於哪一頁,預設第一頁
                $now = (isset($_GET['p']))?$_GET['p']:"1";
                //從哪一頁開始, 取幾筆頁數// 1->0 1 2, 2->3 4 5, 3->6 7 8
                $start = ($now - 1) * $div;


                    // <!-- 從mvim.php複製全部過來 -->
                    $rows = $Image->all("Limit $start, $div");
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

        <!-- 分頁 -->
        <div style="text-align: center;">
            <?php
                // 上一頁>0
                if(($now-1)>0){
                    echo "<a href='?do=image&p=".($now-1)."'> < </a>";
                };
                
                for($i=1; $i<=$pages; $i++){
                    $fontSize=($now==$i)?'25px':'16px';
                    echo "<a href='?do=image&p=".$i."' style='font-size:$fontSize'> $i </a> ";
                };

                // 下一頁<=總頁數
                if(($now+1)<=$pages){
                    echo "<a href='?do=image&p=".($now+1)."'> > </a>" ;
                };
            
            
            ?>

        </div>

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