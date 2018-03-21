<?php
    class Conexao{
        private $connect = "";
        
        
        
        public function connect(){
            try{
                $connect = new PDO("mysql:host=localhost;dbname=locadora;","root","130490");
                $connect->exec("set names utf8");
                return $connect;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        
        
    }

?>