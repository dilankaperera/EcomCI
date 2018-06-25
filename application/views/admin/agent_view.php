
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GZone Technologies</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/style.css" media="all"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" media="all"/>
  <link href="<?php echo base_url(); ?>/assets/css/font-awesome.css" rel="stylesheet">

  <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>

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
 
<div class="container-fluid" style="height: 510px; padding: 20px;">

<table class="table table-hover table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Username</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Business Name</th>
      <th scope="col">Email</th>
      <th scope="col">Addresss</th>
      <th scope="col">Phone Number</th>
      <th scope="col">NIC</th>
      <th scope="col">Lisence No</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if (!empty($agents)) {
      foreach ($agents as $row)
       {
    ?>
      <tr>

        <td><?php if($row->user_username) {
           echo $row->user_username; 
        } else { echo "Not Available";
        }?></td>

        <td><?php if($row->agent_first_name) {
          echo $row->agent_first_name;
        } else{
          echo "Not Available";
        }?></td>

        <td><?php if($row->agent_middle_name){
          echo $row->agent_middle_name; 
        } else {
          echo "Not Available";
        }?></td>

        <td><?php if($row->agent_last_name){
          echo $row->agent_last_name;
        } else{
          echo "Not Available";
        }?></td>

        <td><?php if($row->agent_business_name){
          echo $row->agent_business_name;
        } else{
          echo "Not Available";
        } ?></td>

          <td><?php if($row->agent_email){
          echo $row->agent_email;
        } else{
          echo "Not Available";
        } ?></td>

        <td><?php if($row->agent_address) {
          echo $row->agent_address;
        } else{
          echo "Not Available";
        } ?></td>

        <td><?php if($row->agent_phone_num){
          echo $row->agent_phone_num;
        } else{
          echo "Not Available";
        } ?></td>

        <td><?php if($row->agent_nic){
          echo $row->agent_nic;
          } else{
            echo "Not Available";
          } ?></td>

        <td><?php if($row->agent_license){
          echo $row->agent_license;
        } else{
          echo "Not Available";
        } ?></td>

        <td>
        <?php
        if ($row->status=='accepted') {
          echo $row->status;
        } elseif ($row->status=='delete') {
          echo $row->status;
        } else{
          ?>
          <a class="btn btn-success"  href="<?php echo base_url('Admin/accept_agent'.'/'.$row->user_username) ?>" onclick="return confirmAccept();" role="button">Accept</a>
          <a class="btn btn-danger" href="<?php echo base_url('Admin/delete_agent'.'/' .$row->user_username); ?>" onclick="return confirmDelete();" role="button">Delete</a>
          <?php
        }
        ?>

        </td>
      </tr>

      <?php
    }
       }
    ?>

  </tbody>
</table>
</div>


<!-- Footer -->
<div class="container-fluid" style="background-color: #1ABC9C; height: 60px; padding: 10px;">
  <center>
  <a class="btn btn-primary" href="#" role="button" style="background-color: #333; border-color: #333;">BACK</a>
  </center>
 
</div>

<!-- <footer class="container-fluid text-center">
  <p>© Copyright Gzone Technologies | All rights reserved</p>
</footer> -->

<footer >
  <div id="footer-bottom">
    <p>&copy; Copyright <a href="index.php">Gzone Technologies</a> &#124; All rights reserved </p>
    <div class="clr"></div>
  </div>
</footer>

<script type="text/javascript">
    function confirmDelete() {
        return confirm('Are you sure you want to reject this Agent?');
    }
</script>

<script type="text/javascript">
    function confirmAccept() {
        // var email = object.value()
        return confirm('Are you sure you want to accept this Agent?');
    }
</script>

</body>
</html>