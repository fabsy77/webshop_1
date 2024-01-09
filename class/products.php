<?php
    include_once 'MyPDO.php';

class Product{

    private $db;
    
    public function __construct() {
      $this->db= new MyPDO;
    }

    public function create( $name, $description, $price, $image){

        $param = [':uname' => $name,
                  ':udescription'=> $description,
                  ':uprice' => $price,
                  ':uimage'=>$image         
        ];
        $query = $this->db->query('INSERT INTO products( name, description, price, image)
         VALUES(:uname, :udescription, :uprice, :uimage)', $param, true);

         return $query;
    }

    // funcao que atualiza os dados dos produtos registrados
    public function update( $id, $name, $description, $price, $image){

        $param = [':uid' => $id,
                  ':uname' => $name,
                  ':udescription' => $description,
                  ':uprice' => $price,
                  ':uimage' => $image
                 
    ];
        $query = $this->db->query('UPDATE products SET  name = :uname, description = :udescription, price = :uprice, image = :uimage WHERE id = :uid', $param, true);
         return $query;
    }
    //funcao que retorna todos os produtos inseridos na tabela
    public function getAll(){

        $query = $this->db->query('SELECT * FROM products');

        return $query;
    }
    
    //funcao que retorna 1 produto especifico atraves do id
    public function getById($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('SELECT * FROM products WHERE id = :uid', $param);

        return $query;

    }

    // funcao que deleta 1 registro de  produto atraves do id
    public function delete($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('DELETE FROM products WHERE id = :uid', $param);

        return $query;
    }





}


?>