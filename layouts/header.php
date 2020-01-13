<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo basic_link() ?><!--public/frontend/css/bootstrap.css">-->
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/fontawesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/responsive.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/header.css?v=62638">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/config.css?v=22456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/menu.css?v22334">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/cartSearch.css?v=12367">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/slider.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/products.css?v=49806">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/owl.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/footer.css?v=22334">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/category.css?v=71394">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/slick.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/slick-theme.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/detail.css">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/owl.carousel.min.css?v=12456">
    <link rel="stylesheet" href="<?php echo basic_link() ?>public/frontend/css/owl.theme.default.min.css?v=12456">
    <title>Shoppe</title>
</head>

<body id="home" >
<div class="wrapper">
    <div class="header">
        <div class="container" >
            <div class="row">
                <div class="logo"><a href="logo.html"><img src="public/frontend/images/logo.png" alt="logo"></a></div>
                <div class="col-md-10 col-sm-12">
                    <div class="header_top">
                        <div class="row">
                            <div class="col-md-9 col-sm-12">
                                <ul class="topmenu">
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Dịch vụ</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <ul class="usermenu">
                                    <li class="dropdown">
                                            <a href="" class="us dropdbtn" >My Account</a>
                                            <ul class="dropdown-content">
                                                <li><a href="#">Link 1</a></li>
                                                <li><a href="#">Link 1</a></li>
                                                <li><a href="#">Link 1</a></li>
                                            </ul>
                                    </li>
                                    <?php include_once("handle-dang-nhap.php");?>
                                    <?php include_once("handle-dang-ky.php");?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="clearfix"></div> -->
                    <nav class="navbar navbar-expand-sm navbar-light">
                        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                                data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span><i class="fa fa-align-justify"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?php echo basic_link()?>">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Đồ Nam</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Đồ Nữ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Khuyến Mãi</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">Áo Khoác</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                                        <a class="dropdown-item" href="#">Áo khoác ma bư</a>
                                        <a class="dropdown-item" href="#">Áo khoác TNX</a>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <ul class="option">
                            <li id="search" class="search">
                                <form>
                                    <input class="search-input" placeholder="Tìm kiếm......" type="text" value=""
                                           name="search">
                                    <input class="search-submit" type="submit" value="">
                                </form>
                            </li>
                            <li class="option-cart">
                                <a href="#" class="cart-icon">Giỏ hàng <span class="cart_no">02</span></a>
                                <ul class="option-cart-item">
                                    <li>
                                        <div class="cart-item">
                                            <div class="image"><img src=""
                                                                    alt=""></div>
                                            <div class="item-description">
                                                <p class="name">Lincoln chair</p>
                                                <p>Kích thước: <span class="light-red">20 cm</span><br>Số lượng:
                                                    <span class="light-red">01</span></p>
                                            </div>
                                            <div class="right">
                                                <p class="price">300.000 VND</p>
                                                <a href="#" class="remove"><img src="public/frontend/images/remove.png"
                                                                                alt="remove"></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><span class="total">TỔNG:<strong>300.00 VND</strong></span><button
                                                class="checkout" onClick="location.href='checkout.html'">Đặt
                                            Hàng</button></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
<!--                        <div class="navbar-header">-->
<!--                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">-->
<!--                                <i class="fa fa-bars"></i>-->
<!--                            </button>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>