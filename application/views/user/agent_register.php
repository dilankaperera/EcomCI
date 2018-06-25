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
    <?php echo form_open_multipart('User/agent_register', array('id' => 'agent_register_form' , 'method'=>'POST')); ?>
    <div class="reg">
        <div id="black">
            <h1 style="text-align :center; color: white;"><b>Become an Agent of Gzone Technologies & earn profit</b></h1>
            <br>

            <h4 style="text-align :center; color: white;">At GZone Technologies, <br>
                we aim to cultivate a culture of collection points among our customers. <br>
                You could be a part of this process through registering with with us as an agent.<br>
                You could also earn a commission from participating in the process! </h4>
        </div>

            <div class="container">
                <h2 class="heading_reg">Agent Registration</h2>
                <div class="reg_form_grid">
                    <ul>
                    <div class="form-group"> 
                        <li><label  for="fname"> <b> First Name </b> </label></li>
                        
                        <li><input class="form-control input-md" type="text" size="50" id="fname" name="fname"  placeholder="Enter your Full Name" required autocomplete="off"></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="lname"> <b> Last Name</b> </label></li>
                        <li><input class="form-control input-md" type="text" size="50" id="lname" name="lname" placeholder="Enter your Last Name"  required autocomplete="off"></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="email"> <b>Email</b></label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="email" name="email" placeholder="Enter your Email"  required autocomplete="off"></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="pnumber"> <b>Phone number(format: xxxxxxxxxx)</b></label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="pnumber" name="pnumber" placeholder="Enter your Phone number" required autocomplete="off" pattern="^\d{10}$" ></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="bussname"> <b>Bussiness Name</b></label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="bussname" name="bussname" placeholder="Enter your Business Name" autocomplete="off"></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="nic"> <b>NIC No.</b></label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="nic" name="nic" placeholder="Enter your NIC number" required autocomplete="off" maxlength="10"></li>
                    </div>
                    <div class="form-group"> 
                        <li><label  for="lic"> <b>License No.</b></label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="lic" placeholder="Enter your License number" name="lic"></li>
                    </div>
                    <div class="form-group">
                        <!-- <li><label for="pic"> <b>Insert Your Picture</b></label></li>
                        <li><input type="file" id="pic" name="pic" accept="image/*"></li>
                        <br> -->
                        <!-- <br> -->
                        <li><label  for="username"> <b> Username</b> </label></li>
                        <li><input class="form-control input-md" type="varchar" size="50" id="username" name="username" placeholder="Enter a Username"  required autocomplete="off">
                        <div id="username_result"></div>
                        </li>
                    </div>
                    <div class="form-group">
                        <li><label  for="pwd"> <b>Password </b> </label></li>
                        <li><input class="form-control input-md" type="password" size="50" id="password" name="password" placeholder="Type a Password"  required autocomplete="off">
                        <div id="result"></div>
                        </li>
                    </div>
                    <div class="form-group">
                        <li><label  for="repwd"> <b> Re-enter Password </b></label></li>
                        <li><input class="form-control input-md" type="password" size="50" id="repassword" name="repassword" placeholder="Retype a Password"  required autocomplete="off"></li>
                    </div>
                    </ul>
                    
                    <button type="submit" class="btn btn-primary btn-block">Request For Register</button>

                    <br>
                    Already have an account?  <a href="<?php echo base_url('User/login'); ?>"> Sign in </a>
                </div>
            </div>
    </div>
</div>

<!-- footer -->
<?php echo form_close(); ?>

<script src="<?php echo base_url() ?>assets/js/jquery-3.1.0.min.js"></script>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>


<!-- jquery validation -->

<script type="text/javascript">
        // wait untill the page is loaded completely
        $(document).ready(function(){

            // check the username availability real time
            $('#username').change(function(){
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
            $('#agent_register_form').validate({

            // set validation rules for input fields
                rules: {
                    fname: {
                        required : true
                    },
                    lname: {
                        required : true
                    },
                    email: {
                        required : true,
                        email: true
                    },
                    pnumber: {
                        required : true
                    },
                    nic:{
                        required: true
                    },
                    username: {
                        required : true
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
                    fname: {
                        required : "First Name is required"
                    },
                    lname: {
                        required : "Last Name is required"
                    },
                    email: {
                        required : "Email is required",
                        email: "Enter a valid email. Ex: example@gmail.com"
                    }, 
                    pnumber: {
                        required : "Phone Number is required"
                    },
                    nic:{
                        required: "NIC Number is required"
                    },            
                    username: {
                        required : "Username is required"                        
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


