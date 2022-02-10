<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
$textBGImage = get_sub_field('background_image');
$backgroundSwitch = get_sub_field('select_background');
$centerText = get_sub_field('center_text');
            if ($backgroundSwitch == 'full'): ?>
<section
    class="section-text para <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>
    style="background-image: linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
    <div class="row">
        <?php elseif ($backgroundSwitch == 'back'): ?>
        <section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
            <div class="row"
                style="background-image:linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
                <?php else :?>
                <section class="section-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
                    <div class="row">
                        <?php endif;?>
                        <div
                            class="row  <?php the_sub_field('column_size'); ?> text-para <?php if($centerText == true): echo 'center-text'; endif;?> <?php the_sub_field('para_cols'); ?>">
                            <?php the_sub_field('paragraphs'); ?>
                            <?php 
$link = get_sub_field('link');
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
                </section>