<div class="hot-products">
    <h3 class="title"><span>Sản Phẩm Mới</span></h3>
    <ul id="hot">
        <li>
            <div class="row">
                <?php foreach ($productNew as $item) {?>
                <div class="col-md-3 col-sm-6">
                    <div class="products">
                        <div class="thumbnail">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id']?>"><img src="<?php echo uploads()?>product/<?php echo $item['thunbar']?>" alt="Product Name"></a>
                        </div>
                        <div class="productname"><?php echo $item['name']?></div>
                        <?php if($item['sale'] > 0) {?>
                            <h5 class="price"><strike><?php echo formatPrice($item['price']) ?> VND</strike></h5>
                        <?php }?>
                        <h4 class="price <?php echo ($item['sale'] == 0) ? 'mx' : '';?>""><?php echo formatPrice($item['price'])?> VND</h4>
                        <div class="button_group <?php echo ($item['sale'] == 0) ? 'mx' : '';?>"">
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
            <?php }?>
        </li>
    </ul>
</div>