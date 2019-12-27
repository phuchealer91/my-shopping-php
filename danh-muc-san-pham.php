<?php
require_once  __DIR__. "/autoload/autoload.php";
     $id = intval(getInput('id'));
     $categoryName = $db->fetchID("category",$id);

    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p = 1;
    }
     $sql_sp = "SELECT * FROM product WHERE category_id = '$id'";
     $total =count($db->fetchsql($sql_sp));
     //phân trang
    $product = $db->fetchJones("product",$sql_sp,$total,$p,4,true);
    if(isset($product['page'])){
        $sotrang = $product['page'];
        unset($product['page']);
    }
    $path = $_SERVER['SCRIPT_NAME'];

?>
<?php require_once  __DIR__. "/layouts/header.php"; ?>
<div class="container_fullwidth">
    <div class="container">
        <?php require_once  __DIR__. "/layouts/category.php"; ?>
        <div class="hot-products">
            <ul id="featured">
                <li>
                    <h3 class="title"><span>Sản Phẩm <strong><?php echo $categoryName['name'] ?></strong></span></h3>
                    <div class="row">
                        <?php foreach ($product as $item) {?>
                        <div class="col-md-3 col-sm-6">
                            <div class="products">
                                <div class="thumbnail"><a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><img
                                                src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>" alt="Product Name"></a>
                                </div>
                                <div class="productname"><?php echo $item['name']?></div>
                                <?php if($item['sale'] > 0) {?>
                                    <h5 class="price"><strike><?php echo formatPrice($item['price']) ?> VND</strike></h5>
                                <?php }?>
                                <h4 class="price <?php echo ($item['sale'] == 0) ? 'mx' : '';?>"><?php echo formatpricesale($item['price'],$item['sale']) ?> VND</h4>
                                <div class="button_group <?php echo ($item['sale'] == 0) ? 'mx' : '';?>"><button class="button add-cart" type="button">Chọn
                                    Mua</button><button class="button compare" type="button"><i
                                            class="fa fa-exchange"></i></button><button class="button wishlist"
                                                                                        type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                    </div>
                    <?php }?>

        </li>
                <div class="pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $path; ?>?id=<?php echo $id;?>&&page=<?php echo ($p > 1 && $sotrang > 1) ? $p-1 : $p; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <?php for ($i=1 ; $i <= $sotrang ; $i++) {?>

                            <?php
                                if(isset($_GET['page'])){
                                    $p = $_GET['page'];
                                }
                                else{
                                    $p = 1;
                                }
                            ?>
                            <li class="page-item <?php echo ($i == $p) ? 'active' : '';?>">
                                <a class="page-link" href="<?php echo $path;?>?id=<?php echo $id;?>&&page=<?php echo $i;?>"><?php echo $i;?></a>
                                </li>
                            <?php }?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $path; ?>?id=<?php echo $id;?>&&page=<?php echo ($p < $sotrang && $sotrang > 1) ? $p+1 : $p; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </ul>
        </div>


        <?php require_once  __DIR__. "/layouts/footer.php"; ?>
