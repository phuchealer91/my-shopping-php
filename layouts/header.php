<!DOCTYPE html>
<html>
    <head>
        <title>Thành PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/thanhphp/public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/thanhphp/public/frontend/css/bootstrap.min.css">  
        <script  src="/thanhphp/public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="/thanhphp/public/frontend/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/thanhphp/public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/thanhphp/public/frontend/css/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="/thanhphp/public/frontend/css/style.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>ThanhPHP</a><b>Thực tập WEB - Giáo viên : Hoàng Thị Phượng</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">   
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li>Chào, <?php echo $_SESSION['name_user']; ?></li>
                                                <li>
                                                <a href="#"><i class="fa fa-user"> </i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="thong-tin-user.php"><i class="fas fa-exchange-alt"></i>Thông tin</a></li>
                                                    <li><a href="gio-hang.php"><i class="fas fa-shopping-cart"></i>Giỏ hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>Thoát</a></li>
                                                </ul>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-lock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-user"></i> Đăng ký</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" action="tim-kiem.php">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> Sản phẩm</option>                                            
                                        </select>
                                    </label>
                                    <input type="hidden" name="id" value="find" >
                                    <input type="text" name="keyword" placeholder=" Nhập sản phẩm cần tìm" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img class="" src="../../thanhphp/public/frontend/images/u.png">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0942495160</p>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="phan-hoi.php">Phản hồi</a>
                            </li>
                            
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="gioi-thieu.php">Về chúng tôi</a>
                            </li>
                        </ul>                  
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"><i class="fa fa-shopping-basket"> </i> Giỏ hàng</a>
                            </li>
                        </ul>                    
                    </nav>
                </div>
            </div>      
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach ($category as $item) :?>
                                    <li> <a href="danh-muc-san-pham.php?id=<?php echo $item['id']  ?>"> <?php echo $item['name'] ?> </a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>                 
                            <ul>
                               <?php foreach ($productNew as $item):?>
                                    <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>">
                                       <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar']?>" width="80px" height="80px" class="img-responsive pull-left">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <?php if ($item['sale'] > 0): ?>
                                                <p> <strike class="sale"><?php echo formatPrice($item['price']) ?> </strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b>
                                            <?php else: ?>
                                                <b class="price"><?php echo formatPrice($item['price']) ?></b>
                                            <?php endif ?> 
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>  
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm bán chạy </h3>
                            <ul>
                                 <?php foreach ($productPay as $item):?>
                                    <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>">
                                       <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar']?>" width="80px" height="80px" class="img-responsive pull-left">  
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <?php if ($item['sale'] > 0): ?>
                                                <p> <strike class="sale"><?php echo formatPrice($item['price']) ?> </strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b>
                                            <?php else: ?>
                                                <b class="price"><?php echo formatPrice($item['price']) ?></b>
                                            <?php endif ?> 
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        $("header-search").keyup(function(){
            $.ajax({
                type : "get",
                url : "/tim-kiem.php",
                data:'keyword='+$(this).val(),
                beforeSend : function(){
                    $("header-search").css("background","#FFF url() no-repeat 165px");
                },
                success:function(data){
                    $("#suggesttion-box").show();
                    $("#suggesttion-box").html('').append(data);
                    $("#header-search").css("background","#FFF");
                }
                   });
        });
        $('#header-search').blur(function(){
        })
    });
    function selectCountry(val){
        $("#header-search").val(val);
        $("#suggesttion-box").hide();
    }
</script>