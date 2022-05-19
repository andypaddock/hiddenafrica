<?php
/**
 * The template for displaying the footer
 * @package kitjames
 */
?>
<div class="filler-block"></div>

<?php $linkSwitch = get_field('force', 'options');?>
<?php if($linkSwitch == true): ?>

<?php get_template_part('template-parts/force-site-wide-text');?>

<?php endif; ?>
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


<?php $displayLogo = get_field('where_to_display','options');
if(in_array('all', $displayLogo, true)): ?>
<?php get_template_part('template-parts/logo_slider');?>
<?php elseif (in_array('home', $displayLogo, true)): ?>
<?php if (is_front_page()):?>
<?php get_template_part('template-parts/logo_slider');?>
<?php endif; ?>
<?php elseif (in_array('itin', $displayLogo, true)): ?>
<?php if (is_singular('itineraries')):?>
<?php get_template_part('template-parts/logo_slider');?>
<?php endif; ?>
<?php elseif (in_array('dest', $displayLogo, true)): ?>
<?php if (is_tax('destination')):?>
<?php get_template_part('template-parts/logo_slider');?>
<?php endif; ?>

<?php endif; ?>

<footer class="footer">
    <div class="row footer-navbar">
        <div class="logo"><a href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/hiddenlogo"); ?></a>
            <div class="contact-details">
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
                <?php the_field('address','options');?>
            </div>
            <?php 
$link = get_field('reservation_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
            <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
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
        <div class="newsletter-block">
            <h3 class="heading-tertiary">Sign up for exclusive news and inspiration</h3>
            <?php
        if ( get_field('footer_shortcode','options') ) {
            echo do_shortcode( get_field('footer_shortcode','options') );
        }
        ?>
        </div>

        <div class="footer-feed">
            <h3 class="heading-tertiary">Our Latest Blog Posts</h3>
            <ul class="lower-footer-links">

                <?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>

                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <li>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <!-- <?php echo wp_trim_words(get_the_excerpt(), 15); ?> -->
                    <a class="overscores italic" href="<?php the_permalink(); ?>">Read more</a>
                </li>

                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p><?php __('No News'); ?></p>
            <?php endif; ?>

        </div>
    </div>
    <div class="footer-accreds">
        <div class="row">
            <div class="company-links">
                <?php if (get_field('company_title','options')):?>
                <span class="heading-secondary--main"><?php the_field('company_title','options');?></span>
                <?php endif;?>

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