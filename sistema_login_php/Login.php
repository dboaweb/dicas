<?php

class Login {

    const SESSION = 'session_login';
    private $pdoObj;
    private $user;
    private $pass;

    public function __construct($dsn, $user, $pass) {
        $this->connect($dsn, $user, $pass);
    }

    private function connect($dsn, $user, $pass) {
        $this->pdoObj = new PDO($dsn, $user, $pass);
    }

    private function checkLogin() {
        //esse select retorna quantos registros tem com esse usuario e senha
        $sql = "Select count(*) as qnt, id_login From tbl_login where login='{$this->user}' and password='{$this->pass}'";
        $resultObj = $this->pdoObj->prepare($sql);
        $resultObj->execute();
        //cria o obheto de login
        $loginObj = $resultObj->fetch(PDO::FETCH_OBJ); 
        //se existir um ou mais registros ele retorna o id do usuario, senaum retorna false
        return $loginObj->qnt > 0?$loginObj->id_login:false;
    }

    public function logar($user, $pass) {
        //o addslashes subistitui isso ' por isso \', para naum avar problema com injection
        $this->user = addslashes($user);
        //ele transforma em um hash para seguranca
        $this->pass = md5($user);
        
        //verifica o login
        $idLogin = $this->checkLogin();
        //caso exista o login ele cria uma sessao com id do usuário
        if($idLogin){
            //para o nome da sessão será usada a constante declarada á no começo
            $_SESSION[self::SESSION] = $idLogin;
            return true;
        }else{
            return false;
        }
    }
    
    public function isLogged(){
        return isset($_SESSION[self::SESSION]);
    }
    
    public function loggoff(){
        unset($_SESSION[self::SESSION]);
    }

}