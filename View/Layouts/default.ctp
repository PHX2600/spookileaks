<!DOCTYPE html>
<html lang="en">
<head>

    <title>
        <?php echo strip_tags($page_title); ?> | SpookiLeaks
    </title>

    <?php echo $this->Html->meta('icon', $this->html->url('/img/favicon.ico')); ?>

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- SCRIPTS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <!-- META -->
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->Html->charset(); ?>

</head>

<body>

    <?php echo $this->element('site_header'); ?>

    <div class="container">

        <h1 class="page-title"><?php echo $page_title; ?></h1>

        <div class="alert-wrapper">
            <?php echo $this->Session->flash('flash', array('element' => 'flash')); ?>
        </div>

        <?php echo $this->fetch('content'); ?>

        <div class="site-footer">
            &copy; <?php echo date('Y'); ?> PHX2600 &bull; Developed by
            <a href="https://github.com/AltF4">AltF4</a> &amp;
            <a href="https://github.com/PHLAK">PHLAK</a>
        </div>

    </div>

</body>
</html>
