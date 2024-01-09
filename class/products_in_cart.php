<?php
    include_once 'MyPDO.php';

class ProductsInCart{

    private $db;
    
    public function __construct() {
      $this->db= new MyPDO;
    }

    public function create($product_id, $cart_id, $quantity){
        
        $param = [':uproduct_id'=>$product_id,
                  ':ucart_id'=>$cart_id,
                  ':uquantity'=>$quantity
                ];
        $query = $this->db->query('INSERT INTO products_in_carts(product_id, cart_id, quantity) 
        VALUES (:uproduct_id, :ucart_id, :uquantity)', $param, true);

        return $query; 
    }
    public function getProductsInCartById($cart_id){

      $param = [':cart_id'=>$cart_id];

      $query = $this->db->query('SELECT * FROM products_in_carts WHERE cart_id = :cart_id', $param);

      return $query;

    }

  // funcao que deleta 1 registro de  produto atraves do id
  public function delete($id){
      $param = [':uid'=>$id];

      $query = $this->db->query('DELETE FROM products_in_carts WHERE id = :uid', $param);

      return $query;
  }








}


?>