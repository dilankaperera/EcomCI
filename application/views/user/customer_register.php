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

<body>


<?php echo validation_errors(); ?>

<div class="main_content">
    <?php echo form_open_multipart('User/customer_register', array('id' => 'customer_register_form' , 'method'=>'POST')); ?>
        <div class="reg">
            <div class="container">
                <h2 class="heading_reg">Customer Registration</h2>
                
                <div class="reg_form_grid">
                    <ul>
                    <div class="form-group">
                        <li><label for="username"> <b> Username </b> </label></li>
                        <li><input type="text" size="50" class="form-control"  name="username" id="username" placeholder="Enter a Username" autocomplete="off">
                        <div id="username_result"></div>
                        </li>
                    </div>
                    <div class="form-group">
                        <li><label for="email"> <b>Email</b></label></li>
                        <li><input type="varchar" size="50" class="form-control"  name="customer_email" id="customer_email" placeholder="Enter your Email" autocomplete="off"></li>
                    </div>
                    <div class="form-group">
                        <li><label for="pwd"> <b>Password </b></label></li>
                        <li><input type="password" size="50" class="form-control"  name="password" id="password" placeholder="Type a Password" autocomplete="off">
                        <div id="result"></div>
                        </li>
                    </div>
                    <div class="form-group">
                        <li><label for="repwd"> <b> Confirm Password </b></label></li>
                        <li><input type="password" size="50" class="form-control"  name="repassword" id="repassword" placeholder="Retype your Password" autocomplete="off"></li>
                    </div>
                    </ul>
                   <!--  <br> -->
                    <input type="submit" class="btn btn-primary btn-block" value="Register">
<!--                        <input type="submit" name="register" value="Register">-->
                    <br>
                    Already have an account?  <a href="login.php"> Sign in </a>
                </div>
            </div>
        </div>
</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url() ?>assets/js/jquery-3.1.0.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>


<!-- jquery validation -->

<script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){

            // check the username availability real time
            $('#username').keyup(function(){
                var username = $('#username').val();
                if(username != ''){
                    $.ajax({
                        url: "<?php echo base_url(); ?>User/check_username_exists",
                        method: "POST",
                        data: {username:username},
                        success: function(data){
                            $('#username_result').html(data);
                        }
                    });
                }
            });

            // include the validation plugin for the form
            $('#customer_register_form').validate({

            // set validation rules for input fields
                rules: {
                    username: {
                        required : true
                    },                 
                    customer_email: {
                        required : true,
                        email: true
                    },                  
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
                    username: {
                        required : "Username is required"
                        
                    },                    
                    customer_email: {
                        required : "Email is required",
                        email: "Enter a valid email. Ex: example@gmail.com"
                    },             
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




