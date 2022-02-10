<section class="gallery" <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>"
    <?php endif; ?>>
    <div class="row">
        <?php 
$images = get_sub_field('upload_images');
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child tile">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                <p><?php echo esc_html($image['caption']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>