<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="section-largeadvert <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <?php $advertImage = get_sub_field('advert_image'); ?>

    <div class="advert-hero" style="background-image: url(<?php echo $advertImage['url']; ?>)">
        <div class="advert-text-container">

            <div class="row advert-message-box">
                <div class="advert_text">
                    <h3 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_sub_field('advert_main_text'); ?></span>
                        <span class="heading-secondary--sub"><?php the_sub_field('advert_sub_heading'); ?></span>
                    </h3>
                    <p><?php the_sub_field('advert_text'); ?></p>


                    <div class="advert_link">
                        <?php 
$link = get_sub_field('advert_link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                        <a class="button outline light" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                                class="fa-light fa-chevron-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>