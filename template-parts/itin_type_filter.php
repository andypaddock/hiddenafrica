<section class="testimonial-block">
    <div class="row">

        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => 'destination',
  'hide_empty' => true,
  'parent' => 0
) );?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="safaritype-grid filter-grid">
            <?php
            $tax = $wp_query->get_queried_object();
            $args = array(
                'post_type' => 'itineraries', 
                'tax-query' => array (
                    array(
                        'taxonomy' => 'safaritype',
                        'field' => 'slug',
                        'terms' => 'custom-safaris',
                        'operator' => 'IN'
                    )
                )
            );
$loop = new WP_Query($args);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = wp_get_post_terms( $post->ID, 'destination' ); ?>
            <div class="mix tile filter-item <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

                <div class="filter-item--image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="filter-item--text">
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
            <?php endwhile;
wp_reset_postdata();
?>
        </div>

    </div>

</section>