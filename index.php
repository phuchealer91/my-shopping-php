<?php
    require_once  __DIR__. "/autoload/autoload.php";
//    _debug($_SESSION['name_user']);
$sqlHome = "SELECT name,id FROM category WHERE home = 1 ORDER BY updated_at";
    $HomeCategory = $db->fetchsql($sqlHome);
    $datas = [];
    foreach ($HomeCategory as $item){
        $id_category = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = '$id_category'";
//        $sqls = selecionar($sql);
        $productHome = $db->fetchsql($sql);
        //Trả về mảng 2 chiều
        $datas[$item['name']] = $productHome;
//        _debug($data);
    }

?>
<?php require_once  __DIR__. "/layouts/header.php"; ?>
<!--        <div class="clearfix"></div>-->
<!--        <div class="slider-wrap">-->
<!--                <div class="slider">-->
<!--                <div class="slide">-->
<!--                  <img src="--><?php //echo basic_link() ?><!--public/frontend/images/slider-image-01.png" alt="" class="img-responsive" />-->
<!--                  <h1>THỜI TRANG THU ĐÔNG 2019</h1>-->
<!--                </div>-->
<!--                <div class="slide">-->
<!--                  <img src="--><?php //echo basic_link() ?><!--public/frontend/images/slider-image-02.png" alt="" class="img-responsive" />-->
<!--                  <h1>THỜI TRANG THU ĐÔNG 2020</h1>-->
<!--                </div>-->
<!--                <div class="slide">-->
<!--                  <img src="--><?php //echo basic_link() ?><!--public/frontend/images/slider-image-03.png" alt="" class="img-responsive" />-->
<!--                  <h1>THỜI TRANG THU ĐÔNG 2021</h1>-->
<!--                </div>-->
<!--              </div>-->
<!--              </div>-->
        <div class="container_fullwidth">
            <div class="container">
                <?php require_once  __DIR__. "/layouts/category.php"; ?>
                <?php require_once  __DIR__. "/layouts/productHOT.php"; ?>
                <div class="featured-products">
                    <ul id="featured">
                        <?php foreach ($datas as $key => $value) { ?>
                        <li>
                            <h3 class="title"><span>Sản Phẩm <?php echo $key;?></span></h3>
                            <div class="row">
                                <?php foreach ($value as $item) {?>
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
                                        <div class="button_group <?php echo ($item['sale'] == 0) ? 'mx' : '';?>""><button class="button add-cart" type="button">Chọn
                                                Mua</button><button class="button compare" type="button"><i
                                                    class="fa fa-exchange"></i></button><button class="button wishlist"
                                                type="button"><i class="fa fa-heart-o"></i></button></div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
        <?php require_once  __DIR__. "/layouts/footer.php"; ?>
