<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');
$lightHero = get_field ('light_hero');
$heroSwitch = get_field('hero_type');
            if ($heroSwitch == 'video'): ?>


<div class="hero <?php the_field('image_anchor');?> tester imageoff-<?php the_field('image_offset');?>">
    <video playsinline autoplay muted loop poster="<?php echo $heroPoster['url'];?>" id="bgvideo">
        <?php if ($heroMobile): ?>
        <source src="<?php echo $heroMobile['url'];?>" type="video/mp4" media="all and (max-width: 480px)">
        <?php endif; ?>
        <source src="<?php echo $heroVideo['url'];?>" type="video/mp4">
    </video>
    <section>
        <div class="row w60">
            <div class="header__text-box">
                <h2 class="heading-primary fmtop <?php if($lightHero == true): echo 'light-hero'; endif; ?>">
                    <span class="heading-primary--main alt-font"><?php echo esc_html( get_the_title() ); ?></span>
                </h2>
            </div>
        </div>
    </section>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
</div>

<?php elseif ($heroSwitch == 'image'):?>
<div class="hero <?php the_field('image_anchor');?> tester imageoff-<?php the_field('image_offset');?> darkoverlay-<?php the_field('image_overlay');?>"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['sizes'] ['hero-image']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero-image' ); ?><?php endif ?>)">
    <section>
        <div class="row w60">
            <div class="overlay-country">
                <?php $terms = wp_get_post_terms( $post->ID , 'destination', array('parent'=>'0', 'exclude' => '104,105') );?>
                <?php if( $terms ): ?>
                <?php foreach( $terms as $term ): ?>
                <a href="<?php echo esc_url(get_term_link($term)); ?>"
                    target="_blank"><span><?php echo esc_html( $term->name ); ?></span></a>
                <?php endforeach; ?><?php endif; ?>
            </div>
        </div>
        <div class="row w60">
            <div class="header__text-box">
                <h1 class="heading-primary fmtop <?php if($lightHero == true): echo 'light-hero'; endif; ?>">
                    <span class="heading-primary--main alt-font"><?php echo esc_html( get_the_title() ); ?></span>
                </h1>
            </div>
        </div>
    </section>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>

</div>
<?php endif;?>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<?php if (is_singular('itineraries')):?>
<section class="quick-facts">
    <div class="row w80">
        <div class="itin-facts">
            <div class="where">
                <h3 class="heading-tertiary">Where To:</h3>

                <div class="meta">

                    <?php 
$terms = wp_get_post_terms( $post->ID , 'destination', array('childless'=>'true') );
if( $terms ): ?>
                    <ul id="places">

                        <?php foreach( $terms as $term ):?>

                        <li><?php echo ( $term->name ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="length">
                <h3 class="heading-tertiary">How Long</h3>
                <div class="meta"><?php the_field('how_long'); ?></div>
            </div>
            <div class="price">
                <h3 class="heading-tertiary">How Much</h3>
                <div class="meta"><?php the_field('how_much'); ?></div>
            </div>
        </div>
    </div>

</section>

<?php endif; ?>