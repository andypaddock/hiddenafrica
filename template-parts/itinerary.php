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
                    <div class="overlay-country">
                        <?php $terms = wp_get_post_terms( $post->ID , 'destination', array('parent'=>'0') );?>
                        <?php if( $terms ): ?>
                        <?php foreach( $terms as $term ): ?>
                        <span><?php echo esc_html( $term->name ); ?></span>
                        <?php endforeach; ?><?php endif; ?>
                    </div>
                </div>
                <div class="itin-slide-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php the_field( 'how_long' ); ?> <?php $terms = get_the_term_list( $post->ID, 'safaritype', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}
?>
                        </span>
                        <span class="heading-tertiary--main  underscores"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <span class="meta"></span>

                    <div class="destination-meta">
                        <?php 
$terms = wp_get_post_terms( $post->ID , 'destination', array('childless'=>'true') );
if( $terms ): ?>
                        <ul id="places">
                            <li>Visiting:</li>
                            <?php foreach( $terms as $term ):?>

                            <li><?php echo ( $term->name ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>

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