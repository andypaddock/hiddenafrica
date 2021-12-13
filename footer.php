<?php
/**
 * The template for displaying the footer
 * @package kitjames
 */
?>
<footer class="footer">
    <?php $footerSwitch = get_field('footer_override');
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
                    <h1 class="heading-secondary">
                        <span class="heading-secondary"><?php the_field('footer_main_text'); ?></span>
                    </h1>
                </div>
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
                    <h1 class="heading-secondary">
                        <span class="heading-secondary"><?php the_field('footer_main_text','options'); ?></span>
                    </h1>
                </div>
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
    <?php endif;?>

    <div class="row footer-navbar">
        <div class="logo"><?php get_template_part("inc/img/hiddenlogo"); ?></div>
        <div class="nav">
            <?wp_nav_menu( array( 
                        'theme_location' => 'footer-menu',
                        'container' => false,
    //                     'menu_class' => 'sidebar-list',
    //                     'list_item_class'  => 'sidebar-item',
    // 'link_class'   => 'sidebar-anchor'
					) ); ?>
        </div>
        <div class="privacy">
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