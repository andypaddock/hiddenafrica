<?php
/**
 * The template for displaying all single posts
 *
 * @package hiddenafrica
 */
get_header('tax'); 

$term = get_queried_object();


// vars
$heroSize = get_field('hero_section_size', $term);
$color = get_field('color', $term);
$mapImage = get_field('destination_map', $term);
?>
<header class="header map-hero">
    <div class="hero map-popup">
    </div>
    <a href="#" class="map-close">&times;</a>
    <img src="<?php echo $mapImage['sizes'] ['large']; ?>" />
    <div class="map-link">
        <a class="map-link" href="#">
            <i class="far fa-bars"></i>
            <span>See Whole Map</span>
        </a>
    </div>


</header>

<!--closes in footer.php-->

<?php if (!is_front_page()): ?>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">
        <span class="heading-primary--sub"><?php the_field('sub_header', $term); ?></span>
        <span class="heading-primary--main"><?php echo single_term_title(); ?></span>
    </h1>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>
</div>
<?php endif; ?>
<span id="content"></span>
<section>
    <div class="row w40">
        <article class="count1"><?php echo term_description(); ?></article>
    </div>
</section>


<section class="section-title" id="gallery">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('gallery_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php the_field('gallery_title', $term); ?></span>
        </h2>
    </div>
</section>


<section class="gallery">
    <div class="row">
        <?php 
$images = get_field('upload_images', $term);
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child tile">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>


<section class="section-title" id="lodges">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('lodges_sub_title', $term); ?></span>
            <span class="heading-secondary--main">Lodges in <?php echo single_term_title(); ?></span>
        </h2>
    </div>
</section>


<section class="lodges">
    <div class="row">
        <div class="itin-display-block grid-layout3">
            <?php
                $args = array(
                    'post_type' => 'properties',
                    'tax_query' => array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'destination',
                            'field' => 'slug',
                            'terms' => array( $term->slug )
                        ),
                    )
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_sub_field('hero_image');?>


            <div class="itinerary-item tile">
                <div class="itin-item-image"
                    style="background-image: url(<?php if ($campImage): ?><?php echo $campImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url($post->ID,'large'); ?><?php endif ?>)">

                </div>

                <div class="itin-item-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php $terms = get_the_term_list( $post->ID, 'destination', '' ,  ' > ' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}

?>
                        </span>

                        <span class="heading-tertiary--main"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <div class="right_arrow">
                        <div class="arrow bounce">
                            <a class="fal fa-chevron-right fa-2x" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>


            <!--item-->
            <?php endwhile; endif;?>
        </div>
    </div>
</section>


<section class="section-title" id="itineraries">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('itins_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo single_term_title(); ?> Itineraries</span>
        </h2>
    </div>
</section>


<section class="itineraries">
    <div class="row w80">
        <div class="itin-display-block grid-layout2">
            <?php
                $args = array(
                    'post_type' => 'itineraries',
                    'tax_query' => array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'destination',
                            'field' => 'slug',
                            'terms' => array( $term->slug )
                        ),
                    )
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_field('hero_image');?>


            <div class="itinerary-item tile">
                <div class="itin-item-image"
                    style="background-image: url(<?php if ($campImage): ?><?php echo $campImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url($post->ID,'large'); ?><?php endif ?>)">

                </div>

                <div class="itin-item-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub underscores">
                            <?php $terms = get_the_term_list( $post->ID, 'safaritype', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}
?>
                        </span>
                        <span class="heading-tertiary--main"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <span class="days"><?php the_field( 'how_long' ); ?></span>
                    <div class="destination-meta">
                        <div class="main">
                            <?php $terms = get_the_terms( $post->ID, array( 'destination') ); ?>
                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term); if ($placeType == 'country'):?>
                            <span><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">
                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term); if ($placeType == 'placecamp'):?>
                            <span><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="itin-item-link">
                    <a class="button outline" href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
            </div>


            <!--item-->
            <?php endwhile; endif;?>
        </div>
    </div>
</section>

<?php if( !empty( $mapImage ) ): ?>
<section class="section-title" id="map">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('map_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo single_term_title(); ?> Map</span>
        </h2>
    </div>
</section>
<section class="section-map">

    <div class="row">
        <a class="image-popup-no-margins" href="<?php echo $mapImage['url']; ?>">
            <img src="<?php echo $mapImage['sizes']['large']; ?>" alt="<?php echo $mapImage['alt']; ?>" />
        </a>

    </div>
</section>
<?php endif; ?>



<?php get_footer(); ?>