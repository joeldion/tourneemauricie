<?php 
/*
 * Intro
 */
?>
<section id="intro" class="section section--intro">
    <div class="section__head">
        <div class="section__head-text">
            <?php echo wpautop( get_option( 'tma_intro_text' ) ); ?>
            <ul class="tma-list">
                <li class="tma-list__item tma-list__item--garlic">                            
                    Visiter installations, animaux et cultures, faires des dégustations et mettre la main sur des produits frais
                </li>
                <li class="tma-list__item tma-list__item--pencil-brush">
                    Découvrir des talents et des technique, se procurer des œuvres originales créées chez nous et faire de belles rencontres en famille
                </li>
            </ul>
        </div>
    </div>
    <?php
        wp_nav_menu([
            'theme_location'    =>  'main-menu',
            'container'         =>  'nav',
            'container_class'   =>  'header__menu menu',
            'container_id'      =>  'main-menu',
            'menu_id'           =>  'main-menu-list',
            'menu_class'        =>  'menu__list'
        ]);
    ?>
</section>