<?php
$this->Html->addCrumb($product['Product']['name']);
?>

<script>
$(document).ready(function() {

    $('#modselector').change(function(){
        $('#productprice').html($(this).find(':selected').data('price'));
        $('#modselected').val($(this).find(':selected').val());
    })

});
</script>

<h1><?php echo $product['Product']['name']; ?></h1>

<div class="row">

    <div class="col col-sm-7">
    <?php echo $this->Html->Image('/images/large/' . $product['Product']['image'], array('alt' => $product['Product']['name'], 'class' => 'img-thumbnail img-responsive')); ?>
    </div>

    <div class="col col-sm-5">

        <strong><?php echo $product['Product']['name']; ?></strong>

        <br />
        <br />

        Rs. <span id="productprice"><?php echo $product['Product']['price']; ?></span>

        <br />
        <br />

        <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
        <?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>

        <?php if(!empty($productmodshtml)):?>

            <div class="row">
            <div class="col-sm-5">
            <span style="font-weight:bold">Product Options:</span> <?php echo $productmodshtml;?>
            </div>
            </div>
            <br />
            <input type="hidden" id="modselected" value="" />

        <?php endif;?>

        <strong>Login|Signup to Buy</strong>
        <?php echo $this->Form->end(); ?>

        <br />

        <?php echo $product['Product']['description']; ?>

        <br />
        <br />


    </div>

</div>
