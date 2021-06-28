<?php

class DB{

    private $dsn = "mysql:host=localhost ; charset=utf8; dbname = db01" ;
    private $root ='root';
    private $password = '';
    private $table;
    private $pdo;

    //設定建構式
    //PDO連線
    //Apache->Config->httpd.conf->DocumentRoot&Directory "C:\Users\yuchi\Documents\github\Web-Design-Certification-Level-B\web01"
    public function __construct($table){
        
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->root,$this->password);
    }



    //($a,…$arg)的參數寫法稱為"不定參數"，表示不確定參數會有幾個，而所有的參數都會被放入陣列中。
    // 不定參數一定放在所有參數的最後，前面的參數表示一定要有，否則會出現參數缺少的錯誤。
    public function all(...$arg){

        $sql = "select * from $this->table" ;
        //執行 PDO 物件並將sql語法導向到裡面的 query() 函數。讓 PDO 進行 SQL 連接並且執行 query()。
        //fetchAll(PDO::FETCH_ASSOC)
        return $this->pdo->query($sql)->fetchAll();        

    }




}




?>