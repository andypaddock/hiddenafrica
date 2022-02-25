<?php $bgColor = get_field('bg_colour', 'options');
$textBGImage = get_field('background_image', 'options');
$backgroundSwitch = get_field('select_background', 'options');
            if ($backgroundSwitch == 'full'): ?>
<section class="section-text para <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    style="background-image: linear-gradient(rgba(0, 0, 0, <?php the_field('image_overlay', 'options'); ?>), rgba(0, 0, 0, <?php the_field('image_overlay', 'options'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
    <div class="row">
        <?php elseif ($backgroundSwitch == 'back'): ?>
        <section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
            <div class="row"
                style="background-image:linear-gradient(rgba(0, 0, 0, <?php the_field('image_overlay', 'options'); ?>), rgba(0, 0, 0, <?php the_field('image_overlay', 'options'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
                <?php else :?>
                <section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
                    <div class="row">
                        <?php endif;?>
                        <div class="row  <?php the_field('column_size', 'options'); ?> site-wide-steps">
                            <div class="left-col">
                                <h3 class="heading-primary underscores"><?php the_field('steps_title', 'options'); ?>
                                </h3>

                                <?php if( have_rows('steps', 'options') ): ?>
                                <?php while( have_rows('steps', 'options') ): the_row(); ?>
                                <div class="items">
                                    <span class="icon"><?php the_sub_field('step_icon', 'options'); ?></span>
                                    <span class="text">
                                        <p><?php the_sub_field('step_text', 'options'); ?></p>
                                    </span>

                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                            <div class="right-col">
                                <h3 class="heading-primary underscores"><?php the_field('start_title', 'options'); ?>
                                </h3>

                                <div class="right-text">
                                    <p><?php the_field('start_text', 'options'); ?></p>
                                </div>
                                <?php 
$link = get_field('start_button', 'options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                                <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                                        class="fa-light fa-chevron-right"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>