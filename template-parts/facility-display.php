<section class="section-facilityicons">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <div class="<?php the_sub_field('columns'); ?>">

            <?php $terms = get_the_terms( $post->ID, array( 'facility') ); ?>
            <?php foreach ( $terms as $term ) :
                $image = get_field('icon',$term); ?>


            <div class="grid-item facility-icons tile">
                <div class="icon">
                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
                <div class="pop-over"><?php echo $term->name; ?>
                </div>
            </div>





            <?php endforeach; ?>

        </div>
    </div>
</section>