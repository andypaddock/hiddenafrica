<?php
/**
 * Header
 *
 * @package hiddenafrica
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYQ9W4RGF4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-SYQ9W4RGF4');
    </script>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $excerpt; ?>">
    <meta name="keywords" content=" ">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo is_front_page() ? get_bloginfo( 'name' ) : wp_title( '' ); ?></title>
    <script src="https://kit.fontawesome.com/4faa096376.js" crossorigin="anonymous" defer="defer"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/turf/v2.0.0/turf.min.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div class="nav-right visible-xs">
        <div class="navbutton">
            <div class="bar top"></div>
            <div class="bar middle"></div>
            <div class="bar bottom"></div>
        </div>
    </div>

    <main>

        <div id="navbar" class="top-bar">
            <div class="logo-bar row">
                <div class="logo-bar__contacts">
                    <?php if( have_rows('nav_contact_links','options') ): ?>
                    <ul class="nav-contacts">
                        <?php while( have_rows('nav_contact_links','options') ): the_row(); ?>
                        <li>
                            <?php 
$link = get_sub_field('link','options');
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
                <div class="logo-bar__image"><a
                        href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/hiddenlogo"); ?></a></div>
                <div class="logo-bar__button">
                    <?php 
$link = get_field('nav_link','options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>

                </div>
            </div>
            <menu>
                <?wp_nav_menu( array( 
                        'theme_location' => 'main-menu',
                        'container_class' => 'header-menu row'
                        // 'menu_class' => 'header-menu',
    //                     'list_item_class'  => 'sidebar-item',
    // 'link_class'   => 'sidebar-anchor'
                    ) ); ?>
            </menu>
        </div>

        <nav>
            <!-- nav-right -->

            <div class="nav-right hidden-xs">
                <div class="navbutton">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
            </div>


        </nav>
        <header class="header">

            <?php if (is_tax('destination')):?>
            <?php get_template_part('template-parts/desthero');?>
            <?php elseif (is_tax('safaritype')):?>
            <?php get_template_part('template-parts/taxhero');?>
            <?php elseif (is_tax('propertystyle')):?>
            <?php get_template_part('template-parts/taxhero');?>
            <?php elseif (is_singular('itineraries')):?>
            <?php get_template_part('template-parts/itinhero');?>
            <?php elseif (is_single()):?>
            <?php get_template_part('template-parts/posthero');?>

            <?php else:?>
            <?php get_template_part('template-parts/hero');?>
            <?php endif; ?>
        </header>

        <!--closes in footer.php-->