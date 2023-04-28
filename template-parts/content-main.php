<?php 
/*
 * Main content
 */
?>
<main id="main" class="main">

    <section id="intro" class="section intro">
        <div class="section__columns">
            <div class="intro__text">
                <?php echo wpautop( get_option( 'tma_intro_text' ) ); ?>
            </div>
            <div class="intro__image">
                <img src="<?php echo wp_get_attachment_image_url( get_option( 'tma_intro_image' ), 'tma' ); ?>" srcset="<?php echo tma_srcset( get_option( 'tma_intro_image' ) ); ?>" alt="<?php echo bloginfo( 'title' ); ?>" width="700" height="440" loading="lazy">
            </div>
        </div>        
    </section>

    <section id="listing-1" class="section listing">
        <div class="section__head">
            <h2 class="section__head-title">
                <?php //esc_html_e(get_option('tma_listing_1_title')); ?>
                Tournée des Chenaux
            </h2>
            <div class="section__head-text">
                <?php echo wpautop( get_option('tma_listing_1_text' )); ?>
            </div>
        </div>
        <div class="section__columns">
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
        </div>
    </section>

    <section id="listing-2" class="section listing">
        <div class="section__head">
            <h2 class="section__head-title">
                <?php //esc_html_e(get_option( 'tma_listing_2_title' )); ?>
                Tournée Maski
            </h2>
            <div class="section__head-text">
                <?php echo wpautop( get_option( 'tma_listing_2_text' ) ); ?>
            </div>
        </div>
        <div class="section__columns">
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
        </div>
    </section>

    <section id="listing-3" class="section listing">
        <div class="section__head">
            <h2 class="section__head-title">
                <?php //esc_html_e(get_option( 'tma_listing_3_title' )); ?>
                Tournée Mékinac
            </h2>
            <div class="section__head-text">
                <?php echo wpautop( get_option( 'tma_listing_3_text' ) ); ?>
            </div>
        </div>
        <div class="section__columns">
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
            <div class="entry">
                <div class="entry__image">
                    <img src="https://dummyimage.com/700x440/000/fff" alt="">
                </div>
                <div class="entry__details">
                    <h3 class="entry__title">Lorem</h3>
                    <div class="entry__short-desc">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="entry__long-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima nostrum corporis accusantium.</p>
                    </div>
                    <div class="entry__contact entry__contact--address"><a href="#">Adresse</a></div>
                    <div class="entry__contact entry__contact--phone">Téléphone</div>
                    <div class="entry__contact entry__contact--email">Courriel</div>
                </div>
            </div>
        </div>
    </section>

</main>