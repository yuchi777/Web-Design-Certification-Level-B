<?php
include_once "../base.php";

$post = $_POST;
echo "<pre>";
print_r($post);
echo "</pre>";

$texts = $_POST['text'];
$ids = $_POST['id'];
$table = $_POST['table'];
$db=new DB($table);

foreach ($ids as $key => $id) {

    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {

        $db->del($id);

    } else {

        $row = $db->find($id);
        $row['text'] = $texts[$key]; //資料庫依據$id撈出的資料text = 表單text欄位輸入的資料內容
        // echo "<pre>";
        // print_r($row['text']); //資料庫根據$id找到的text欄位資料
        // echo "</pre>";
        // echo "<pre>";
        // print_r($texts[$key]); //表單text欄位輸入的資料內容,依據$key值列出
        // echo "</pre>"."<br>";

        // 判斷顯示與否
        //三元運算子
        //radio單選/checkbox多選
        switch ($table) {
            case 'title':
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id)?1:0;
                break;
            default:
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh']))?1:0;
                break;
        }

        // if (isset($_POST['sh']) && $_POST['sh'] == $id) {
        //     $row['sh'] = 1;
        // } else {
        //     $row['sh'] = 0;
        // }

        $db->save($row);
    }
}


// foreach ($_POST['del'] as $key => $id) {
//     $Title->del($id);
// }

to("../backend.php?do=".$table);
