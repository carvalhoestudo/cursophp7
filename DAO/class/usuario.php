<?php

class Usuario {
    //Dados da tabela do BD.
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    //Criando método RESULTS para retorno de resultados
    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro(new DateTime($data['dtcadastro']));
    } 

    //Criando método para carregar pelo ID do Usuário.
    public function loadByid($id){
        //Conecatando o banco de dados.
        $sql = new Sql();

        //Selecionando os dados da BD.
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        //Preenchendo os atributos com os dados da tabela do BD.
        if(count($results) > 0 ){
            //Aplicando método RESULTS encurtado.
            $this->setData($results[0]);
        }

    }

    //Exibindo uma lista Ordenada de usuarios da tabela do BD.
    public static function getList(){
        //Conecatando o banco de dados.
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

    }

    //Buscando usuarios por login na tabela usuarios do BD.
    public static function search($login){
        //Conectando o banco de dados.
        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ":SEARCH"=>"%".$login."%"
        ));

    }

    //Exibindo dados do usuarios logados.
    public function Logged($logged, $password){
        //Conectando ao BD.
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGGED AND dessenha = :PASSWORD", array(
            ":LOGGED"=>$logged,
            ":PASSWORD"=>$password
        ));

        if(count($results) > 0){
            //Aplicando método RESULTS encurtado.
            $this->setData($results[0]);

        } else {

            throw new Exception("Login e/ou senha inválidos!");
        }
    }

    //Criando método INSERT.
    public function insert(){
        //Conectando ao BD.
        $sql = new Sql();

        //Criando uma procedure no BD com retorno de ID.
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ":LOGIN"=>$this->getDeslogin(),
            ":PASSWORD"=>$this->getDessenha()
        ));

        if (count($results) > 0){
            //Aplicando método RESULTS encurtado.
            $this->setData($results[0]);
        }
    }

    //Criando método DELETE
    public function delete(){
        //Conectando ao BD.
        $sql = new Sql();

        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$this->getIdusuario()
        ));

        //Limpar os dado
        $this->setIdusuario(0);
        $this->setDeslogin("");
        $this->setDessenha("");
        $this->setDtcadastro(new DateTime());
    }

    //Método construtor para inserir usuarios
    public function __construct($login = "", $password = ""){

        $this->setDeslogin($login);
        $this->setDessenha($password);        
    }

    //Método para atualizar dados de usuarios
    public function update($login, $password){
        //Determinando variaveis que podem ser alteradas.
        $this->setDeslogin($login);
        $this->setDessenha($password);

        //Conectando ao BD.
        $sql = new Sql();

        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
            ":LOGIN"=>$this->getDeslogin(),
            ":PASSWORD"=>$this->getDessenha(),
            ":ID"=>$this->getIdusuario()
        ));
    }

    //Exibindo os dados de um determinado usuario da tabela do BD.
    public function __toString(){

        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));
        
    }

}

?>