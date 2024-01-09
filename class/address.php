<?php
    include_once 'MyPDO.php';

class Address{

    private $db;

    public function __construct() {
      $this->db= new MyPDO;
    }

    public function create($user_id, $street, $house_number, $postal_code, $city, $type){
        $param = [ ':uuser_id'=>$user_id,
                   ':ustreet'=>$street,
                   ':uhouse_number'=>$house_number,
                   ':upostal_code'=>$postal_code,
                   ':ucity'=>$city,
                   ':utype'=>$type
    ];

        $query = $this->db->query('INSERT INTO addresses(user_id, street, house_number, postal_code, city, type) 
                        VALUES (:uuser_id, :ustreet, :uhouse_number, :upostal_code, :ucity, :utype)', $param, true);

        return $query;

    }

    public function update(){
        
    }






}


?>