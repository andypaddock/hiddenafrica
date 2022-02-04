<?php
/**
 * The template for displaying all single posts
 *
 * @package hiddenafrica
 */
get_header(); 

$term = get_queried_object();


// vars
$heroSize = get_field('hero_section_size', $term);
$color = get_field('color', $term);
?>
<!-- <header class="header <?php echo $heroSize; ?>">
    <?php get_template_part('template-parts/taxhero');?>
</header> -->

<!--closes in footer.php-->

<?php if (!is_front_page()): ?>
<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
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
                <p><?php echo esc_html($image['caption']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>


<section class="section-title" id="itineraries">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('itin_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php the_field('itin_title', $term); ?></span>
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
                $campImage = get_sub_field('hero_image');?>


            <div class="itinerary-item">
                <div class="itin-item-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

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
                        <div class="main"><?php $terms = get_the_terms( $post->ID, array( 'destination') ); ?>
                            <?php foreach ( $terms as $term ) : ?>
                            <p><?php echo $term->name; ?></p>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">
                        </div>
                    </div>
                </div>
                <div class="itin-item-link">
                    <a class="button outline" href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?></a>
                </div>
            </div>


            <!--item-->
            <?php endwhile; endif;?>
        </div>
    </div>
</section>




<?php get_footer(); ?>