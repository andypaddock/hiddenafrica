<section class="section-itinerary" <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>"
    <?php endif; ?>>
    <div class="row extended">


        <?php
$featured_posts = get_sub_field('select_itineraries');
if( $featured_posts ): ?>
        <div class="itin-slider owl-carousel owl-theme">
            <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
            <div class="itin-slide-block">
                <div class="itin-slide-image"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">

                </div>
                <div class="itin-slide-text">
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
                    <span class="meta"><?php the_field( 'how_long' ); ?></span>

                    <div class="destination-meta">
                        <div class="main"><?php $terms = get_the_terms( $post->ID, array('destination') ); ?>

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'country'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">

                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term);?>
                            <?php if ($placeType == 'place'):?>
                            <span class="<?php the_field('dest_type', $term)?>"><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>


                </div>
                <div class="itin-slide-button"><a class="button outline"
                        href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i
                            class="fa-light fa-chevron-right"></i></a></div>
            </div>
            <?php endforeach; ?>

        </div>
        <!-- <div class="mask"></div> -->
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>


    </div>
</section>