<?php

    include_once 'MyPDO.php';
/* 
    class User usada para autenticacao da sessao de usuario, 
    bem como a identificacao do tipo do usuario logado no sistema
*/
class User{

    //atributo privado da classe, usado para estabelecer a conexao com o banco de dados
    private $db;
    
    //cria uma instancia da classe MyPDO na classe user
    public function __construct() {
      $this->db= new MyPDO;
    }

    // 2 funcoes,insere um registro na tabela usuario, e retorna o id do usuario inserido
    public function create($first_name, $last_name, $date_of_birth, $email, $password, $role){
        $param = [ ':ufirst_name'=>$first_name,
                   ':ulast_name'=>$last_name,
                   ':udate_of_birth'=>$date_of_birth,
                   ':uemail'=>$email,
                   ':upassword'=>md5($password),
                   ':urole'=>$role
    ];
    //insere o usuario
        $this->db->query('INSERT INTO users(first_name, last_name, date_of_birth, email, password, role) 
        VALUES (:ufirst_name, :ulast_name, :udate_of_birth, :uemail, :upassword, :urole)', $param, true);
    //retorna o id do usuario inserido
        $query = $this->db->query('SELECT AS @@identity AS id');

        return $query;
    }

    // funcao para autenticacao do usuario no sistema
    public function login($email, $password){
        $param = [ ':uemail'=>$email,
                   ':upassword'=>$password

    ];
      $query = $this->db->query('SELECT * FROM users WHERE email = :uemail AND password = :upassword', $param);

        return $query; 
    }
    public function getAll(){

        $query = $this->db->query('SELECT * FROM users');

        return $query;
    }






}
?>