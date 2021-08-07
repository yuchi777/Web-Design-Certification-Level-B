<?php
include_once "../base.php";



$bottom = $_POST['bottom'];

$Bottom->save(['id'=>1, 'bottom'=>$bottom]);

to("../backend.php?do=bottom");






?>