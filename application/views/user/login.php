<html>

<?php echo validation_errors(); ?>

<body>
<?php echo form_open('user/login'); ?>
<div class="main_content">
    <div class="reg">
        <h3 class="heading_reg">Log in</h3>
        <?php if ($this->session->flashdata('msg')): ?>
            <?php echo $this->session->flashdata('msg'); ?>
        <?php endif ?>
        <div class="reg_form_grid" id="loginform">

                <ul>
                <div class="form-group">
                    <li> <label for="username"> Username  </label> </li>
                    <li> <input type="text" class="form-control" name="username" id="username" placeholder="Enter your Username"> </li>
                </div>
                <div class="form-group">
                    <li><label  for="password"> Password  </label> </li>
                    <li><input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password"></li>
                </div>
                </ul>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <br>
                <center><a href="<?php echo base_url('Reset/reset_mail_form'); ?>">Forgot Password?</a>
                <br>
                <br>
                New to Gzone ?<a href="<?php echo base_url('User/customer_register'); ?>"> Click here to sign up </a>
                </center>

        </div>
    </div>
</div>
<?php echo form_close(); ?>
</body>

</html>