<?php $textBGImage = get_sub_field('background_image');?>
<?php $backgroundSwitch = get_sub_field('select_background');
$centerText = get_sub_field('centered_text');
            if ($backgroundSwitch == 'full'): ?>
<section class="section-text para <?php if($centerText == true): echo 'center-text'; endif;?>"
    style="background-image: linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
    <div class="row">
        <?php elseif ($backgroundSwitch == 'back'): ?>
        <section class="section-text <?php if($centerText == true): echo 'center-text'; endif;?>">
            <div class="row"
                style="background-image:linear-gradient(rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>), rgba(0, 0, 0, <?php the_sub_field('image_overlay'); ?>)), url(<?php echo $textBGImage['url']; ?>)">
                <?php else :?>
                <section class="section-text <?php if($centerText == true): echo 'center-text'; endif;?>">
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
                        <div class="row w40 text-para">
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