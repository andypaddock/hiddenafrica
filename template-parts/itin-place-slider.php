<section class="section-itin-camps <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php if( have_rows('itinerary_maker') ): ?>
        <div class="prop-slider owl-carousel owl-theme">
            <?php while( have_rows('itinerary_maker') ): the_row();  ?>

            <?php $featured_post = get_sub_field('destination');
        if( $featured_post ): ?>
            <div class="property-style-block">
                <?php $styleImage = get_field('hero_image', $term); 
                $mainImage = get_the_post_thumbnail_url($featured_post->ID);
                $permalink = get_permalink( $featured_post->ID );
                $custom_field = get_field( 'short_description', $featured_post->ID ); ?>
                <div class="style-text">
                    <span class="meta uppercase"><?php the_sub_field('number_of_nights'); ?> Nights </span>
                    <h2 class="heading-secondary"><?php echo esc_html( $featured_post->post_title ); ?></h2>

                    <?php
$parent = ( isset( $featured_post->parent ) ) ? get_term_by( 'id', $featured_post->parent, 'destination' ) : false;
?><span class="meta italic underscores"><?php echo $parent->name; ?></span>
                    <p><?php if ($custom_field):?>
                        <?php echo wp_trim_words( $custom_field, 40, '...' ); ?>
                        <?php else: ?>



                        <?php
echo wp_trim_words( get_sub_field('itin_step_desc'), 40, '...' );
?><?php endif;?></p>
                    <a class="button outline itin-button" href="<?php echo esc_url( $permalink ); ?>">
                        <div class="icon"><i class="far fa-home"></i></div>
                        <div class="text"><span class="camp-name"><?php the_field('camps_slider_cta', 'options'); ?>
                            </span></div>
                        <i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $mainImage; ?>)">

                </div>
            </div>


            <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>