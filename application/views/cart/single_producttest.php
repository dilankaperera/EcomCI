<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" media="all"/>

</head>

<body>

	<div class="main_content">

		<!-- Flash message pop up  Cart-->
	    <div class="modal" id="sucess_alert_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	        <div class="modal-dialog modal-sm" role="document">
	            <div class="modal-content conts">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                    <h5 class="modal-title green_flash green" id="myModalLabel"><span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong></h5>
	                </div>
	                <div class="modal-body">
	                    <p class="green_flash">Item has been add to your cart.</p>
	                </div>
	            </div>
	        </div>
	    </div>
   		<!-- End Flash message pop up -->


<!-- view single product -->

	<div id="single_product8">
        <ul class="products">
            <center>

        	<?php 

        	if(isset($product) && is_array($product) && count($product)) {
        		$i = 1;
        		foreach( $product as $key => $data ) {
        	?>

        			<div class="container-fluid">
        				<div class="row text-center">
        					<div class="col-md-4">
        						 <h1 class="heading_reg" class="name<?php echo $data['product_id'] ?>" rel="<?php echo $data['product_id'] ?>" style="margin-bottom: 10px;"><?php echo $data['product_name']?></h1>
        						 <img class="image<?php echo $data['product_id'] ?>" rel="<?php echo $data['product_image'] ?>" src="<?php echo base_url(); ?>/product_images/<?php echo $data['product_image'] ?>" alt="<?php echo $data['product_id'] ?>" style="margin: auto; width: 100%; max-width: 300px;">
        						 <!-- <span class="tile-overlay"></span> -->
        					</div>
        					<div class="col-md-8">
        						<p class="price-label price<?php echo $data['product_id'] ?>" rel="<?php echo $data['product_price'] ?>" style="padding: 10px;">LKR <?php echo $data['product_price'] ?></p>
        						<p class="text-uppercase" style="padding: 10px;">Available Quantity <?php echo $data['product_quantity']; ?></p>
        						<div class="input-group" style="padding: 10px; display: flex; justify-content: center;">
			                      <!-- <span class="input-group-btn"> -->
			                        <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
			                        <span class="glyphicon glyphicon-minus"></span>
			                        </button>
			                      <!-- </span> -->
			                      <input type="text" name="quant[1]" class="form-control input-number" value="0" min="0" max="10" style="width: 10%">
			                       <!-- <span class="input-group-btn"> -->
			                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
			                        <span class="glyphicon glyphicon-plus"></span>
			                        </button>
			                        <!-- </span> -->
			                    </div>
			                    <div class="description">
			                    	<h3 class="text-uppercase">Description</h3>
			                    	<p class="text-muted" style="padding: 10px;"><?php echo $data['product_description']; ?></p>
			                    	<button style="background: #343a40; color: white;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Rate & Review</button>
			                    	<button type="button" class="btn btn-primary" onclick="javascript:addtocart(<?php echo $data['product_id'] ?>)">Add to Cart</button>
        						</div>
        				</div>
        			</div> 
        		</div>

        			<!-- Modal Review Product -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog " role="document">
		    <div class="modal-content">

		    	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
			        <h4 style="color: #1ABC9C; font-weight: bold;" class="modal-title" id="exampleModalLongTitle">Rate & Review</h4>
		    	</div>

		    	<div class="modal-body">
			        <span class="top-message">Rate the product</span>
			        <div style="text-align: center;">
				        <div style="display: inline; margin: 20px; font-size: 40px;" >
				          <?php
				            for ($i=1; $i < 6 ; $i++) { 
				              echo "<i class='fa fa-star-o star-i' data-current_rating='0' data-id='".$i."'></i>";
				            }
				          ?>
				        </div>
			        </div>

			        <script type="text/javascript">			         
			        </script>
			        <br>

			        <div class="md-form">
			        	<span>Write your Review</span>
			            <textarea value="" type="text" id="reviewform" name="reviewform" class="md-textarea form-control"  rows="4"></textarea>
			        </div>
		        
		    	</div>

		      
		    	<div class="modal-footer ">	
		    	<?php var_dump($data['product_id']); ?>	        
			        <button id="crSubmitBtn" onclick="javascript:submitReview(<?php $data['product_id']; ?>)" type="button" class="btn btn-primary btn-ls-blue">Submit</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		    	</div>

		    </div>
		  </div>
		</div>
		<!-- End Modal Review Product  -->

        			<?php
        		}
        	}

        	?>

            </center>
        </ul>
    </div>
    <!-- end view product -->

    <!-- view review -->

    <div  class="container-fluid" style="background-color: #F7F7F9; padding: 25px; margin: 30px;">
      <h4 style="font-size: 20px;" class="heading_reg text-muted text-center">Reviews</h4>

      <div class="container" style="padding-top: 30px;">

          <?php

          if (!empty($review)) {
            foreach ($review as $row)
            {      
          ?>

      <div id="reviewbox" style="padding: 5px 40px;">
        <h4>Rate : <?php echo $row->rate;  ?></h4>
        <h5>Review : <?php echo $row->review; ?></h5>
        
      </div>

      <?php

       }
     } else{
      echo "NO REVIEW AVAILABLE FOE THIS PRODUCT!";
     }

      ?>

    </div>
    </div>

    <!-- end review -->



	</div>
	

<!-- add to cart -->
<script type="text/javascript">
    function addtocart(p_id)
    {
        var price = $('.price'+p_id).attr('rel');
        var image = $('.image'+p_id).attr('rel');
        var name  = $('.name'+p_id).text();
        var id    = $('.name'+p_id).attr('rel');
        $.ajax({

            type: "POST",
            url: "<?php echo base_url('cart/add');?>",
            data: "product_id="+id+"&product_image="+image+"&product_name="+name+"&product_price="+price,
//            success: function (response) {
//                $(".cartcount").text(response);
//            }
            success: function (response) {
                $(".cartcount").text(response);
                $('#sucess_alert_pop').modal({ keyboard : true,show: true,backdrop :'static'});
                setTimeout(function(){ $("#sucess_alert_pop").modal('toggle'); }, 2500);
            }
        });
    }
</script>

<!-- review -->
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

            $('.star-i').mouseleave(function() {
              $('.star-i').removeClass('fa-star').addClass('fa-star-o');
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

              

               
              
            });

          });

          function submitReview(id){

            var review = document.getElementById('reviewform').value;

            var id = id;

            var cur_rating1 = cur_rating;

  
          $.ajax({
                
                type: 'POST',
                url: '<?php echo base_url(); ?>/Review/rate',
                data:{
                  'id':id,'rate':cur_rating,'review':review
                },
                dataType : 'JSON',
                success: function (server_msg) {
                  // body...
                  document.location.reload();
                  // alert(server_msg);
                },
                error: function(err_msg){
                  
                }
              });


        }


</script>

</body>