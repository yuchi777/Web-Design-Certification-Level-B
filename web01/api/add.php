<?php
include "../base.php";


//modal/title.php
//hidden value值// <input type="hidden" name="table" value="title">
// echo $_POST['table'];
//標題區替代文字// <input type="text" name="text">
// echo $_POST['text'];


$db = new DB($_POST['table']);

// 檢查上傳檔案//檢查tmp_nmae是否有名稱,有的話代表檔案上傳,在搬移檔案到img資料夾
// 範例:[file] => Array
//         (
//             [name] => MyFile.jpg
//             [type] => image/jpeg
//             [tmp_name] => /tmp/php/php6hst32
//             [error] => UPLOAD_ERR_OK
//             [size] => 98174
//         )
if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], "../img/".$_FILES['img']['name']);
    $data['img'] = $_FILES['img']['name'];
};

// $data['img'] = "img1.jpg" ;
$data['text'] = $_POST['text'];

$db->save($data);

to("../backend.php?do=".$_POST['table']);

?>

