<section class="section-itineraries">
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php
$featured_posts = get_sub_field('select_itineraries');
if( $featured_posts ): ?>
        <div class="destination-grid <?php the_sub_field('columns');?>">
            <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
            <div class="itin-block">
                <div class="itin-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

                </div>
                <div class="itin-text">
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
                    <span class="meta"> <?php $terms = get_the_term_list( $post->ID, 'destination', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}

?></span>
                    <div class="itin-destinations"></div>
                    <a class="button outline" href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>



    </div>
</section>