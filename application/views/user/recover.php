<html>

<?php echo validation_errors(); ?>

<body>
<?php echo form_open('Reset/checkValidateStr'); ?>

<div class="main_content">
    <div class="reg">
        <h3 class="heading_reg">Recover your GZone Account</h3>
        <?php if ($this->session->flashdata('msg')): ?>
            <?php echo $this->session->flashdata('msg'); ?>
        <?php endif ?>

        <div class="reg_form_grid" id="loginform">

                <ul>
                <div class="form-group">
                    <li> <label for="email"> Please enter the Verfication Code here  </label> </li>
                </div>
                <center><p>Please check your email for a message with your code.</p></center>
                <br>
                <div class="form-group">
                    <li> <input placeholder="Enter the Code" type="text" class="form-control" size="37" name="token" id="token" autocomplete="off"> </li>
                </div>
                    
                </ul>
                <button type="submit" class="btn btn-primary btn-block">Recover your account</button>
                <br>

        </div>
    </div>
</div>
<?php echo form_close(); ?>
</body>

</html>