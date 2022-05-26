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
$destTitles = get_field('destination_text','options');
?>
<header class="header">
    <?php get_template_part('template-parts/taxhero');?>


    <?php if (!is_front_page()): ?>
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
    <div class="header__text-box">
        <h1 class="heading-primary">
            <span class="heading-primary--sub italic"><?php the_field('sub_header', $term); ?></span>
            <span class="heading-primary--main"><?php echo single_term_title(); ?></span>
        </h1>

    </div>
    <?php endif; ?>
</header>

<!--closes in footer.php-->
<span id="content"></span>
<section>
    <div class="row w60">
        <article class="count1"><?php echo term_description(); ?></article>
    </div>
</section>
<?php get_template_part('template-parts/dest_highlight_block');?>

<section class="section-title" id="gallery">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub italic"><?php the_field('gallery_sub_title', $term); ?></span>
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
            <div class="child limit-three">
                <a href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['caption']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div id="viewmorelink">
            <div class="row centre-line w50">
                <div class="line"></div>
                <div></div>

            </div>
            <a id="viewAll" class="view-more-btn" href="#">View More</a>
        </div>
    </div>
</section>
<?php $queried_object = get_queried_object();
$term_id = $queried_object->term_id; ?>
<?php if($term->parent == 0 || $term_id == ('106') || $term_id == ('107')):?>




<section class="section-title" id="areas">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub italic"><?php the_field('areas_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo esc_attr( $destTitles['dest_with_title'] ); ?>
                <?php echo single_term_title(); ?></span>
        </h2>
    </div>
</section>
<section class="section-property-styles"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row">

        <div class="prop-slider owl-carousel owl-theme">

            <?php $terms = get_terms(
    array(
        'taxonomy'   => 'destination',
        'hide_empty' => false,
        'parent'     => $term_id,
    )
);?>
            <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
            <div class="property-style-block">
                <?php $styleImage = get_field('hero_image', $term); ?>
                <div class="style-text">
                    <h2 class="heading-secondary underscores">

                        <span class="heading-secondary--main"><?php echo esc_html($term->name); ?></span>
                        <span class="heading-secondary--sub light"><?php
$parent = get_term_by( 'id', $term->parent, get_query_var( 'taxonomy' ) );
if($parent):
    echo $parent->name;
endif;
?></span>
                    </h2>

                    <p><?php the_field('short_description', $term); ?></p>
                    <a class="button outline"
                        href="<?php echo esc_url(get_term_link($term)); ?>"><?php the_field('areas_of_cta', 'options'); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>
            <?php
    }
} ?>



        </div>
    </div>
</section>
<?php endif; ?>

<!-- ITINERARIES IN DESTINATION -->
<?php
$term = get_queried_object();     
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'itineraries', 
                            'posts_per_page' => -1,
                            'tax_query' => array(
                            'relation' => 'AND',
                                array(
                                'taxonomy' => 'destination',
                                'field' => 'id', 
                                'terms' => array($term_id),
                                'compare' => '=',
                        
                        ),
                    )
                        )
                    );
                    
                    
                    
                    
                    ?>
<?php if ($loop->have_posts()): ?>
<section class="section-title" id="itineraries">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub italic"><?php the_field('itins_sub_title',$term); ?></span>
            <span class="heading-secondary--main"><?php echo single_term_title(); ?>
                <?php echo esc_attr( $destTitles['itineraries_title'] ); ?></span>
        </h2>
    </div>
</section>


<section class="itineraries">
    <div class="row w80">
        <div class="itin-display-block grid-layout2">
            <?php
                 while ( $loop->have_posts() ):
                $loop->the_post();
                $campImage = get_field('hero_image');?>


            <div class="itinerary-item itin-card tile">
                <?php get_template_part('partials/itin','card');?>
            </div>


            <!--item-->
            <?php endwhile;
wp_reset_postdata();
?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- LODGES IN DESTINATION -->
<?php $queried_object = get_queried_object();
$term_id = $queried_object->term_id; ?>

<?php           
                    $loop = new WP_Query(
                        array(
                            'post_type' => 'properties', 
                            'posts_per_page' => -1,
                            'tax_query' => array(
                            'relation' => 'AND',
                                array(
                                'taxonomy' => 'destination',
                                'field' => 'id', 
                                'terms' => array($term_id),
                                'compare' => '=',
                        
                        ),
                    )
                        )
                    );
                    
                    
                    
                    
                    ?>
<?php if ($loop->have_posts()): ?>
<section class="section-title" id="lodges">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w60">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub italic"><?php the_field('lodges_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo esc_attr( $destTitles['lodges_title'] ); ?>
                <?php echo single_term_title(); ?></span>
        </h2>
    </div>
</section>


<section class="lodges">
    <div class="row">
        <div class="itin-display-block grid-layout3">
            <?php
                 while ( $loop->have_posts() ):
                $loop->the_post();
                $campImage = get_sub_field('hero_image');?>


            <div class="itinerary-item tile">
                <div class="itin-item-image"
                    style="background-image: url(<?php if ($campImage): ?><?php echo $campImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url($post->ID,'large'); ?><?php endif ?>)">

                </div>

                <div class="itin-item-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php echo taxonomy_hierarchy(); ?>
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

            <?php endwhile;
wp_reset_postdata();
?>
        </div>
        <div class="mixitup-page-list"></div>
        <div class="mixitup-page-stats"></div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>