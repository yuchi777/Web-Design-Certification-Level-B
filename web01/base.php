<?php

class DB{

    private $dsn = "mysql:host=localhost;charset=utf8;dbname=db01_story"; //不能有空格
    private $root ='root';
    private $password ="";
    private $table;
    private $pdo;

    //設定建構式
    //PDO連線
    //Apache->Config->httpd.conf->DocumentRoot & Directory 
    //"C:\Users\yuchi\Documents\github\Web-Design-Certification-Level-B\web01"
    public function __construct($table){
        
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->root,$this->password);
        // $this->pdo =new PDO("mysql:host=localhost;dbname=db01_story", $this->root, $this->password);
    }





    /****************************************************************************************** */

    //($a,…$arg)的參數寫法稱為"不定參數"，表示不確定參數會有幾個，而所有的參數都會被放入陣列中。
    // 不定參數一定放在所有參數的最後，前面的參數表示一定要有，否則會出現參數缺少的錯誤。
    public function all(...$arg){

        $sql = "select * from $this->table " ;
        
        // $arg=[] or [陣列],[SQL字串],[陣列,SQL字串]
        if(isset($arg[0])){

            if(is_array($arg[0])){
                //處理陣列 ["欄位"=>"值","欄位"=>"值"]
                //SQL語法 where `欄位`='值' && `欄位`='值'

                foreach ($arg[0] as $key => $value) {
                    
                    $tmp[] = sprintf("`%s`='%s'", $key,$value ) ;
                }

                // print_r (implode(" && ", $tmp)); //&&前後空白
                $sql = $sql ." where ". implode(" && ", $tmp); //where前後注意空白

            }else{
                //為字串
                $sql = $sql.$arg[0];
            }

            if(isset($arg[1])){
                //為字串
                $sql = $sql.$arg[1];
            }
        }
        
        
        echo $sql;
        //執行 PDO 物件並將sql語法導向到裡面的 query() 函數。讓 PDO 進行 SQL 連接並且執行 query()。
        //fetchAll(PDO::FETCH_ASSOC)
        return $this->pdo->query($sql)->fetchAll();        
    }
    /****************************************************************************************** */


    public function count(...$arg){
        $sql = "select count(*) from $this->table ";

        if( isset($arg[0]) ){
            if(is_array($arg[0])){
                foreach ($arg[0] as $key => $value) {
                    $tmp[]= sprintf(" `%s`='%s' ", $key, $value);
                }

                $sql = $sql." where ".implode(" && ",$tmp);
            }else{

                $sql = $sql . $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        }

        echo $sql."<br>";
        return $this->pdo->query($sql)->fetchColumn();
    }
    /****************************************************************************************** */


    public function find($id){
        $sql = "select * from $this->table ";

        if(is_array($id)){
            foreach ($id as $key => $value) {
                $tmp[]=sprintf("`%s`='%s'", $key, $value);
            }

            $sql = $sql." where ".implode(" && ", $tmp);
        }else{

            $sql = $sql. " where `id`='$id' ";
        }


        echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    /******************************************************************************************/


}






//測試↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
$user = new DB ("user");
echo "<pre>";
print_r($user->all(['name'=>'amy' , 'visible'=>'Y']));
echo "</pre><hr>";


echo "<pre>";
print_r($user->all(" where `name`='amy' "));
echo "</pre><hr>";


echo "<pre>";
print_r($user->all(" where `visible`='Y'", "order by `id` DESC "));
echo "</pre><hr>";

/******************************************************************************************/
echo "<pre>";
print_r($user->count(['name'=>'amy' , 'visible'=>'Y']));
echo "</pre><hr>";


echo "<pre>";
print_r($user->count(" where `name`='amy' "));
echo "</pre><hr>";


echo "<pre>";
print_r($user->count(" where `visible`='Y'", "order by `id` DESC "));
echo "</pre><hr>";
/******************************************************************************************/


echo "<pre>";
print_r($user->find(3));
echo "</pre><hr>";

echo "<pre>";
print_r($user->find([ 'level'=>'2', 'visible'=> 'N' ]));
echo "</pre><hr>";





?>