    <?php if(isset($_SESSION['success'])) { ?>
        <div class="col-md-4 alert alert-success" >
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['error'])) { ?>
        <div class="col-md-4 alert alert-danger" >
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php } ?>