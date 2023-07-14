<?php 
/*
 * Intro
 */
?>
<section id="intro" class="section section--intro">
    <div class="section__text">
        <?php echo wpautop( get_option( 'tma_intro_text' ) ); ?>
        <ul class="tma-list">
            <li class="tma-list__item tma-list__item--garlic">                            
                Visiter installations, animaux et cultures, faire des dégustations et mettre la main sur des produits frais
            </li>
            <li class="tma-list__item tma-list__item--pencil-brush">
                Découvrir des talents et des technique, se procurer des œuvres originales créées chez nous et faire de belles rencontres en famille
            </li>
        </ul>
    </div>
    <ul id="main-menu-list" class="menu__list">
        <li class="menu__item">
            <a href="#">
                <img src="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-maskinonge.png" 
                    srcset="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-maskinonge.png 1x, 
                            <?php echo TMA_GLOBALS['assetsPath']; ?>img/card-maskinonge-2x.png 2x" 
                    alt="Maskinongé" title="Maskinongé">
            </a>
        </li>
        <li class="menu__item">
            <a href="#">
                <img src="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-mekinac.png" 
                    srcset="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-mekinac.png 1x, 
                            <?php echo TMA_GLOBALS['assetsPath']; ?>img/card-mekinac-2x.png 2x" 
                    alt="Mékinac" title="Mékinac">
            </a>
        </li>
        <li class="menu__item">
            <a href="#">
                <img src="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-des-chenaux.png" 
                    srcset="<?php echo TMA_GLOBALS['assetsPath']; ?>img/card-des-chenaux.png 1x, 
                            <?php echo TMA_GLOBALS['assetsPath']; ?>img/card-des-chenaux-2x.png 2x" 
                    alt="Des Chenaux" title="Des Chenaux">
            </a>
        </li>
    </ul>
    <?php
        // wp_nav_menu([
        //     'theme_location'    =>  'main-menu',
        //     'container'         =>  'nav',
        //     'container_class'   =>  'header__menu menu',
        //     'container_id'      =>  'main-menu',
        //     'menu_id'           =>  'main-menu-list',
        //     'menu_class'        =>  'menu__list'
        // ]);
    ?>
</section>