<head>

</head>

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Cart details</h4>
        </div>
        <div class="modal-content">
            <div class="col-lg-12 col-md-12">
                <h2 class="title">Shopping cart</h2>
                <table class="items-list col-lg-12 col-md-12 table-hover">
                    <tbody>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Delete</th>
                    </tr>

                    <!--Item-->
                    <?php
                    if(isset($cart) && is_array($cart) && count($cart)){
                        $i=1;
                        foreach ($cart as $key => $data) {
                            ?>
                            <tr class="item first rowid<?php echo $data['rowid'] ?>">
                                <td class="thumb">
                                    <img src="<?php echo base_url(); ?>/product_images/<?php echo $data['image'] ?>" width='100' height='100'
                                         alt="<?php echo $data['id'] ?>">
                                </td>
                                <td class="name"><?php echo $data['name'] ?></td>
                                <td class="price">LKR
                                    <span class="price<?php echo $data['rowid'] ?>"><?php echo $data['price'] ?></span>
                                </td>
                                <td  class="qnt-count">
                                    <input class="quantity qty<?php echo $data['rowid'] ?> form-inline" style="width: 15%"
                                           type="number" min="1" maxlength="3" value="<?php echo $data['qty'] ?>">
                                    <span class="Update" <a
                                          onclick="javascript:updateproduct('<?php echo $data['rowid'] ?>')"> Update</a></span>
                                </td>
                                <td class="total">LKR <span class="subtotal subtotal<?php echo $data['rowid'] ?>">
                                            <?php echo $data['subtotal'] ?></span></td>
                                <td class="delete"><a class="icon-delete"
                                                      onclick="javascript:deleteproduct('<?php echo $data['rowid'] ?>')">X</a></td>
                            </tr>

                            <?php
                            $i++;
                        } }
                    ?>

                    <tr class="item">
                        <td class="thumb" colspan="4" align="right">&nbsp;</td>
                        <td class="">INR <span class="grandtotal">0</span> </td>
                        <td>&nbsp;</td>
                    </tr>

                    </tbody></table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" onclick="javascript:deleteproduct('all')">
                Clear Cart</button>
            <a href="<?php echo base_url('Cart/billing_view') ?>">
                <button type="button" class="btn btn-primary">Proceed with checkout</button>
            </a>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteproduct(rowid)
    {
        var answer = confirm ("Are you sure you want to delete?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('cart/remove');?>",
                data: "rowid="+rowid,
                success: function (response) {
                    $(".rowid"+rowid).remove(".rowid"+rowid);
                    $(".cartcount").text(response);
                    var total = 0;
                    $('.subtotal').each(function(){
                        total += parseInt($(this).text());
                        $('.grandtotal').text(total);
                    });
                }
            });
        }
    }

    var total = 0;
    $('.subtotal').each(function(){
        total += parseInt($(this).text());
        $('.grandtotal').text(total);
    });


    function updateproduct(rowid)
    {
        var qty = $('.qty'+rowid).val();
        var price = $('.price'+rowid).text();
        var subtotal = $('.subtotal'+rowid).text();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('cart/update_cart');?>",
            data: "rowid="+rowid+"&qty="+qty+"&price="+price+"&subtotal="+subtotal,
            success: function (response) {
                $('.subtotal'+rowid).text(response);
                var total = 0;
                $('.subtotal').each(function(){
                    total += parseInt($(this).text());
                    $('.grandtotal').text(total);
                });
            }
        });
    }


</script>
