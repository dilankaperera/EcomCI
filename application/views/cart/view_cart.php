
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/product_styles.css" media="all"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.1.0.min.js"></script>
</head>

<body>



<div class="main_content">

    <div class="container">
        <div id="checkbox">

            <h1>My Cart</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Product</th>
                    <th>Item Price</th>
                    <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>


                <?php $i = 1; ?>
                <?php foreach($this->cart->contents() as $items): ?>

                    <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                    <tr <?php if($i&1){ echo 'class="alt"'; }?>>
                        <td>
                            <?php echo $items['qty']; ?>
                            <?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
                        </td>

                        <td><?php echo $items['name']; ?></td>

                        <td>LKR<?php echo $this->cart->format_number($items['price']); ?></td>
                        <td>LKR<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    </tr>

                    <?php $i++; ?>


                <tr>
                    <td</td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td>LKR <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                    <td</td>
                    <td></td>
                    <td><a href="<?php echo $items['product_id']; ?> " class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>



                </tbody>
            </table>

            <div class="box-footer">
                <a href="index.php" style="float: left;" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                <!--  <a href="#" style="float: right;" class="btn btn-info">Proceed to Checkout <i class="fa fa-chevron-right"></i></a> -->
                <button style="float: right;" type="submit" class="btn btn btn-info"> Proceed with Checkout <i class="fa fa-chevron-right"></i>
                </button>
            </div>


        </div>


    </div>
</body>

    <?php
    echo form_close();

?>