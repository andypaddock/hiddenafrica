<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="gallery <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php 
$images = get_sub_field('upload_images');
$count = 0;
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child <?php the_sub_field('images_to_display'); ?>">
                <a href="<?php echo esc_url($image['url']); ?>" title="<?php echo esc_attr($image['caption']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php $count++; endforeach; ?>
        </div>
        <?php endif; ?>
        <?php if ($count > 3):?>
        <div id="viewmorelink">
            <div class="row centre-line w50">
                <div class="line"></div>
                <div></div>
            </div>
            <a id="viewAll" class="view-more-btn" href="#">View More</a>
        </div>
        <?php endif; ?>
    </div>
</section>