<?php echo $this->set('title_for_layout', 'Order Review'); ?>

    <?php $this->Html->addCrumb('Order Review'); ?>

    <?php echo $this->Html->script(array('jquery.validate.js', 'additional-methods.js', 'shop_review.js'), array('inline' => false)); ?>

    <h1>Order Review</h1>

    <hr>

        <div class="row">
            <div class="col col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Customer Info</h3>
                    </div>
                    <div class="panel-body">
                        First Name: <?php echo $shop['Order']['first_name'];?><br />
                        Last Name: <?php echo $shop['Order']['last_name'];?><br />
                        Email: <?php echo $shop['Order']['email'];?><br />
                        Phone: <?php echo $shop['Order']['phone'];?>
                    </div>
                </div>
            </div>
            <div class="col col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Billing Address</h3>
                    </div>
                    <div class="panel-body">
                        Billing Address: <?php echo $shop['Order']['billing_address'];?><br />
                        Billing Address 2: <?php echo $shop['Order']['billing_address2'];?><br />
                        Billing City: <?php echo $shop['Order']['billing_city'];?><br />
                        Billing State: <?php echo $shop['Order']['billing_state'];?><br />
                        Billing Zip: <?php echo $shop['Order']['billing_zip'];?><br />
                        Billing Country: <?php echo $shop['Order']['billing_country'];?>
                    </div>
                </div>
            </div>
            <div class="col col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Shipping Address</h3>
                    </div>
                    <div class="panel-body">
                        Shipping Address: <?php echo $shop['Order']['shipping_address'];?><br />
                        Shipping Address 2: <?php echo $shop['Order']['shipping_address2'];?><br />
                        Shipping City: <?php echo $shop['Order']['shipping_city'];?><br />
                        Shipping State: <?php echo $shop['Order']['shipping_state'];?><br />
                        Shipping Zip: <?php echo $shop['Order']['shipping_zip'];?><br />
                        Shipping Country: <?php echo $shop['Order']['shipping_country'];?>
                    </div>
                </div>
            </div>
        </div>

        <hr>

            <div class="row">
                <div class="col col-sm-1">#</div>
                <div class="col col-sm-6">ITEM</div>
                <div class="col col-sm-1">WEIGHT</div>
                <div class="col col-sm-1">WEIGHT</div>
                <div class="col col-sm-1">PRICE</div>
                <div class="col col-sm-1" style="text-align: right;">QUANTITY</div>
                <div class="col col-sm-1" style="text-align: right;">SUBTOTAL</div>
            </div>

            <br />
            <br />

            <?php foreach ($shop['OrderItem'] as $item): ?>
            <div class="row">
                <div class="col col-sm-1"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></div>
                <div class="col col-sm-6">
                    <?php echo $item['Product']['name']; ?>
                    <?php if(isset($item['Product']['productmod_name'])) : ?>
                    <br />
                    <small><?php echo $item['Product']['productmod_name']; ?></small>
                    <?php endif; ?>
                </div>
                <div class="col col-sm-1"><?php echo $item['Product']['weight']; ?></div>
                <div class="col col-sm-1"><?php echo $item['totalweight']; ?></div>
                <div class="col col-sm-1">Rs.<?php echo $item['Product']['price']; ?></div>
                <div class="col col-sm-1" style="text-align: right;"><?php echo $item['quantity']; ?></div>
                <div class="col col-sm-1" style="text-align: right;">Rs.<?php echo $item['subtotal']; ?></div>
            </div>
            <?php endforeach; ?>

            <hr>

                <div class="row">
                    <div class="col col-sm-10">Products: <?php echo $shop['Order']['order_item_count']; ?></div>
                    <div class="col col-sm-1" style="text-align: right;">Items: <?php echo $shop['Order']['quantity']; ?></div>
                    <div class="col col-sm-1" style="text-align: right;">Total<br /><strong>Rs.<?php echo $shop['Order']['total']; ?></strong></div>
                </div>

                <hr>

                    <br />
                    <br />


                    <?php echo $this->Form->create('Order'); ?>

                    <?php echo $this->Form->button('Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

                    <?php echo $this->Form->end(); ?>

                    <br />
                    <br />

