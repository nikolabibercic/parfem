<?php
    class Pagionation extends ConnectionBuilder{

        public $results_per_page = 5;

        public function numberOfProducts($search,$categoryId,$brandId){
            $sql = "select  count(*) number_of_products
                    from products p
                    inner join categories c on c.category_id = p.category_id
                    inner join brands b on b.brand_id = p.brand_id
                    where (p.category_id = {$categoryId} or $categoryId = 0)
                    and (p.brand_id = {$brandId} or $brandId = 0)
                    and (p.name like '%$search%' or c.name like '%$search%' or b.name like '%$search%')
                    and p.product_status_id = 1
                    ";
    
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }
    }
?>