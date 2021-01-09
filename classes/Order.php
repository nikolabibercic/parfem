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

        public function selectOrders(){
            $sql = "select *
                    from orders o
                    inner join delivery_methods dm on dm.delivery_method_id = o.delivery_method_id
                    order by o.order_date desc
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectOrderDetails($transactionId){
            $sql = "select ci.cart_item_id, ci.product_name, ci.brand_name, ci.category_name, ci.size, ci.selling_price, cis.cart_item_status
                    from orders o
                    inner join cart_items_transactions cit on cit.transaction_id = o.transaction_id
                    inner join cart_items ci on ci.cart_item_id = cit.cart_item_id
                    inner join cart_item_statuses cis on cis.cart_item_status_id = ci.cart_item_status_id
                    where o.transaction_id = {$transactionId}
                    order by ci.product_name, ci.brand_name
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

    }
?>