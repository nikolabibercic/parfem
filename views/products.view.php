<?php
    require '../objects.php';
    
    $search = $_GET['search'];
    $categoryId = $_GET['categoryId'];
 //   $brandId = $_GET['brandId'];
    if(isset($_GET['brandId'])){
        $brandId = $_GET['brandId'];
    }else{
        $brandId = 0;
    }

    $number_of_products = $pagination->numberOfProducts($search,$categoryId,$brandId);
    $results_per_page = $pagination->results_per_page;
    $number_of_pages = ceil($number_of_products[0]->number_of_products / $results_per_page);

    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    $this_page_first_result = ($page - 1) * $results_per_page;

    $products = $product->selectAllProducts($search,$categoryId,$brandId,$this_page_first_result,$results_per_page);

    //var_dump($products);

?>

<?php require '../partials/header.php'; ?>

<?php require '../partials/navbar.php'; ?>

<?php require '../partials/index.jumbotron.php'; ?>

<?php require '../views/products.search.view.php'; ?>

<br>

<?php if(!$products): ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-3">
            </div> 
            <div class="col-6">
                <div class="alert alert-danger" role="alert">Nisu pronađeni parfemi po zadatim parametrima!</div>
            </div>    
            <div class="col-3">
            </div>  
        </div>
    </div>
    <br>
    <br>
<?php endif; ?>


<div class="container">

    <div class="row">


        <div class="col-12">
            <?php require '../files/products.generate.php'; //Generisanje kartica sa proizvodima ?> 
            <br>
            <br>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">     
       
                    <?php 
                        for($page=1;$page<=$number_of_pages;$page++){
                                echo '<li class="page-item"> <a class="page-link" href="products.view.php?page='.$page.'&search='.$search.'&categoryId='.$categoryId.'&brandId='.$brandId.' ">'.$page.'</a></li>';
                            }
                    ?>

                </ul>
            </nav>
            <br>
        </div>


    </div>   

</div>

<?php    
    $carouselShow = $setting->selectSettingValue(16);
    if($carouselShow[0]->setting_value == 'true'){
        require '../partials/carousel.php';
    }
?>

<?php require '../partials/footer.php'; ?>



