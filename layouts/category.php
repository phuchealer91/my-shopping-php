
<h3 class="title"><span>Danh mục</span></h3>
<nav class="row">
    <a href="#" id="drop">Danh mục<i aria-hidden="true" class="icon lnr lnr-menu"></i></a>
    <?php foreach ($category as $item) { ?>
        <ul class="col-sm-12 col-md-6 col-lg-2 categorys">
            <li class="submenu">
                <a href="danh-muc-san-pham.php?id=<?php echo $item['id']?>"><i class="fa fa-bookmark"></i> <?php echo $item['name']?></a>
            </li>
        </ul>
    <?php }?>
</nav>