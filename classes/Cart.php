<?php
    class Cart extends ConnectionBuilder{

        public $itemInserted = null;

        public function insertItemIntoCart($productId,$userId){
            $sql = "
                insert into cart_items (
                    cart_id,
                    product_id,
                    product_name,
                    brand_id,
                    brand_name,
                    category_id,
                    category_name,
                    size,
                    purchase_price,
                    selling_price,
                    other_information,
                    image,
                    cart_item_status_id,
                    import_date
                )
                select
                    (
                        select c.cart_id
                        from carts c
                        where c.user_id = {$userId}
                    ) cart_id,
                    p.product_id,
                    p.name product_name,
                    b.brand_id,
                    b.name brand_name,
                    c.category_id,
                    c.name category_name,
                    p.size,
                    p.purchase_price,
                    p.selling_price,
                    p.other_information,
                    p.image,
                    1 cart_item_status_id,
                    CURRENT_TIMESTAMP() 
                from products p
                inner join brands b on b.brand_id = p.brand_id
                inner join categories c on c.category_id = p.category_id
                where p.product_id = {$productId}
            ";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->itemInserted = true;
            }else{
                $this->itemInserted = false;
            }
        }

        public function selectAllCartItems($userId){
            $sql = "select ci.* 
                    from cart_items ci
                    inner join carts c on c.cart_id = ci.cart_id
                    where ci.cart_item_status_id = 1 
                        and c.user_id = {$userId}
                    order by ci.import_date
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function CartItemsSum($userId){
            $sql = "select sum(ci.selling_price) as Price
                    from cart_items ci
                    inner join carts c on c.cart_id = ci.cart_id
                    where ci.cart_item_status_id = 1 
                        and c.user_id = {$userId}
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function cartItemsCount($userId){
            $sql = "select count(ci.cart_id) as CountItems
                    from cart_items ci
                    inner join carts c on c.cart_id = ci.cart_id
                    where ci.cart_item_status_id = 1 
                        and c.user_id = {$userId}
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

    }
?>