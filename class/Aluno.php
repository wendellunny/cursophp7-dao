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
                $row = $results[0];
                $this->setId($row['id']);
                $this->setNomeAluno($row['nomealuno']);
                $this->setSerie($row['serie']);
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
                $row = $results[0];
                $this->setId($row['id']);
                $this->setNomeAluno($row['nomealuno']);
                $this->setSerie($row['serie']);
            }else {
                throw new Exception("Login ou/e Senha Invalidos");
                
            }
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