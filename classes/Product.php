<?php
    class Product extends ConnectionBuilder{

        public $categoryInserted = null;
        public $categoryDeleted = null;
        public $brandInserted = null;
        public $brandDeleted = null;

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

    }
?>