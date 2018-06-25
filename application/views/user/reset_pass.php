<html>
<head>
    
    <style type="text/css">
        /*CSS for validation plugin error*/
        .error {
            color: #C6070A;
            font-weight: lighter;
        }

        /*CSS for password strength checker messages*/
        .short{
            color:#FF0000;
        }
        .weak{
            color:orange;
        }
        .good{
            color:blue;
        }
        .strong{
            color: green;
        }
    </style>

</head>

<?php echo validation_errors(); ?>

<body>
 <?php if ($this->session->flashdata('email_invalid')): ?>
    <?php echo $this->session->flashdata('email_invalid'); ?>
<?php endif ?>

<?php echo form_open_multipart('Reset/reset_password', array('id' => 'reset_password_form' , 'method'=>'POST')); ?>

<div class="main_content">
    <div class="reg">
        <h3 class="heading_reg">Reset Your Password?</h3>

        <div class="reg_form_grid" id="loginform">

                <ul>
                <div class="form-group">
                    <li> <label for="email"> Please enter a new password for your account here </label> </li>
                </div>
                <div class="form-group">
                    <li> <label for="pwd"> New Password  </label> </li>
                    <li> <input type="password" class="form-control" name="password" id="password" placeholder="Enter your New Password" autocomplete="off"> 
                    <div id="result"></div>
                    </li>
                </div>
                <div class="form-group">
                    <li><label  for="repwd"> Password  </label> </li>
                    <li><input type="password" class="form-control" name="repassword" id="repassword" placeholder="Confirm your New Password" autocomplete="off"></li>
                </div>
                    
                </ul>
                <!-- <br> -->
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                <br>
                

        </div>
    </div>
</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url() ?>assets/js/jquery-3.1.0.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>


<script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){

            // include the validation plugin for the form
            $('#reset_password_form' ).validate({

            // set validation rules for input fields
                rules: {                 
                    password: {
                        required : true                        
                    },
                    repassword: {
                        required : true,
                        equalTo: "#password"
                    }
                },

            // set validation messages for the rules are set previously

                messages: {             
                    password: {
                        required : "Password is required"
                    },
                    repassword: {
                        required : "Confirm Password is required",
                        equalTo: "Confirm Password must be matched with Password"
                    }                   
                }
            });


            // Password strength

            $('#password').keyup(function() {
                $('#result').html(checkStrength($('#password').val()))
                })

                function checkStrength(password) {
                var strength = 0
                if (password.length < 6) {
                    $('#result').removeClass()
                    $('#result').addClass('short')
                    return '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Too short'
                }
                if (password.length > 7) strength += 1
                // If password contains both lower and uppercase characters, increase strength value.

                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
                // If it has numbers and characters, increase strength value.

                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
                // If it has one special character, increase strength value.

                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // If it has two special characters, increase strength value.

                if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
                // Calculated strength value, we can return messages
                // If value is less than 2

                if (strength < 2) {
                    $('#result').removeClass()
                    $('#result').addClass('weak')
                    return '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> Weak'
                } else if (strength == 2) {
                    $('#result').removeClass()
                    $('#result').addClass('good')
                    return '<i class="fa fa-check" aria-hidden="true"></i> Good'
                } else {
                    $('#result').removeClass()
                    $('#result').addClass('strong')
                    return '<i class="fa fa-thumbs-up" aria-hidden="true"></i> Strong'
                }
            }

        });

</script> 


</body>

</html>