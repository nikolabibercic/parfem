<?php
    class Product extends ConnectionBuilder{

        public $categoryInserted = null;
        public $categoryDeleted = null;
        public $brandInserted = null;
        public $brandDeleted = null;
        public $typeInserted = null;
        public $typeDeleted = null;
        public $categoryUpdated = null;
        public $brandUpdated = null;
        public $typeUpdated = null;

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

        public function insertBrand($brandName,$categoryId){
            $sql = "insert into brands values(null,'{$brandName}',{$categoryId} )";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->brandInserted = true;
            }else{
                $this->brandInserted = false;
            }
        }

        public function insertType($typeName,$brandId){
            $sql = "insert into types values(null,'{$typeName}',{$brandId} )";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->typeInserted = true;
            }else{
                $this->typeInserted = false;
            }
        }

        public function deleteCategory($categoryId){
            $sql = "
                    delete t
                    from types t
                    inner join brands b on b.brand_id = t.brand_id
                    where b.category_id = {$categoryId};

                    delete from brands where category_id = {$categoryId};

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
                    delete from types where brand_id = {$brandId};
        
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

        public function deleteType($typeId){
            $sql = "
                    delete from types where type_id = {$typeId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkDelete = $query->execute();

            if($checkDelete){
                $this->typeDeleted = true;
            }else{
                $this->typeDeleted = false;
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

        public function selectAllBrands(){
            $sql = "select * 
                    from brands b
                    ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectAllTypes(){
            $sql = "select * 
                    from types t
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

        public function updateType($typeId,$typeNameNew){
            $sql = "
                    update types set name='{$typeNameNew}' where type_id = {$typeId};
                    ";
            $query = $this->conn->prepare($sql);
            $checkUpdate = $query->execute();

            if($checkUpdate){
                $this->typeUpdated = true;
            }else{
                $this->typeUpdated = false;
            }
        }

    }
?>