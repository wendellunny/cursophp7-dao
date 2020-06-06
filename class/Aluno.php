<?php

    class Aluno{
        private $id;
        private $nomeAluno;
        private $serie; 
        
        
        public function getId(){
            return $this->id;
        }
        public function getNomeAluno(){
            return $this->nomeAluno;
        }
        public function getSerie(){
            return $this->serie;
        }
        public function setId($value){
            $this->id = $value;   
        }
        public function setNomeAluno($value){
            $this->nomeAluno = $value;
        }
        public function setSerie($value){
            $this->serie = $value;
        }


        public function loadById($id){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM aluno WHERE id=:ID",array(":ID"=>$id));
            if (isset($results[0])){
                $this->setData($results[0]);
            }
        
        }

        public static function getList(){
            $sql = new Sql();
            return $sql->select("SELECT * FROM aluno ORDER BY nomealuno");
        }

        public static function search($nome){
            $sql = new Sql();
            return $sql->select("SELECT * FROM aluno WHERE nomealuno LIKE :NOME ORDER BY nomealuno",array(
                ":NOME" => "%".$nome."%"
            ));
        }

        public function login ($login,$password){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM aluno WHERE nomealuno=:NOME AND serie=:SERIE",array(
                ":NOME"=>$login,
                ":SERIE" => $password
            ));
            if (isset($results[0])){
                $this->setData($results[0]);
            }else {
                throw new Exception("Login ou/e Senha Invalidos");
                
            }
        }
        public function setData($data){
            $this->setId($data['id']);
            $this->setNomeAluno($data['nomealuno']);
            $this->setSerie($data['serie']);

        }

        public function insert(){
            $sql = new Sql();
            $results = $sql->select("CALL sp_aluno_insert(:NOME,:SERIE)",array(
                ":NOME"=>$this->getNomeAluno(),
                ":SERIE"=>$this->getSerie()
            ));
            if (count($results)>0){
                $this->setData($results[0]);
            }

        }

        public function update($nome,$serie){
            $sql = new Sql();
            $this->setNomeAluno($nome);
            $this->setSerie($serie);

            $sql -> query("UPDATE aluno SET nomealuno = :NOME, serie = :SERIE WHERE id=:ID", 
            array(
                ":NOME"=>$this->getNomeAluno(),
                ":SERIE"=>$this->getSerie(),
                ":ID"=>$this->getId()
            ));
        }

        public function delete(){
            $sql = new Sql();
            $sql -> query("DELETE FROM aluno WHERE id=:ID",array(
                ":ID"=>$this->getId()
            )); 
            $this->setId(0);   
            $this->setNomeAluno("");
            $this->setSerie(""); 
        }
        public function __construct($aluno ="", $serie=""){
            $this -> setNomeAluno($aluno);
            $this -> setSerie($serie);
        }


        public function __toString(){
            return json_encode(array(
                "id"=>$this->getId(),
                "nomealuno"=>$this->getNomeAluno(),
                "serie"=>$this->getSerie()
            ));
        }


    }








?>