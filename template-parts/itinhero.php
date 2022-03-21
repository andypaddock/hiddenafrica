<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');
$lightHero = get_field ('light_hero');
$heroSwitch = get_field('hero_type');
            if ($heroSwitch == 'video'): ?>


<div class="hero tester imageoff-<?php the_field('image_offset');?>">
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
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
</div>

<?php elseif ($heroSwitch == 'image'):?>
<div class="hero tester imageoff-<?php the_field('image_offset');?>"
    style="background-image: url(<?php if ($heroImage): ?><?php echo $heroImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?><?php endif ?>)">
    <section>
        <div class="row w60">
            <div class="header__text-box">
                <h2 class="heading-primary fmtop <?php if($lightHero == true): echo 'light-hero'; endif; ?>">
                    <span class="heading-primary--main alt-font"><?php echo esc_html( get_the_title() ); ?></span>
                </h2>
            </div>
        </div>
    </section>
    <div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
</div>
<?php endif;?>