<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="section-destinations-slider <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php 
$terms = get_sub_field('select_destinations');
if( $terms ): ?>
        <div class="dest-slider owl-carousel owl-theme">
            <?php foreach( $terms as $term ): ?>
            <?php $destImage = get_field('hero_image',$term); ?>
            <div class="dest-item" style="background-image: url(<?php echo $destImage['url']; ?>)">
                <h2 class="heading-secondary"><?php echo esc_html( $term->name ); ?></h2>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">Find Out More</a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>


    </div>
</section>