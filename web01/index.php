<?php
//只載入一次,避免後續再載入第二次造成衝突(ex.變數)
include_once "./base.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<!-- 刪除iframe  -->
	<!-- <iframe style="display:none;" name="back" id="back"></iframe> -->
	<div id="main">


		<!-- 回首頁設定,替代文字 -->
		<a title="<?= $Title->find(['sh'=>1])['text'];?>" href="./index.php">

			<div class="ti" style="background:url(&#39;img/<?= $Title->find(['sh'=>1])['img'];?>&#39;); background-size:cover;"></div>

			<!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>

					<?php
						$mus = $Menu->all(['sh'=>1 , 'parent'=>0 ]);
						foreach ($mus as $key => $value) {
							echo "<div class='mainmu cent'>";
							echo "<a href='{$value['href']}'> {$value['text']} </a>" ;
							
							// 次選單
							echo "<div class='mw' style='display:none'>";
								$subs = $Menu->all( [ 'parent'=>$value['id'] ] );
								foreach ($subs as $k => $v) {
									echo "<div class='mainmu2 cent'>";
									echo "<a href='{$v['href']}'> {$v['text']} </a>" ;
									echo "</div>";
								}
							
							
							echo "</div>";
							echo "</div>";
						};
						
						
					
					?>



				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">


					<span class="t">進站總人數 :
					<?php
						//資料庫total資料表
						// $db=new DB("total");
						// $db = $Total;
						// $total=$db->find(1);
						$total=$Total->find(1);


						// echo $total[1]  =  total["total"];
						// echo $total["total"];
						// $Total->find(1) 是陣列結果
						echo $Total->find(1)["total"];


					?>
					</span>



				</div>
			</div>







			<!-- 挖掉主要顯示區域到main.php -->
			<!-- 載入front的main.php(預設)/ login.php/ news.php檔案 ---------------------------------------------------------------------->
			<?php

			$file = (isset($_GET['do'])) ? $_GET['do'] : 'main' ;
			$file = "./front/" . $file . ".php";

			//判斷檔案是否存在
			//載入顯示區域
			if(file_exists($file)){
				include $file ;
			}else{
				include "./front/main.php" ;
			}


			// switch ($do) {
			// 	case 'login':
			// 		include "./front/login.php";
			// 		break;

			// 	case 'news':
			// 		include "./front/news.php";
			// 		break;

			// 	default:
			// 		include "./front/main.php";
			// 		break;
			// }
			?>

			<!------------------------------------------------------------------------>


			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->


				<?php

				if(!isset($_SESSION['admin'])){
				?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">管理登入</button>
				<?php
				}else{
				?>
					
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;backend.php?do=title&#39;)">返回管理</button>
				<?php
				}
				?>
				
				



				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>

					<!-- 載入icon和圖片 -->
					<div style="text-align: center;" onclick="pp(1)">
						<img src="icon/up.jpg">
					</div>


					<?php
						$imgs = $Image->all(['sh'=>1]);
						foreach ($imgs as $key => $value) {
							echo "<div class='cent im' id='ssaa{$key}'>";
							echo "<img src='img/{$value['img']}' style='width:150px; height:103px; margin:5px; border: 3px solid orange'>";
							echo "</div>";
							
						}
					?>


					<div style="text-align: center;" onclick="pp(2)">
						<img src="icon/dn.jpg">
					</div>





					<script>
						var nowpage = 0,

							// 顯示的圖片筆數
							num = <?= $Image->count(['sh'=>1]); ?>;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
								nowpage++;
							}
							$(".im").hide()

							// 從0開始到2共show三張
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?= $Bottom->find(1)['bottom'] ?></span>
		</div>
	</div>

</body>

</html>