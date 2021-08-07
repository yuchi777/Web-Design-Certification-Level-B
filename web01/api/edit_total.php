<?php
include_once "../base.php";



$total = $_POST['total'];

$Total->save(['id'=>1, 'total'=>$total]);

to("../backend.php?do=total");






?>