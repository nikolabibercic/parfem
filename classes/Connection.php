<?php
    class Connection{
        
        public $host='localhost';
        public $dbname='parfemi';
        public $username='root';
        public $password='';

        public function connect(){
            try{
                return new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8",$this->username,$this->password);
            }catch(PDOException $e){
                echo 'Error'.$e->getMessage();
            }
        }
    }