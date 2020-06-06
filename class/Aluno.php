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

        public function __toString(){
            return json_encode(array(
                "id"=>$this->getId(),
                "nomealuno"=>$this->getNomeAluno(),
                "serie"=>$this->getSerie()
            ));
        }


    }





?>