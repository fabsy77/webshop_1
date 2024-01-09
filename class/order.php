<?php
    include_once 'MyPDO.php';

class Order{

    private $db;

    public function __construct() {
      $this->db= new MyPDO;
    }

    public function create( $cart_id, $credit_card, $payment_type){

        $param = [':ucart_id' => $cart_id,
                  ':ucredit_card'=> $credit_card,
                  ':upayment_type' => $payment_type         
                ];
        $query = $this->db->query('INSERT INTO orders( cart_id, credit_card_id, payment_type_id)
         VALUES(:ucart_id, :ucredit_card, :upayment_type)', $param, true);

         return $query;
    }

    public function update( $id, $cart_id, $credit_card){

        $param = [':uid' => $id,
                  ':ucart_id' => $cart_id,
                  ':ucredit_card'=> $credit_card     
                 
    ];
        $query = $this->db->query('UPDATE orders SET  id = :uid, cart_id = :ucart_id, credit_card_id = :ucredit_card WHERE id = :uid', $param, true);
         return $query;
    }
    //funcao que retorna todos os produtos inseridos na tabela
    public function getAll(){

        $query = $this->db->query('SELECT * FROM orders');

        return $query;
    }
    //funcao que retorna 1 produto especifico atraves do id
    public function getById($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('SELECT * FROM orders WHERE id = :uid', $param);

        return $query;

    }

    
    public function delete($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('DELETE FROM orders WHERE id = :uid', $param);

        return $query;
    }






}


?>