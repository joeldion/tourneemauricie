<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-XMPKT8SD8S"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XMPKT8SD8S');
        </script>
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
        <meta name="google-site-verification" content="8Sb3NXZFrMOu2oWamdKYY0FUpbYDuojQn6rJucvYxOM" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('container'); ?>>
        <?php
            wp_nav_menu([
                'theme_location'    =>  'top-menu',
                'container'         =>  'nav',
                'container_class'   =>  'top-menu',
                'container_id'      =>  'top-menu',
                'menu_id'           =>  'top-menu-list',
                'menu_class'        =>  'top-menu__list',
                'items_wrap'        =>  '<a href="#" id="top-menu-hamburger" class="top-menu__hamburger"></a><ul id="%1$s" class="%2$s">%3$s</ul>'
            ]);
        ?>
        <header class="header" role="banner">
            <div class="header__content">
                <div class="header__logo">
                    <a href="<?php echo get_home_url(); ?>" aria-label="Accueil">
                        <img src="<?php echo tma_logo_src(); ?>" alt="<?php echo get_bloginfo( 'title' ); ?>" title="<?php echo get_bloginfo( 'title' ); ?>" height="192" width="300">
                    </a>                              
                </div>
                <?php
                /*
                    $args = [
                        'theme_location'    =>  'main-menu',
                        'container'         =>  'nav',
                        'container_class'   =>  'header__menu menu',
                        'menu_id'           =>  'main-menu',
                        'menu_class'        =>  'menu__list'
                    ];
                    wp_nav_menu( $args );
                */
                ?>
                <h1 class="header__title"><?php the_title(); ?></h1>                
            </div>
        </header>