<?php
include "../base.php";


//modal/title.php
//hidden value值// <input type="hidden" name="table" value="title">
// echo $_POST['table'];
//標題區替代文字// <input type="text" name="text">
// echo $_POST['text'];


$db = new DB($_POST['table']);
$data['text'] = $_POST['text'];
$data['img'] = "img1.jpg" ;

$db->save($data);

to("../backend.php?do=".$_POST['table']);

?>

