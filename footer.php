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
            <div class="row centre-line w40">
                <div class="line"></div>
                <div></div>
            </div>
            <div class="row w40">
                <div class="footer_text">
                    <h3 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_field('footer_main_text'); ?></span>
                        <span class="heading-secondary--sub"><?php the_field('footer_sub_heading'); ?></span>
                    </h3>
                    <p><?php the_field('footer_text'); ?></p>
                </div>
            </div>

            <div class="row">
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
    <?php elseif ($footerSwitch == 'main'):?>
    <?php $footerImage = get_field('footer_image','options'); ?>

    <div class="footer-hero" style="background-image: url(<?php echo $footerImage['url']; ?>)">
        <div class="footer-text-container">
            <div class="row centre-line w40">
                <div class="line"></div>
                <div></div>
            </div>
            <div class="row">
                <div class="footer_text">
                    <h3 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_field('footer_main_text','options'); ?></span>
                        <span class="heading-secondary--sub"><?php the_field('footer_sub_heading','options'); ?></span>
                    </h3>
                    <p><?php the_field('footer_text','options'); ?></p>
                </div>
            </div>

            <div class="row">
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
    <?php endif;?>
</div>
<footer class="footer">


    <div class="row footer-navbar">
        <div class="logo"><a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/footerlogo"); ?></a>
        </div>
        <div class="contact-details">Reservations</div>
        <div class="explore-links">Explore Our World</div>
        <div class="about-links">Get to Know Us</div>
        <div class="privacy-links">Important Stuff
            <ul>
                <li><?php 
$link = get_field('privacy_policy_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
                </li>
                <li><span><?php the_field('copy_text','options'); ?></span></li>
            </ul>
        </div>
        <div class="newsletter-block">Get to Know Us</div>
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