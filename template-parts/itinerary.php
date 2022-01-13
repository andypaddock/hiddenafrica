<section class="section-itenerary">
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php
$featured_posts = get_sub_field('select_itineraries');
if( $featured_posts ): ?>
        <ul>
            <?php foreach( $featured_posts as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <span>A custom field from this post: <?php the_field( 'field_name' ); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        <?php endif; ?>


    </div>
</section>