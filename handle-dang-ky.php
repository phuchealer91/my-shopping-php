<?php
require_once __DIR__ . "/autoload/autoload.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".js-modal-register").click(function (event) {
            event.preventDefault();
            $("#myModal").modal('show');
        });
        $('#register-btn').click(function (e) {
            e.preventDefault();
            // Lấy dữ liệu
            // var data3 = {
            //     name: $('#name').val(),
            //     email: $('#email').val(),
            //     password: $('#password').val(),
            //     phone: $('#phone').val(),
            //     address: $('#address').val()
            // };
            let $this = $(this);
            let $domForm = $this.closest('form');

            // Gửi ajax
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "dang-ky.php",
                data: $domForm.serialize(),
                success: function (data) {
                    // Có lỗi, tức là key error = 1
                    if (data.hasOwnProperty('error') && data.error == '1') {
                        var html = '';
                        // Lặp qua các key và xử lý nối lỗi
                        $.each(data, function (key, val) {
                            // Tránh key error ra vì nó là key thông báo trạng thái
                            // console.log(val)
                            if (key != 'error') {
                                html += '<li>' + val + '</li>';
                                // $('form').find('input[name=' + key + ']').siblings('.error-form').html(val);
                            }
                            // console.log(data);
                            // if(key != 'error') {
                            //     $domForm.find('input[name=' + key + ']').siblings('.error-form').text(val);
                            // }
                        });
                        $('.alert-danger').html(html).removeClass('hide');
                        $('.alert-success').addClass('hide');
                    }
                    else {

                        // Thành công
                        $('.alert-success').html('Đăng ký thành công!').removeClass('hide');
                        $('.alert-danger').addClass('hide');

                        // 4 giay sau sẽ tắt popup
                        setTimeout(function () {
                            $("#myModal").modal('hide');
                            $("#form-register")[0].reset();
                        }, 1200);
                    }
                }
            });
        });
        $('#myModal').on('hidden.bs.modal', function () {
            $('.alert-danger').addClass('hide');
            $('.alert-success').addClass('hide');
        });
    });
</script>
<li>
    <a type="button" class="reg" data-toggle="modal" data-target="#myModal">Đăng Ký</a>
    <div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">ĐĂNG KÝ THÀNH VIÊN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="form-register">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên thành viên</label>
                            <input type="text" name="name" class="form-control" id="name"  placeholder="Nguyễn khắc minh phúc">
                            <span class="error-form text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="phucb1706630@student.ctu.edu.vn">
                             <span class="error-form text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="********">
                             <span class="error-form text-danger"></span>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="repassword">Confirm Password</label>-->
<!--                            <input type="password" name="repassword" class="form-control" id="repassword" placeholder="********">-->
<!--                            <span class="error-form text-danger"></span>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="phone">Só điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="0966197305">
                            <span class="error-form text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="address"  placeholder="Số 44, Mậu Thân, Cần Thơ">
                            <span class="error-form text-danger"></span>
                        </div>
                    </div>
                        <div class="alert alert-danger hide">
                        </div>
                        <div class="alert alert-success hide">
                        </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success js-btn-login" id="register-btn" >Đăng Ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</li>

