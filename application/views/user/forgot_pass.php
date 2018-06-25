<html>

<?php echo validation_errors(); ?>

<body>
 <?php if ($this->session->flashdata('email_invalid')): ?>
    <?php echo $this->session->flashdata('email_invalid'); ?>
<?php endif ?>

<?php echo form_open('Reset/reset_mail'); ?>

<div class="main_content">
    <div class="reg">
        <h3 class="heading_reg">Forgot Your Password?</h3>

        <div class="reg_form_grid" id="loginform">

                <ul>
                <div class="form-group">
                    <li> <label for="email"> Please enter your Email Address here  </label> </li>
                </div>
                <center><p>A verfication Code will be send to your email to recover the account.</p></center>
                <br>
                <div class="form-group">
                    <li> <input type="text" class="form-control" size="37" name="email" id="email" placeholder="Enter your Email" autocomplete="off"> </li>
                </div>
                    
                </ul>
                <!-- <br> -->
                <button type="submit" class="btn btn-primary btn-block">Send Recover email</button>
                <br>
                

        </div>
    </div>
</div>
<?php echo form_close(); ?>
</body>

</html>