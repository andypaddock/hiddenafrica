<section class="faq-block">
    <div class="row w60">
        <div class="col  toggle-block block <?php

if(get_sub_field('display_settings'))
{
	echo 'one';
}

?>">


            <?php if( have_rows('faq_item') ): 
                     while ( have_rows('faq_item') ) : the_row(); ?>

            <div class="block__item">
                <div class="block__title">
                    <h3 class="heading"><span
                            class="highlight-letter"><?php the_sub_field('letter'); ?></span><?php the_sub_field('title'); ?>
                    </h3>
                </div>
                <div class="block__text">
                    <?php the_sub_field('description'); ?>
                </div>

            </div>

            <?php endwhile; endif; ?>


        </div>
    </div>
</section>