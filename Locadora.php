<?php
include_once("Pessoa.php");
include_once("Funcionario.php");
include_once("Produto.php");
include_once("Usuario.php");
include_once("Cd.php");
include_once("Dvd.php");
include_once("Bluray.php");
include_once("Conexao.php");
include_once("Locacao.php");



class Locadora{
    
    private $user = "";
    private $funcionario="";
    private $cd="";
    private $dvd="";
    private $bluray="";
    private $locacao="";
    
    
    public function setUser($user){
        if(gettype($user) == "object"){
            $this->user = $user;
        }
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function setFuncionario($func){
        if(gettype($func) == "object"){
            $this->funcionario = $func;
        }
    }
    
    public function getFuncionario(){
        return $this->funcionario;
    }
    
    public function setCd($cd){
        if(gettype($cd) == "object"){
            $this->cd = $cd;
        }
    }
    
    public function getCd(){
        return $this->cd;
    }
    
    
    public function setDvd($dvd){
        if(gettype($dvd) == "object"){
            $this->dvd = $dvd;
        }
    }
    
    public function getDvd(){
        return $this->dvd;
    }
    
    public function setBluray($blue){
        if(gettype($blue) == "object"){
            $this->bluray = $blue;
        }
    }
    
    public function getBluray(){
        return $this->bluray;
    }
    
    public function setLocacao($loc){
        if(is_object($loc)){
            $this->locacao = $loc;
        }
    }
    
    
    public function __construct($user,$funcionario,$cd,$dvd,$bluray,$locacao){
        
        $this->setUser($user);
        $this->setFuncionario($funcionario);
        $this->setCd($cd);
        $this->setDvd($dvd);
        $this->setBluray($bluray);
        $this->setLocacao($locacao);
    }
    
   
    
    public function criarUsuario($nome,$telefone,$endereco,$locacao) {
        $objConexão = new Conexao();
        $conexao = $objConexão->connect();
        $stmt = $conexao->prepare("insert into pessoa(NOME,TELEFONE,ENDERECO,QTD_LOCADO,TIPO)values(?,?,?,?,?)");
        $tipo = "USUARIO";
        $stmt->bindParam(1,$nome);
        $stmt->bindParam(2,$telefone);
        $stmt->bindParam(3,$endereco);
        $stmt->bindParam(4,$locacao);
        $stmt->bindParam(5,$tipo);
        
        $stmt->execute();
        
        if($stmt->errorCode() != "00000"){
            $erro = "O Erro encontrado é:".$stmt->errorCode()." :";
            $erro .= implode(",",$stmt->errorInfo());
            echo $erro;
        }
    }
    
    public function listarUsuario(){
        $tipo = "USUARIO";
        $objConect = new Conexao();
        $pre = $objConect->connect();
        $stmt = $pre->prepare("select * from pessoa WHERE TIPO = ?");
        $stmt->bindParam(1,$tipo);
        if($stmt->execute()){
            
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<td>".$rs->NOME."</td>";
                echo "<td>".$rs->TELEFONE."</td>";
                echo "<td>".$rs->ENDERECO."</td>";
                echo "<td>".$rs->QTD_LOCADO."</td>";
                echo "<td>".$rs->TIPO."</td>";
                echo "<tr>";
            }
            
        }
    }
    
    public function listarFuncionario(){
        $tipo = "FUNCIONÁRIO";
        $objConect = new Conexao();
        $pre = $objConect->connect();
        $stmt = $pre->prepare("select * from pessoa where  TIPO = ?");
        $stmt->bindParam(1,$tipo);
        if($stmt->execute()){
            
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<td>".$rs->NOME."</td>";
                echo "<td>".$rs->TELEFONE."</td>";
                echo "<td>".$rs->ENDERECO."</td>";
                echo "<td>".$rs->SALARIO."</td>";
                echo "<td>".$rs->TIPO."</td>";
                echo "<tr>";
            }
            
        }
    }

    
    public function criarFuncionario($nome,$telefone,$endereco,$salario){
        
        include_once("Conexao.php");
        $sql ="insert into pessoa(NOME,ENDERECO,TELEFONE,SALARIO,TIPO)values(?,?,?,?,?)";
                    $objConnect = new Conexao();
                    $conexao = $objConnect->connect();
                    $stmt = $conexao->prepare($sql);
                    $tipo = "FUNCIONÁRIO";
                    $stmt->bindParam(1,$nome);
                    $stmt->bindParam(2,$endereco);
                    $stmt->bindParam(3,$telefone);
                    $stmt->bindParam(4,$salario);
                    $stmt->bindParam(5,$tipo);
                    
                    $stmt->execute();
                    if($stmt->errorCode() != "00000"){
                        $erro = "Erro código " . $stmt->errorCode() . ": ";
                        $erro .= implode(",",$stmt->errorInfo());
                    }
        
        
    }
}

?>