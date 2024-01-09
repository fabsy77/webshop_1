<?php
    include_once 'MyPDO.php';

class CreditCard{

    private $db;
    
    public function __construct() {
      $this->db = new MyPDO;
    }

    //cria um cartao e retorna o id do cartao criado 
    public function create( $card_owner, $card_number, $card_type){

        $param = [':ucard_owner' => $card_owner,
                  ':ucard_number' => $card_number,
                  ':ucard_type' => $card_type
            
    ];
         $this->db->query('INSERT INTO credit_cards (card_owner, card_number, card_type)
         VALUES(:ucard_owner, :ucard_number, :ucard_type) ', $param, true);

         $query = $this->db->query('SELECT AS @@identity AS id');
         return $query;

    }   
    
    public function getCreditCardById($id){
        $param = [ ':uid' => $id

        ];
        $query = $this->db->query('SELECT * FROM credit_cards  WHERE id = :uid ', $param) ;

        return $query;



    }

}


?>