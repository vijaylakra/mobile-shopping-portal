<!doctype html>
<html>
<head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $title_for_layout; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <?php echo $this->Html->css(array('bootstrap.min.css', 'bootstrap-theme.min.css', 'css.css')); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php echo $this->Html->script(array('bootstrap.min.js')); ?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <?php echo $this->Html->script(array('js.js')); ?>
    <?php echo $this->App->js(); ?>
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->fetch('css'); ?>
    <?php echo $this->fetch('script'); ?>

    <?php if($this->Session->check('Shop')) : ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#cartbutton').show();
            });
        </script>
    <?php endif; ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo Configure::read('Settings.ANALYTICS'); ?>', '<?php echo Configure::read('Settings.DOMAIN'); ?>');
        ga('send', 'pageview');

    </script>
</head>
<body>

    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SHOP CUSTOMER</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'index','customer'=>true)); ?></li>
                <li><?php echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'products','customer'=>true)); ?></li>
                <li><?php echo $this->Html->link('Search', array('controller' => 'products', 'action' => 'search','customer'=>true)); ?></li>
                <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'customer' => false));

                ?></li>
            </ul>
            <ul class="navbar-form form-inline navbar-right">

                <?php echo $this->Form->create('Product', array('type' => 'GET', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>

                <?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'id' => 's', 'class' => 'input-sm s', 'autocomplete' => 'off')); ?>
                <?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-sm btn-primary')); ?>
                &nbsp;
                <span id="cartbutton" style="display:none;">
                  <?php echo $this->Html->link('Shopping Cart', array('controller' => 'shop', 'action' => 'cart'), array('class' => 'btn btn-sm btn-success')); ?>
                </span>
                <?php echo $this->Form->end(); ?>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">

            <?php echo $this->Session->flash(); ?>
            <br />
            <ul class="breadcrumb">
                <?php echo $this->Html->link('Home', array('controller' => 'products', 'action' => 'index')); ?> / <?php echo $this->Html->getCrumbs(' / '); ?>
            </ul>

            <?php echo $this->fetch('content'); ?>
            <br />
            <div id="msg"></div>
            <br />

            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> CAKEPHP MOBILE SHOPPING CART !
            </div>

        </div>
    </div>

</body>
</html>
