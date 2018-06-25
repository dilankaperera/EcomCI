<!DOCTYPE html>
<html lang="en">
<head>
  <title>GZone Technologies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/style.css" media="all"/>
  <link href="<?php echo base_url(); ?>/assets/css/font-awesome.css" rel="stylesheet">

  <style>
    /* Set black background color, white text and some padding */
    footer {
      background-color: #333232;
      color: white;
      padding: 15px;
          }

  </style>
</head>
<body>

<!-- Header -->

<!-- <div class="container-fluid" style="margin-right: 10px;">
  <a class="btn btn-primary" style="float: right;" href="#" role="button">Log out</a>
</div>
</div> -->


<div class="display-1" style="background-color: #1ABC9C; color: #fff;">
 <div class="row" style="margin-right: 15px;">
  <div class="col-sm-3">
       <img style="padding: 10px;" src="<?php echo base_url(); ?>assets/images/logo.png">
  </div>
  <div style="padding: 25px;" class="col-sm-6">
    <center>
    <h1 style="padding: 10px;"> Admin Dashboard</h1>
    </center>
  </div>
  <div class="col-sm-3" style="padding-top: 10px;">
      <a class="btn btn-primary" style="float: right; background-color: #333; border-color: #333;" href="<?php echo base_url('User/logout'); ?>" role="button">(Logged in as <?php echo ($this->session->userdata('username')); ?>) Logout</a>

  </div>
  </div>
</div>

<!-- Body -->
 
<div style="height: 562px;">
  <div class="container-fluid text-center">  
    <div class="row">
      <div class="col-sm-2"></div>

      <div style="background-color: #F7F7F9; padding-top:150px; padding-left: 25%; padding-right: 150px; padding-bottom: 40px; height: 562px;" class="col-sm-8">

        <div class="admin_btn">

        <button class="button button_chg"><a href="<?php echo base_url('Admin/getAgents'); ?>">View Agent Details</a></button>
        <button class="button button_chg"><a href="">View Customer Details</a></button>
        <button class="button button_chg"><a href="">View Products</a></button>

        </div>

      </div>
      <div class="col-sm-2"></div>
    </div>  

  </div>
</div>


<footer >
  <div id="footer-bottom">
    <p>&copy; Copyright <a href="index.php">Gzone Technologies</a> &#124; All rights reserved </p>
    <div class="clr"></div>
  </div>
</footer>

</body>
</html>
