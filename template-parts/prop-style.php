<section class="section-property-styles" id="<?php the_sub_field('section_id'); ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">


        <?php
        $terms = get_sub_field('select_prop_types');
        if ($terms) : ?>
        <div class="prop-slider owl-carousel owl-theme">
            <?php foreach ($terms as $term) : ?>
            <div class="property-style-block">
                <?php $styleImage = get_field('custom_image', $term); ?>
                <div class="style-text">
                    <h2 class="heading-secondary underscores"><?php echo esc_html($term->name); ?></h2>
                    <p><?php echo esc_html( $term->description ); ?></p>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>">Find Out More</a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


    </div>
</section>