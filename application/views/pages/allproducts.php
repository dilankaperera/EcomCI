<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/style.css" media="all"/>
 	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" media="all"/>
 	<link href="<?php echo base_url(); ?>/assets/css/font-awesome.css" rel="stylesheet">

 	<style type="text/css">
		.glyphicon { margin-right:5px; }
		.thumbnail
		{
		    margin-bottom: 20px;
		    padding: 0px;
		    -webkit-border-radius: 0px;
		    -moz-border-radius: 0px;
		    border-radius: 0px;
		}

		.item.list-group-item
		{
		    float: none;
		    width: 100%;
		    background-color: #fff;
		    margin-bottom: 10px;
		}
		.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
		{
		    background: #1ABC9C;
		}

		.item.list-group-item .list-group-image
		{
		    margin-right: 10px;
		}
		.item.list-group-item .thumbnail
		{
		    margin-bottom: 0px;
		}
		.item.list-group-item .caption
		{
		    padding: 9px 9px 0px 9px;
		}
		.item.list-group-item:nth-of-type(odd)
		{
		    background: #eeeeee;
		}

		.item.list-group-item:before, .item.list-group-item:after
		{
		    display: table;
		    content: " ";
		}

		.item.list-group-item img
		{
		    float: left;
		}
		.item.list-group-item:after
		{
		    clear: both;
		}
		.list-group-item-text
		{
		    margin: 0 0 11px;
		}

 	</style>

</head>
<body>

	<div class="main_content">
		<div id="product_box2">

			<div class="container">
			    <div style="margin: 20px;" class="well well-sm">
			        <strong>Display</strong>
			        <div class="btn-group">
			            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
			            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
			                class="glyphicon glyphicon-th"></span>Grid</a>
			        </div>
			    </div>

			    <div id="products" class="row list-group">

			    	<?php
    				if (!empty($products)) {
      				foreach ($products as $row)
      				{
    				?>


			        <div class="item  col-xs-4 col-lg-4">
			            <div class="thumbnail">
			                <img class="group list-group-image" src="<?php echo base_url(); ?>product_images/<?php echo $row->product_image; ?>" alt="" />
			                <div class="caption">
			                    <h3 class="group inner list-group-item-heading">
			                        <?php if($row->product_name) {
           								echo $row->product_name; 
           							} else { 
           								echo "Not Available";
       								}?>
			                    </h3>
			                    <br>
			                    <p class="group inner list-group-item-text">
			                        <b>Quantity Available</b>
			                        <?php if($row->product_quantity) {
           								echo $row->product_quantity; 
           							} else { 
           								echo "Not Available";
       								}?>
			                        
			                    </p>
			                    <div class="row">
			                        <div class="col-xs-12 col-md-6">
			                            <p class="lead"> LKR
			                                <?php if($row->product_price) {
           										echo $row->product_price; 
           									} else { 
           										echo "Not Available";
       										}?>
			                            </p>
			                        </div>
			                        <div class="col-xs-12 col-md-6">
			                            <a style="background-color: #1ABC9C; border-color: #1ABC9C;" class="btn btn-success" href="<?php echo base_url('Cart/view_product/');?><?php echo $product_id = $row->product_id ?>">View</a>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>

      			<?php
    				}
    				}
    			?>

			    </div>
			</div>

		</div>		
	</div>



	<!-- JS -->

	<script type="text/javascript">

		$(document).ready(function() {
    	$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    	$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
		});

	</script>


</body>