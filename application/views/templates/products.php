<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/product_styles.css" media="all"/> 
</head>

<div class="main_content">

    <div id="product_box2">
        <div id="products" class="row list-group">

                    <?php
                    if (!empty($products)) {
                    foreach (array_slice($products, 0 , 6) as $p)
                    {
                    ?>
                    <div class="item  col-xs-4 col-lg-4">
                        <div class="thumbnail">
                            <img class="group list-group-image" src="<?php echo base_url(); ?>product_images/<?php echo $p['product_image']; ?>" alt="" />
                            <div class="caption">
                                <center>
                                <h3 class="group inner list-group-item-heading">
                                    <?php echo $p['product_name']; ?>
                                </h3>
                                </center>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <h4> LKR <?php echo $p['product_price']; ?> </h4>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <a style="background-color: #1ABC9C; border-color: #1ABC9C; float: right;" class="btn btn-success" href="<?php echo base_url('Cart/view_product/');?><?php echo $product_id = $p['product_id'] ?>">View</a>
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
