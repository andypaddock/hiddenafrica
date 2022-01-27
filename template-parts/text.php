<?php $bgColor = get_sub_field('bg_colour');
$textBGImage = get_sub_field('background_image');
$backgroundSwitch = get_sub_field('select_background');
$centerText = get_sub_field('center_text');
            if ($backgroundSwitch == 'full'): ?>
<section class="section-text para <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
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
                        <?php if (get_sub_field('text_block_header')):?>
                        <div class="row centre-line w50">
                            <div class="line"></div>
                            <div></div>
                        </div>
                        <div class="row w40">
                            <h2 class="heading-secondary">
                                <span
                                    class="heading-secondary--sub"><?php the_sub_field('text_block_subheader'); ?></span>
                                <span
                                    class="heading-secondary--main"><?php the_sub_field('text_block_header'); ?></span>
                            </h2>
                            <?php endif; ?>
                        </div>
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
                                target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>