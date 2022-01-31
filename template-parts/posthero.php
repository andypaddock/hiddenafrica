<?php $heroImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<div class="hero" style="background-image: url(<?php echo $heroImage[0]; ?>)">

</div>