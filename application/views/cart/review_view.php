
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" media="all"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" media="all"/>

  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rate this product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="col-md-6 stars">
          <?php
            for ($i=1; $i < 6 ; $i++) { 
              echo "<i class='fa fa-star-o star-i' data-current_rating='0' data-id='".$i."'></i>";
            }
          ?>
        </div>

        <script type="text/javascript">

          var cur_rating = 0;
          $(function() {

            $('.star-i').mouseover(function(){
              var ele = $(this);
              var cur_index = ele.attr('data-id');
              for (var i = 1; i <= cur_index; i++) {
                $(".star-i[data-id='"+i+"']").removeClass('fa-star-o').addClass('fa-star'); 
                
              }
            });

            $('.stars').mouseleave(function() {
              // $('.star-i').removeClass('fa-star').addClass('fa-star-o');
              for (var i = 1; i <= cur_rating; i++) {
                $(".star-i[data-id='"+i+"']").addClass('fa-star').removeClass('fa-star-o'); 
              }
              for (var i = cur_rating+1; i <= 5; i++) {
                $(".star-i[data-id='"+i+"']").removeClass('fa-star').addClass('fa-star-o'); 
              }
            });

            $('.star-i').click(function(){
              var clicked_id = $(this).attr('data-id');
              // console.log(clicked_id);

              if ($(this).hasClass('current-active')) {
                 $('.star-i').removeClass('fa-star current-active').addClass('fa-star-o');
              }
              else{
                $('.star-i').removeClass('current-active');
                $(this).addClass('current-active');

                 cur_rating = clicked_id;
                for (var i = 0; i <= clicked_id; i++) {
                  $(".star-i[data-id='"+i+"']").removeClass('fa-star-o').addClass('fa-star'); 
                }

              }

              $.ajax({
                url: '<?php echo base_url(); ?>/Review/rate',
                method: 'POST',
                data:{
                  'rating':cur_rating
                },
                success: function (server_msg) {
                  // body...
                  alert("Server Sends : "+server_msg);
                },
                error: function(err_msg){
                  alert(err_msg);
                }
              });

               
              
            });

          });
        </script>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      
    </div>
  </div>
</div>


</body>
</html>
