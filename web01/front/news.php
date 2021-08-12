<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">

		<!-- 載入動態文字廣告 -->
		<?php
		$ads = $Ad->all(['sh' => 1]);
		// print_r($ads);
		foreach ($ads as $key => $value) {
			echo $value['text'] . "&nbsp;&nbsp;&nbsp;";
		}
		?>

	</marquee>
	<div style="height:32px; display:block;"></div>


	<!--正中央-->
	<div class="cent">更多最新消息顯示區</div>
	<hr>

	<?php
		// 分頁
		// 撈總筆數 // Image資料表
		$all = $News->count(['sh'=>1]);
		//幾筆為一頁
		$div = 5;
		//總頁數,無條件進位
		$pages = ceil($all / $div);
		//目前位於哪一頁,預設第一頁
		$now = (isset($_GET['p'])) ? $_GET['p'] : "1";
		//從哪一頁開始, 取幾筆頁數// 1->0 1 2, 2->3 4 5, 3->6 7 8
		$start = ($now - 1) * $div;
	
	
	?>

	<!-- ol =>order by 有排序 -->
	<ol start="<?= $start+1 ?>">
		<?php
		// 分頁
		// 下面移到上方,因為<ol>
		// $all = $News->count(['sh'=>1]);
		// $div = 5;
		// $pages = ceil($all / $div);
		// $now = (isset($_GET['p'])) ? $_GET['p'] : "1";
		// $start = ($now - 1) * $div;

		$rows = $News->all(['sh'=>1],"Limit $start, $div");
		foreach ($rows as $key => $value) {
			echo "<li class ='sswww'>";
			echo mb_substr($value['text'],0,20)."...";
			echo "<span class='all' style='display:none'>{$value['text']}</span>";
			echo "</li>";
		}
		?>


	</ol>
	<div style="text-align:center;">
		<!-- <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
		<a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a> -->
		<!-- 插入頁碼 -->
		<!-- 分頁 -->
        
            <?php
            // 上一頁>0
            if (($now - 1) > 0) {
                echo "<a class='bl' href='?do=news&p=" . ($now - 1) . "'> < </a>";
            };

            for ($i = 1; $i <= $pages; $i++) {
                $fontSize = ($now == $i) ? '25px' : '16px';
                echo "<a class='bl' href='?do=news&p=" . $i . "' style='font-size:$fontSize'> $i </a> ";
            };

            // 下一頁<=總頁數
            if (($now + 1) <= $pages) {
                echo "<a class='bl' href='?do=news&p=" . ($now + 1) . "'> > </a>";
            };
            ?>
        
	</div>
	
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "<pre>").css({
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
</script>