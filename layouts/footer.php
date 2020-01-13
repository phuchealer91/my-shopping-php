<div class="clearfix"></div>
<div class="our-brand">
    <h3 class="title"><span>Our Brands</span></h3>
    <!-- <div class="control"><a id="prev_brand" class="prev" href="#">&lt;</a><a id="next_brand"
            class="next" href="#">&gt;</a></div> -->
    <div class="carousel-wrap">
        <div class="owl-carousel">
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/envato.png" ></div>
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/themeforest.png"></div>
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/photodune.png"></div>
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/activeden.png"></div>
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/envato.png"></div>
            <div class="item"><img src="<?php echo basic_link() ?>public/frontend/images/envato.png"></div>
        </div>
    </div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="footer">
    <div class="footer-info">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-logo"><a href="#"><img src="<?php echo basic_link() ?>public/frontend/images/logo.png" alt=""></a></div>
                </div>
                <div class="col-md-3 col-sm-6 contact">
                    <h4 class="title">Liên hệ</h4>
                    <p>Số 44, hẻm 4, Mậu Thân, Cần Thơ</p>
                    <p>Điện Thoại: 1900 1008</p>
                    <p>Email : phucb1706630@student.ctu.edu.vn</p>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h4 class="title">Hỗ trợ khách hàng</h4>
                    <ul class="support">
                        <li><a href="#">Thông tin sản phẩm</a></li>
                        <li><a href="#">Giao hàng</a></li>
                        <li><a href="#">Thanh toán</a></li>
                        <li><a href="#">Thông tin khác</a></li>
                    </ul>
                </div>
                <div class="col-md-3 ">
                    <h4 class="title">Nhận thông tin</h4>
                    <p class="sendContact">Hãy gửi thông tin cho chúng tôi</p>
                    <form class="newsletter">
                        <input type="text" name="" placeholder="Điền email của bạn...">
                        <input type="submit" value="Gửi" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-info">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright ©2019. Designed by <a href="#">Minh Phúc</a>. All rights reseved</p>
                </div>
                <div class="col-md-6">
                    <ul class="social-icon">
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="<?php echo basic_link() ?>public/frontend/js/jquery.min.js?v=12456"></script>
<script src="<?php echo basic_link() ?>public/frontend/js/bootstrap.min.js?v=12456"></script>
<script src="<?php echo basic_link() ?>public/frontend/js/slick.min.js?v=12456"></script>
<script src="<?php echo basic_link() ?>public/frontend/js/owl.carousel.min.js?v=12456"></script>
<script src="<?php echo basic_link() ?>public/frontend/js/owlBrands.js?v=12456"></script>
<script type="text/javascript">
    window.onload = function(){
        $slideshow = $('.slider').slick({
            dots:true,
            autoplay:true,
            arrows:true,
            prevArrow:'<button type="button" class="slick-prev"></button>',
            nextArrow:'<button type="button" class="slick-next"></button>',
            slidesToShow:1,
            slidesToScroll:1
        });
        $('.slide').click(function() {
            $slideshow.slick('slickGoTo', parseInt($slideshow.slick('slickCurrentSlide'))+1);
        });
    };
    $(document).ready(function () {
        var dropper = $("a#drop"),
            menu = $("nav>ul");
        subMenu = $("nav>ul>li.submenu");
        link = menu.find("li"),
            dropper.on("click", function(e) {
                menu.slideToggle();
                e.preventDefault();
            });
        $(window).resize(function() {
            var winWidth = $(this).width();
            if (winWidth > 800 && menu.is(":hidden")) {
                menu.removeAttr("style");
            }
        });
        link.on("click", function() {
            var winWidth = $(window).width();
            if (winWidth < 800 && !$(this).hasClass("submenu"))     {
                menu.slideToggle();
            }
        });
        subMenu.hover(function() {
            $(this).children("ul").stop().slideDown("fast");
        }, function() {
            $(this).children("ul").stop().slideUp("fast");
        });
    });
    $('.center').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
//    axjax
    // Khi người dùng click Đăng ký

</script>
</body>
</html>
