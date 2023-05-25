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
        <header class="header header--front-page" role="banner">
            <div class="header__content">
                <h1 class="header__logo">                
                    <a href="<?php echo get_home_url(); ?>" aria-label="Accueil">
                        <img src="<?php echo tma_logo_src(); ?>" alt="<?php echo get_bloginfo( 'title' ); ?>" title="<?php echo get_bloginfo( 'title' ); ?>" height="192" width="300">
                    </a>                              
                </h1>                
                <h3 class="header__dates">23 et 24 septembre 2023</h3>
                <h2 class="header__subtitle">Portes ouvertes chez près de 90 producteurs, artistes et artisans</h2>

                <!-- <div class="header__text">
                    <p>La Tournée Arts et Terroir Mauricie, un heureux mélange entre route des arts et itinéraire gourmand.</p>
                    <p>Artistes, artisans et producteurs de la Mauricie rurale vous ouvrent leurs portes pour présenter leurs œuvres et leurs produits, et expliquer comment ils travaillent.</p>
                    <ul class="tma-list">
                        <li class="tma-list__item tma-list__item--garlic">                            
                            Visiter installations, animaux et cultures, faires des dégustations et mettre la main sur des produits frais
                        </li>
                        <li class="tma-list__item tma-list__item--pencil-brush">
                            Découvrir des talents et des technique, se procurer des œuvres originales créées chez nous et faire de belles rencontres en famille
                        </li>
                    </ul>
                </div> -->
                
            </div>
        </header>