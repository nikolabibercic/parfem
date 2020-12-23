<?php
    class Transaction extends ConnectionBuilder{

        public $transactionInserted = null;
        public $cartItemsTransactionsInserted = null;

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

        public function selectAllDeliveryMethods(){
            $sql = "select * 
                    from delivery_methods dm
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectMaxUserTransaction($userId){
            $sql = "
                    SELECT transaction_id
                    FROM transactions
                    WHERE   transaction_status_id = 1 
                            and user_id = {$userId}
                            and transaction_id = (  SELECT max(transaction_id) 
                                                    FROM transactions
                                                    WHERE transaction_status_id = 1 and user_id = {$userId} )
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function updateUserTranStatus($maxUserTranId){
            $sql = "
                    update transactions 
                    set transaction_status_id = 2, transaction_date = CURRENT_TIMESTAMP()
                    where transaction_id = {$maxUserTranId};
                    ";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        public function selectUserCartItemId($userId){
            $sql = "        
                    select c.cart_id
                    from carts c
                    where c.user_id = {$userId}
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function insertUserCartItemsTransactions($userId,$maxUserTranId){
            $sql = "
                insert into cart_items_transactions (
                    transaction_id,
                    cart_item_id,
                    cart_item_transaction_date
                )
                select
                    {$maxUserTranId},
                    ci.cart_item_id,
                    CURRENT_TIMESTAMP() 
                from cart_items ci
                inner join carts c on c.cart_id = ci.cart_id and ci.cart_item_status_id = 1 and c.user_id = {$userId}
            ";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->cartItemsTransactionsInserted = true;
            }else{
                $this->cartItemsTransactionsInserted = false;
            }
        }

        public function updateUserCartItemStatus($userId){
            $sql = "
                    update cart_items 
                    set cart_item_status_id = 2
                    where   cart_item_status_id = 1
                            and cart_id = (
                                select c.cart_id
                                from carts c
                                where c.user_id = {$userId}
                            )
                    ";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }
    }
?>