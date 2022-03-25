<section class="section-facilityicons">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">
            <?php if (get_the_terms(get_the_ID(), 'activity')):?>
            <?php foreach (get_the_terms(get_the_ID(), 'activity') as $cat): 
            
                $image = get_field('icon',$cat); ?>
            <div class="grid-item facility-icons tile">
                <div class="icon">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
                <div class="pop-over"><?php echo $cat->name; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif;?>


        </div>
    </div>
</section>