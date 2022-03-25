<?php $bgColor = get_sub_field('bg_colour');?>
<section class="destination-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">

    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="signature-itins owl-carousel owl-theme">
            <?php 
$featured_posts = get_sub_field('select_dest_block_items');
if( $featured_posts ): ?>
            <?php foreach( $featured_posts as $post ): 

// Setup this post for WP functions (variable must be named $post).
setup_postdata($post); ?>
            <?php $destImage = get_field('hero_image',$destination); ?>
            <div class="post-item">
                <a href="<?php echo get_permalink( $post->ID ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $destImage['url']; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php $terms = get_the_term_list( $post->ID, 'safaritype', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}
?>
                        </span>
                        <span class="heading-tertiary--main underscores"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <p><?php $excerpt = wp_trim_words( get_field('excerpt' ), $num_words = 10, $more = '...' ); ?><?php echo ($excerpt);?>
                    </p>
                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php the_permalink(); ?>">
                        Find Out more<i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
        </div>
        <?php endif; ?>

    </div>

</section>