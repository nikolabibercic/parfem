<?php
    class Transaction extends ConnectionBuilder{

        public $transactionInserted = null;

        public function insertTransaction($userId){
            $sql = "
                insert into transactions values(null,{$userId},CURRENT_TIMESTAMP(),1 )
            ";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->transactionInserted = true;
            }else{
                $this->transactionInserted = false;
            }
        }
    }
?>