<?php
    class Order extends ConnectionBuilder{

        public $orderInserted = null;

        public function insertOrder($maxUserTranId,$userName,$userSurname,$userAddress,$userZipCode,$userCity,$userMunicipality,$phone,$deliveryMethodId){
            $sql = "
                insert into orders values(null,{$maxUserTranId},'{$userName}','{$userSurname}','{$userAddress}','{$userZipCode}','{$userCity}','{$userMunicipality}','{$phone}','{$deliveryMethodId}',CURRENT_TIMESTAMP() )
            ";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->orderInserted = true;
            }else{
                $this->orderInserted = false;
            }
        }
    }
?>