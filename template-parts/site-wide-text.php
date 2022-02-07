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
                        <div class="row  <?php the_field('column_size', 'options'); ?> text-para">
                            <?php the_field('paragraphs'); ?>
                            <?php 
$link = get_field('link', 'options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                            <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>