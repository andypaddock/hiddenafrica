<section class="gallery" <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>"
    <?php endif; ?>>
    <div class="row">
        <?php 
$images = get_sub_field('upload_images');
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child limit-six">
                <a href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['caption']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="row centre-line w50">
            <div class="line"></div>
            <div></div>
        </div>
        <a id="viewAll" class="view-more-btn" href="#">View More</a>
    </div>
</section>