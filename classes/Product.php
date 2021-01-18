<?php
    class Product extends ConnectionBuilder{

        public $categoryInserted = null;
        public $categoryDeleted = null;
        public $brandInserted = null;
        public $brandDeleted = null;
        public $categoryUpdated = null;
        public $brandUpdated = null;
        public $productInserted = null;
        public $productStatusChanged = null;
        public $productQuantityUpdated = null;
        public $productSellingPriceUpdated = null;
        public $productPurchasePriceUpdated = null;
        public $deliveryMethodInserted = null;
        public $deliveryMethodDeleted = null;
        public $deliveryMethodNameUpdated = null;
        public $deliveryMethodPriceUpdated = null;

        public function insertCategory($categoryName){
            $sql = "insert into categories values(null,'{$categoryName}')";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->categoryInserted = true;
            }else{
                $this->categoryInserted = false;
            }
        }

        public function insertBrand($brandName){
            $sql = "insert into brands values(null,'{$brandName}' )";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->brandInserted = true;
            }else{
                $this->brandInserted = false;
            }
        }

        public function insertDeliveryMethod($deliveryMethodName,$price){
            $sql = "insert into delivery_methods values(null,'{$deliveryMethodName}',{$price} )";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->deliveryMethodInserted = true;
            }else{
                $this->deliveryMethodInserted = false;
            }
        }

        public function deleteCategory($categoryId){
            $sql = "
                    delete from products where category_id = {$categoryId};

                    delete from categories where category_id = {$categoryId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkDelete = $query->execute();

            if($checkDelete){
                $this->categoryDeleted = true;
            }else{
                $this->categoryDeleted = false;
            }
        }

        public function deleteBrand($brandId){
            $sql = "
                    delete from products where brand_id = {$brandId};
        
                    delete from brands where brand_id = {$brandId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkDelete = $query->execute();

            if($checkDelete){
                $this->brandDeleted = true;
            }else{
                $this->brandDeleted = false;
            }
        }

        public function deleteDeliveryMethod($deliveryMethodId){
            $sql = "
                    delete from delivery_methods where delivery_method_id = {$deliveryMethodId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkDelete = $query->execute();

            if($checkDelete){
                $this->deliveryMethodDeleted = true;
            }else{
                $this->deliveryMethodDeleted = false;
            }
        }

        public function selectAllCategories(){
            $sql = "select * 
                    from categories c
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectDeliveryMethods(){
            $sql = "select * 
                    from delivery_methods dm
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectAllBrands(){
            $sql = "select * 
                    from brands b
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectAllProducts($search,$categoryId,$brandId,$this_page_first_result,$results_per_page){
            $sql = "select  p.product_id
                            ,p.name as product_name
                            ,p.size
                            ,p.quantity
                            ,p.purchase_price
                            ,p.selling_price
                            ,p.image
                            ,c.name as category_name
                            ,b.name as brand_name
                    from products p
                    inner join product_statuses ps on ps.product_status_id = p.product_status_id
                    inner join categories c on c.category_id = p.category_id
                    inner join brands b on b.brand_id = p.brand_id
                    where   (p.category_id = {$categoryId} or $categoryId = 0)
                            and (p.brand_id = {$brandId} or $brandId = 0)
                            and (p.name like '%$search%' or c.name like '%$search%' or b.name like '%$search%')
                            and ps.product_status = 'Active'
                    limit {$this_page_first_result},{$results_per_page};
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectTop10Products($this_page_first_result,$results_per_page){
            $sql = "select  p.product_id
                            ,p.name as product_name
                            ,p.size
                            ,p.quantity
                            ,p.purchase_price
                            ,p.selling_price
                            ,p.image
                            ,c.name as category_name
                            ,b.name as brand_name
                    from products p
                    inner join product_statuses ps on ps.product_status_id = p.product_status_id
                    inner join categories c on c.category_id = p.category_id
                    inner join brands b on b.brand_id = p.brand_id
                    where ps.product_status = 'Active'
                    limit {$this_page_first_result},{$results_per_page};
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function updateCategory($categoryId,$categoryNameNew){
            $sql = "
                    update categories set name='{$categoryNameNew}' where category_id = {$categoryId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->categoryUpdated = true;
            }else{
                $this->categoryUpdated = false;
            }
        }

        public function updateBrand($brandId,$brandNameNew){
            $sql = "
                    update brands set name='{$brandNameNew}' where brand_id = {$brandId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->brandUpdated = true;
            }else{
                $this->brandUpdated = false;
            }
        }

        public function updateDeliveryMethodName($deliveryMethodId,$deliveryMethodNameNew){
            $sql = "
                    update delivery_methods set delivery_method = '{$deliveryMethodNameNew}' where delivery_method_id = {$deliveryMethodId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->deliveryMethodNameUpdated = true;
            }else{
                $this->deliveryMethodNameUpdated = false;
            }
        }

        public function updateDeliveryMethodPrice($deliveryMethodId,$deliveryMethodPriceNew){
            $sql = "
                    update delivery_methods set delivery_price = '{$deliveryMethodPriceNew}' where delivery_method_id = {$deliveryMethodId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->deliveryMethodPriceUpdated = true;
            }else{
                $this->deliveryMethodPriceUpdated = false;
            }
        }

        public function uploadPicture($picture){
            $target_dir = "../images/";
            $target_file = $target_dir . basename($picture["name"]) ;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if file already exists
                if (file_exists($target_file)) {
                    //echo "Sorry, file already exists.";
                $uploadOk = 0;
                }
            
                // Check file size
                if ($picture["size"] > 10000000) {
                    //echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    //echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
                $uploadOk = 0;
                }
            
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                if (move_uploaded_file($picture["tmp_name"], $target_file)) {
                    echo "The file " . basename( $picture["name"] ) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            
            //return $target_file;
            return '/shop/images/'.$picture["name"];
            }         

            public function insertProduct($brandId,$categoryId,$name,$size,$quantity,$purchasePrice,$sellingPrice,$otherInformation,$image1Path){
                $sql = "insert into products values(null,{$brandId},{$categoryId},'{$name}',{$size},{$quantity},{$purchasePrice},{$sellingPrice},'{$otherInformation}','{$image1Path}',1 )";
                $query = $this->conn->prepare($sql);
                $checkInsert = $query->execute();
    
                if($checkInsert){
                    $this->productInserted = true;
                }else{
                    $this->productInserted = false;
                }
            }

            public function selectProducts(){
                $sql = "select  p.*, b.name as brand_name, ps.product_status as product_status
                        from products p
                        inner join product_statuses ps on ps.product_status_id = p.product_status_id
                        inner join brands b on b.brand_id = p.brand_id
                        order by ps.product_status
                        ";
    
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }

            public function selectProducts2(){
                $sql = "select  p.*, b.name as brand_name, ps.product_status as product_status
                        from products p
                        inner join product_statuses ps on ps.product_status_id = p.product_status_id
                        inner join brands b on b.brand_id = p.brand_id
                        order by p.product_id
                        ";
    
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }

            public function selectProductStatuses(){
                $sql = "select *
                        from product_statuses
                        ";
    
                $query = $this->conn->prepare($sql);
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }

            public function updateProductStatus($productId,$productStatusId){
                $sql = "
                        update products set product_status_id = {$productStatusId} where product_id = {$productId};
                        ";
                $query = $this->conn->prepare($sql);
                $checkUpdate = $query->execute();
    
                if($checkUpdate){
                    $this->productStatusChanged = true;
                }else{
                    $this->productStatusChanged = false;
                }
            }            

            public function updateProductQuantity($productId,$quantity){
                $sql = "
                        update products set quantity = {$quantity} where product_id = {$productId};
                        ";
                $query = $this->conn->prepare($sql);
                $checkUpdate = $query->execute();
    
                if($checkUpdate){
                    $this->productQuantityUpdated = true;
                }else{
                    $this->productQuantityUpdated = false;
                }
            }
            
            public function updateProductSellingPrice($productId,$sellingPrice){
                $sql = "
                        update products set selling_price = {$sellingPrice} where product_id = {$productId};
                        ";
                $query = $this->conn->prepare($sql);
                $checkUpdate = $query->execute();
    
                if($checkUpdate){
                    $this->productSellingPriceUpdated = true;
                }else{
                    $this->productSellingPriceUpdated = false;
                }
            }

            public function updateProductPurchasePrice($productId,$purchasePrice){
                $sql = "
                        update products set purchase_price = {$purchasePrice} where product_id = {$productId};
                        ";
                $query = $this->conn->prepare($sql);
                $checkUpdate = $query->execute();
    
                if($checkUpdate){
                    $this->productPurchasePriceUpdated = true;
                }else{
                    $this->productPurchasePriceUpdated = false;
                }
            }

    }
?>