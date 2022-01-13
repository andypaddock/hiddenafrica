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
    <title><?php echo the_title(); ?></title>
    <script src="https://kit.fontawesome.com/4faa096376.js" crossorigin="anonymous" defer="defer"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet" />
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div class="nav-right visible-xs">
        <div class="navbutton" id="btn">
            <div class="bar top"></div>
            <div class="bar middle"></div>
            <div class="bar bottom"></div>
        </div>
    </div>

    <main>
        <div id="navbar" class="top-bar">
            <div class="logo-bar">
                <div class="logo-bar__contacts"></div>
                <div class="logo-bar__image"><a
                        href="<?php echo site_url(); ?>"><?php get_template_part("inc/img/hiddenlogo"); ?></a></div>
                <div class="logo-bar__button"></div>
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
                <div class="navbutton" id="btn">
                    <div class="bar top"></div>
                    <div class="bar middle"></div>
                    <div class="bar bottom"></div>
                </div>
            </div>


        </nav>
        <header class="header <?php the_field('hero_section_size'); ?>">
            <?php if (is_single()):?>
            <?php get_template_part('template-parts/posthero');?>
            <?php elseif (is_singular('destinations')):?>
            <?php get_template_part('template-parts/desthero');?>
            <?php else:?>
            <?php get_template_part('template-parts/hero');?>
            <?php endif; ?>
        </header>

        <!--closes in footer.php-->