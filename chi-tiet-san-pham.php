<?php
require_once  __DIR__. "/autoload/autoload.php";
    $id = intval(getInput('id'));
//    $id_cate = intval(getInput('category_id'));
//    if(intval(getInput('category_id')) > 0 && intval(getInput('category_id')) < 5){
//        $id_cate2 = intval(getInput('category_id')+1);
//    }
//    else{
//        $id_cate2 = 1;
//    }
    $product = $db->fetchID("product",$id);
//    $cate = "SELECT * FROM product WHERE id = '$id_cate'";
//    $id_cate = $db->fetchsql($cate);
//    $ids = intval($id_cate['category_id']);
    $id_cate = intval($product['category_id']);
    if($id_cate > 0 && $id_cate < 5){
        $id_cate2 = $id_cate + 1;
    }
    else {
        $id_cate2 = 1;
    }
    $sql = "SELECT * FROM product WHERE category_id = '$id_cate'";
    $sql2 = "SELECT * FROM product WHERE category_id = '$id_cate2' LIMIT 3";
    $product_img = $db->fetchsql($sql);
    $product_img2 = $db->fetchsql($sql2);
?>
<?php require_once  __DIR__. "/layouts/header.php"; ?>
<div class="container_fullwidth">
    <div class="container">
        <div class="hot-products">
            <h3 class="title"><span>Chi tiết sản phẩm </span></h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-9">
                            <div class="product-detail">
                                <div class="product-main ">
                                    <div class="product-img">
                                        <img class="thumbnails" src="<?php echo uploads() ?>product/<?php echo $product['thunbar']?>" alt="">
                                    </div>
                                    <div class="product-img-small">
                                        <div class="slider center ">
                                            <?php foreach ($product_img as $item) {?>
                                            <div class="item">
                                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                                                    <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>" alt=""></a>
                                            </div >
                                            <?php }?>
                                        </div>

                                    </div>
                                </div>
                                <div class="product-desc">
                                    <h5 class="name"><?php echo $product['name']?></h5>
                                    <p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </p>
                                    <p class="desc"><?php echo $product['content']?></p>
                                    <hr class="line">
                                    <div class="">
                                        <?php if($product['sale'] > 0) {?>
                                            <h5 class="price"><strike><?php echo formatPrice($product['price']) ?> VND</strike></h5>
                                        <?php }?>
                                        <h4 class="price <?php echo ($product['sale'] == 0) ? 'mx' : '';?>"><?php echo formatpricesale($product['price'],$product['sale']) ?> VND</h4>
                                    </div>
                                    <hr class="line">
                                    <div class="add-main">
                                        <div class="quantity">
                                            <span>Quantity: </span>
                                            <select name="" id="">
                                                <option value="">1</option>
                                            </select>
                                        </div>
                                        <div class="button_group <?php echo ($product['sale'] == 0) ? 'mx' : '';?>">
                                            <button class="button add-cart" type="button">Chọn Mua</button>
                                            <button class="button compare" type="button">
                                                <i class="fa fa-exchange"></i>
                                            </button>
                                            <button class="button wishlist" type="button">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả chi tiết</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Liên hệ</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <?php echo $product['content']?>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae eligendi error est id, laudantium molestiae mollitia natus sequi voluptate voluptatum!
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae eligendi error est id, laudantium molestiae mollitia natus sequi voluptate voluptatum!
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="special-deal">
                                <h4 class="title">SPECIAL DEALS</h4>
                                <?php foreach ($product_img2 as $item) {?>
                                <div class="special-item">
                                    <div class="product-item-img">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>">
                                            <img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?> " alt="">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <p><?php echo $item['name']?></p>
                                        <?php if($item['sale'] > 0) {?>
                                            <h5 class="price"><strike><?php echo formatPrice($item['price']) ?> VND</strike></h5>
                                        <?php }?>
                                        <h4 class="price <?php echo ($item['sale'] == 0) ? 'mx' : '';?>"><?php echo formatpricesale($item['price'],$item['sale']) ?> VND</h4>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <div class="special-tag">
                                <h4 class="title">SPECIAL CATEGORYS</h4>
                                <ul>
                                    <?php foreach ($category as $item) {?>
                                    <li class="submenu">
                                        <a href="danh-muc-san-pham.php?id=<?php echo $item['id']?>"><i class="fa fa-bookmark"></i> <?php echo $item['name']?></a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <?php require_once  __DIR__. "/layouts/productHOT.php"; ?>
        <?php require_once  __DIR__. "/layouts/footer.php"; ?>
