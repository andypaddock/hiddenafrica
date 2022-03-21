<?php $heroImage = get_field('hero_image'); ?>

<div class="hero imageoff-<?php the_field('image_offset');?>"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?><?php endif ?>)">

</div>