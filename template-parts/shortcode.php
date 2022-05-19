<?php $heroImage = get_field('hero_image'); ?>
<section class="form-short-code"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['sizes'] ['hero-image']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?><?php endif ?>)">
    <div class="row">
        <?php
        if ( get_sub_field('shortcode') ) {
            echo do_shortcode( get_sub_field('shortcode') );
        }
        ?>
    </div>
</section>