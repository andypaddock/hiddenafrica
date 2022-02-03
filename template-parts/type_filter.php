<section class="testimonial-block" id="testimonial-section">
    <?php
$filterType = get_sub_field( 'filter_by' );?>
    <div class="row">
        <?php if(get_sub_field('show_filters')):?>
        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => $filterType,
  'hide_empty' => true,
) );?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php endif;?>

        <div class="testimonial-grid filter-grid">
            <?php
$filterElement = get_sub_field( 'itin_prop' );
$loop = new WP_Query(
    array(
        'post_type' => $filterElement, 
        'posts_per_page' => -1,
    )
);
$counter = 0;
while ( $loop->have_posts() ) : $loop->the_post();
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large');
$counter++;

?>
            <?php $terms = wp_get_post_terms( $post->ID, $filterType ); ?>

            <div class="mix tile filter-item <?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">

                <div class="filter-item--image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="filter-item--text">
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
            <?php endwhile;
wp_reset_postdata();
?>
        </div>

    </div>

</section>