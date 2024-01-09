<?php
    include_once 'MyPDO.php';

class Cart{

    private $db;
    
    public function __construct() {
      $this->db= new MyPDO;
    }
    // insere um registro na tabela carrinho associado ao usuario logado na sessao
    public function create($user_id){
        $param = [ ':uuser_id'=>$user_id,
                   
    ];
        $query= $this->db->query('INSERT INTO carts(user_id, status) VALUES (:uuser_id, "open")', $param, true);

        return $query;
    }
    public function update( $id, $status){
        $param = [':uid' => $id,
                  ':ustatus' => $status
    ];

        $query = $this->db->query('UPDATE carts SET status = :ustatus WHERE id = :uid', $param, true);

        return $query;             
    }
    //funcao que retorna todos os produtos inseridos na tabela
    public function getAllCarts(){

        $query = $this->db->query('SELECT * FROM carts');

        return $query;
    }
    
    public function getCartById($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('SELECT * FROM carts WHERE id = :uid', $param);

        return $query;

    }

    
    public function delete($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('DELETE FROM carts WHERE id = :uid', $param);

        return $query;
    }







}


?>