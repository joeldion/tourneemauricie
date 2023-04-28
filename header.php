<?php 
/*
 * Header
 */
?>
<header class="header" role="banner" style="background-image: url(<?php echo TMA_URL . 'assets/img/banner-demo.jpg'; ?>);">

    <div class="header__content">

        <h1 class="header__logo">                
            <a href="<?php echo get_home_url(); ?>" aria-label="Accueil">
                <img src="<?php echo TMA_LOGO_SRC; ?>" alt="<?php echo get_bloginfo( 'title' ); ?>" title="<?php echo get_bloginfo( 'title' ); ?>" height="192" width="300">
            </a>                              
        </h1>
        
        <h2 class="header__subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, veniam quaerat!</h2>

        <h3 class="header__dates">23 et 24 septembre 2023</h3>

        <nav class="header__menu menu" role="navigation">
            <ul class="menu__list">
                <li class="menu__item"><a href="#" data-target="#listing-1" >Tournée des Chenaux</a></li>
                <li class="menu__item"><a href="#" data-target="#listing-2">Tournée Maski</a></li>
                <li class="menu__item"><a href="#" data-target="#listing-3">Tournée Mékinac</a></li>
            </ul>
        </nav>

        <!-- <div class="header__cta">
            <a href="#" class="scroll" data-target="#map">Voir l'itinéraire</a>
        </div> -->

        <?php /*
        <div class="header__video<?php echo is_mobile() ? ' header__video--mobile' : ''; ?>">
            <?php if ( !is_mobile() ): ?>
                <video muted loop preload="none" poster="<?php echo HP_URL; ?>/img/videos/hangarts-intro-frame.jpg">
                    <source src="<?php echo HP_URL; ?>/img/videos/hangarts-intro.mp4" type="video/mp4" />
                    Votre navigateur est désuet.
                </video>
            <?php endif; ?>
        </div>
        */ ?>

    </div>

</header>