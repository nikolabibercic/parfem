<?php
   
    $number_of_products = $pagination->numberOfTop10Products();
    $results_per_page = 5;
    $number_of_pages = ceil($number_of_products[0]->number_of_products / $results_per_page);

    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page - 1) * $results_per_page;

    $products = $product->selectTop10Products($this_page_first_result,$results_per_page);


    //var_dump($products);

?>
<br>
<br>
<div class="container">
    <div class="row">


        <div class="col-12">
            <?php require 'files/products.generate.php'; //Generisanje kartica sa proizvodima ?> 
            <br>
            <br>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">     
       
                    <?php 
                        for($page=1;$page<=$number_of_pages;$page++){
                                echo '<li class="page-item"> <a class="page-link" href="index.php?page='.$page.' ">'.$page.'</a></li>';
                            }
                    ?>

                </ul>
            </nav>
            <br>
        </div>

  
    </div>
</div>