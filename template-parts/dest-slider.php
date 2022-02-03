<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-destinations-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    id="<?php the_sub_field('section_id'); ?>">
    <div class="row <?php the_sub_field('column_size'); ?>">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_sub_field('sub_title'); ?></span>
            <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>

        </h2>

        <?php 
$terms = get_sub_field('select_destinations');
if( $terms ): ?>
        <div class="dest-slider owl-carousel owl-theme">
            <?php foreach( $terms as $term ): ?>
            <?php $destImage = get_field('custom_image',$term); ?>
            <div class="dest-item" style="background-image: url(<?php echo $destImage['url']; ?>)">
                <h2 class="heading-secondary"><?php echo esc_html( $term->name ); ?></h2>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">Find Out More</a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


    </div>
</section>