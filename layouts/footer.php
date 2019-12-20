</div>
<div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url()?>public/frontend/images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url()?>public/frontend/images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo base_url()?>public/frontend/images/deal.png"></a>
                    </div>
                </div>
                <div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">  
                           </div>
                            <div class="pull-right">    
                            </div>
                        </div>   
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">          
                                <p>WEBSITE bán quần áo công sở. </br>
                                Đến với chúng tôi, giao diện bắt mắt, dễ dàng sử dụng. </br>
                            </p>
                            </div>
                            <div class="col-md-3 box-footer" >
                                <h3 class="tittle-footer">Phạm Văn Thành</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> MSV : 16103100620</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Ngày sinh : 31/05/1998 </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Lớp : ĐH Tin10A6 </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>ĐH Kinh tế Kĩ thuật Công nghiệp</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Nam Trực - Nam Định</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 box-footer">
                                <h3 class="tittle-footer">Nguyễn Anh Tuấn</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> MSV : 16103100634</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Ngày sinh : 16/04/1998 </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Lớp : ĐH Tin10A6 </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> ĐH Kinh tế Kĩ thuật Công nghiệp</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Lò Đúc - Hà Nội</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Số nhà 21, ngõ chùa cả, phường vị xuyên, TP. Nam Định </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0942495160</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> udanchi3105@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Design by ThanhPHP !!! </p>
                </section>
            </div>
        </div>      
    </div>
            </div>      
        </div>
    <script  src="/thanhphp/public/frontend/js/slick.min.js"></script>
    </body> 
</html>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){$(this).children(".hidenitem").show(100);},function(){$hidenitem.hide(500);
        })
    })
$(function(){
    $updatecart = $(".updatecart");
    $updatecart.click(function(e){
        e.preventDefault();
        $qty = $(this).parents("tr").find("#qty").val();
        console.log($qty);
        $key = $(this).attr("data-key");
        $.ajax({
            url : 'cap-nhat-gio-hang.php',
            type : 'GET',
            data : {'qty':$qty,'key':$key},
            success:function(data)
            {
                if(data == 1)
                {
                    alert("Cập nhật thành công");
                    location.href='gio-hang.php';
                }
            }
        });
    })
})
</script>