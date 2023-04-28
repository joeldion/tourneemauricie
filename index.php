<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <Favicon> -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo TMA_URL; ?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo TMA_URL; ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo TMA_URL; ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo TMA_URL; ?>/favicon/site.webmanifest">
        <link rel="mask-icon" href="<?php echo TMA_URL; ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <!-- </Favicon> -->
        <!-- <Fonts> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ruda:wght@900&display=swap" rel="stylesheet">
        <!-- </Fonts> -->
        <title><?php echo get_bloginfo( 'title' ); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('container'); ?>>
        <?php get_header(); ?>
        <?php get_template_part('template-parts/content', 'main'); ?>
        <?php get_footer(); ?>
    </body>
</html>