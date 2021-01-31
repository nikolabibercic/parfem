<?php
    require '../objects.php';

    $categoryId = $_GET['categoryId'];

    echo '<label for="">Brend:</label>';
    echo '<select name="brandId" class="form-control" id="exampleFormControlSelect1" >';
        echo '<option value="0">Sve</option>';
        $result = $product->selectBrandsList($categoryId);
        if(isset($result)){
            foreach($result as $x){
                echo '<option value='.$x->brand_id.' class="form-control">'.$x->name.'</option>';
            };
        }
    echo '</select><br>';
?>