<?php
/**
 * The template for displaying the footer
 * @package kitjames
 */
?>
<div class="filler-block"></div>
<div class="footer-message"><?php $footerSwitch = get_field('footer_override');
            if ($footerSwitch == 'alternate'): ?>


    <?php $footerImage = get_field('footer_image'); ?>

    <div class="footer-hero" style="background-image: url(<?php echo $footerImage['url']; ?>)">
        <div class="footer-text-container">

            <div class="row footer-message-box">
                <div class="footer_text">
                    <h3 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_field('footer_main_text'); ?></span>
                        <span
                            class="heading-secondary--sub italic underscores"><?php the_field('footer_sub_heading'); ?></span>
                    </h3>
                    <p><?php the_field('footer_text'); ?></p>

                    <div class="footer_link">
                        <?php 
$link = get_field('footer_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a class="footer_button" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php elseif ($footerSwitch == 'main'):?>
    <?php $footerImage = get_field('footer_image','options'); ?>

    <div class="footer-hero" style="background-image: url(<?php echo $footerImage['url']; ?>)">
        <div class="footer-text-container">

            <div class="row footer-message-box">
                <div class="footer_text">
                    <h3 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_field('footer_main_text','options'); ?></span>
                        <span
                            class="heading-secondary--sub italic underscores"><?php the_field('footer_sub_heading','options'); ?></span>
                    </h3>
                    <p><?php the_field('footer_text','options'); ?></p>


                    <div class="footer_link">
                        <?php 
$link = get_field('footer_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a class="footer_button" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>
<footer class="footer">


    <div class="row footer-navbar">
        <div class="logo"><a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/footerlogo"); ?></a>
            <?php if( have_rows('social_media_links','options') ): ?>
            <ul class="social-links">
                <?php while( have_rows('social_media_links','options') ): the_row(); ?>
                <li>
                    <?php 
$link = get_sub_field('social_media_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php the_sub_field('font_awesome_icon','options'); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="contact-details">
            <h3 class="heading-tertiary">Reservations</h3>
            <?php if( have_rows('reservation_links','options') ): ?>
            <ul class="lower-footer-links">
                <?php while( have_rows('reservation_links','options') ): the_row(); ?>
                <li>
                    <?php 
$link = get_sub_field('links','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="explore-links">
            <h3 class="heading-tertiary">Explore Our World</h3>
            <?php if( have_rows('explore_menu_items','options') ): ?>
            <ul class="lower-footer-links">
                <?php while( have_rows('explore_menu_items','options') ): the_row(); ?>
                <li>
                    <?php 
$link = get_sub_field('link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="about-links">
            <h3 class="heading-tertiary">Get to Know Us</h3>
            <?php if( have_rows('know_menu_items','options') ): ?>
            <ul class="lower-footer-links">
                <?php while( have_rows('know_menu_items','options') ): the_row(); ?>
                <li>
                    <?php 
$link = get_sub_field('link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="privacy-links">
            <h3 class="heading-tertiary">Important Stuff</h3>
            <?php if( have_rows('important_menu_items','options') ): ?>
            <ul class="lower-footer-links">
                <?php while( have_rows('important_menu_items','options') ): the_row(); ?>
                <li>
                    <?php 
$link = get_sub_field('link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="company-links">


            <?php if( have_rows('linked_companies','options') ): ?>
            <?php while( have_rows('linked_companies','options') ): the_row(); ?>

            <?php 
$link = get_sub_field('link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img
                    src="<?php the_sub_field('company_logo','options'); ?>" /></a>
            <?php endif; ?>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>
        <div class="newsletter-block">
            <h3 class="heading-tertiary">Get to Know Us</h3>
            <?php
        if ( get_field('footer_shortcode','options') ) {
            echo do_shortcode( get_field('footer_shortcode','options') );
        }
        ?>
        </div>
    </div>


</footer>
</main>
<div class="sidebar">
    <?wp_nav_menu( array( 
                        'theme_location' => 'mobile-menu',
                        'container' => false,
                        'menu_class' => 'sidebar-list',
                        'list_item_class'  => 'sidebar-item',
    'link_class'   => 'sidebar-anchor'
					) ); ?>
</div>


<?php wp_footer(); ?>
</body>

</html>