<?php

if ( session_status() !== PHP_SESSION_ACTIVE )
 {
    session_start();
}

class MyPDO{

    private $pdo;
    const PARAM_host='192.168.178.34';
    const PARAM_port='3306';
    const PARAM_db_name='webshop2023new';
    const PARAM_user='root';
    const PARAM_db_pass='';

    public function __construct(){
        $this->pdo = new PDO('mysql:host='.MyPDO::PARAM_host.';port='.MyPDO::PARAM_port.';dbname='.MyPDO::PARAM_db_name,
        MyPDO::PARAM_user, MyPDO::PARAM_db_pass);
    }

    public function query($query, $param = [], $insert = false){

        $queryPrepare = $this->pdo->prepare($query);

        if(!empty($param)){

            foreach($param as $column => $value){

                $queryPrepare->bindValue($column, $value);
            }
        }
        $exec = $queryPrepare->execute();
        
        if($insert){
            
         return $exec;
        }
        
        return $queryPrepare->fetchAll(PDO::FETCH_ASSOC);

    }

}
   

    


?>