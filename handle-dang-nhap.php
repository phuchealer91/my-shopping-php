<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#login-btn').click(function (e) {
            e.preventDefault();
            let $this = $(this);
            let $domForm = $this.closest('form');
            // Gửi ajax
            $.ajax({
                url: "dang-nhap.php",
                type: "POST",
                dataType: "JSON",
                data: $domForm.serialize(),
                success: function (data) {
                    console.log('error');
                    if (data.hasOwnProperty('error') && data.error == '1') {
                        var html = '';
                        $.each(data, function (key, val) {
                            console.log(val);

                            if (key != 'error') {
                                html += '<li>' + val + '</li>';
                                // $domForm.find('input[name=' + key + ']').siblings('.error-form').html(val);
                            }
                        });
                        $('.alert-danger').html(html).removeClass('hide');
                        $('.alert-success').addClass('hide');
                    }
                    else {
                        console.log('success');

                        $('.alert-success').html('Đăng nhập thành công!').removeClass('hide');
                        $('.alert-danger').addClass('hide');
                        setTimeout(function () {
                            $("#myModal2").modal('hide');
                            $("#form-register")[0].reset();
                        }, 1200);

                    }
                }


            });

        });
        $('#myModal2').on('hidden.bs.modal', function () {
            $('.alert-danger').addClass('hide');
            $('.alert-success').addClass('hide');
        });
    });

</script>
<li>
    <a href="" class="log" data-toggle="modal" data-target="#myModal2">Đăng nhập</a>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="exampleModalLabel">ĐĂNG NHẬP </h5>
                    <!--                    --><?php //if (isset($_SESSION['success'])): ?>
                    <!--                        <div class="alert alert-success">-->
                    <!--                            <strong></strong> --><?php //echo $_SESSION['success']; unset($_SESSION['success']) ?>
                    <!--                        </div>-->
                    <!--                    --><?php //endif ?>
                    <!--                    --><?php //if (isset($_SESSION['error'])): ?>
                    <!--                        <div class="alert alert-danger">-->
                    <!--                            <strong>Lỗi!  </strong>--><?php //echo $_SESSION['error']; unset($_SESSION['error']) ?>
                    <!--                        </div>-->
                    <!--                    --><?php //endif ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="form-login">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email1">Email</label>
                            <input type="email" name="email" class="form-control" id="email"  placeholder="phucb1706630@student.ctu.edu.vn">
                            <!--                            --><?php //if (isset($error['email'])): ?>
                            <!--                                <p class="text-danger">--><?php //echo $error['email'] ?><!--</p>-->
                            <!--                            --><?php //endif ?>
                            <span class="error-form text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="********">
                            <!--                            --><?php //if (isset($error['password'])): ?>
                            <!--                                <p class="text-danger">--><?php //echo $error['password'] ?><!--</p>-->
                            <!--                            --><?php //endif ?>
                            <span class="error-form text-danger"></span>
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="password1">Confirm Password</label>-->
                        <!--                            <input type="password" name="repassword" class="form-control" id="password2" placeholder="********">-->
                        <!--                        </div>-->
                    </div>
                    <div class="alert alert-danger hide">
                    </div>
                    <div class="alert alert-success hide">
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <input type="submit" value="Đăng Nhập" class="btn btn-success js-modal-login" id="login-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</li>