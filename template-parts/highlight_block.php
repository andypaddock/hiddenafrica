<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-hightlightmap <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php $image = get_sub_field('map_image');
                $rowReverse = get_sub_field('reverse_layout');
                $selectMedia = get_sub_field('image_or_map'); ?>
        <div class="map-item">
            <?php if ($selectMedia == 'map'): ?>
            <div class="map-box">
                <div class="overlay-country">
                    <?php $terms = wp_get_post_terms( $post->ID , 'destination', array('parent'=>'0') );?>
                    <?php if( $terms ): ?>
                    <?php foreach( $terms as $term ): ?>
                    <span><?php echo esc_html( $term->name ); ?></span>
                    <?php endforeach; ?><?php endif; ?>
                </div>
                <div id="map"></div>
                <script>
                // TO MAKE THE MAP APPEAR YOU MUST
                // ADD YOUR ACCESS TOKEN FROM
                // https://account.mapbox.com
                mapboxgl.accessToken =
                    'pk.eyJ1IjoiYW5keXBhZGRvY2siLCJhIjoiY2tjb3JnYXo3MGg3aTJ1bGQ3Z3hsY3RkaCJ9.Nuw5WXsnHTCDJhtjXzryUw';
                const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/streets-v11', // style URL
                    center: [<?php 
$centreLocation = get_sub_field('center_position');?>
                        <?php echo esc_attr($centreLocation['lng']); ?>,
                        <?php echo esc_attr($centreLocation['lat']); ?>
                    ], // starting position [lng, lat]
                    zoom: <?php the_sub_field('map_zoom_level');?>
                });
                // Add zoom and rotation controls to the map.
                map.addControl(new mapboxgl.NavigationControl());
                map.on('idle', function() {
                    map.resize();
                })
                </script>
            </div>
            <?php elseif ($selectMedia == 'image'):?>

            <div class="map-image image fmleft">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                <div class="overlay-link">
                    <a href="<?php echo esc_url($image['url']); ?>">
                        <i class="fa-solid fa-location-dot"></i> View Map
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <div class="highlight-text">
                <?php
                if( have_rows('blocks') ):
                while ( have_rows('blocks') ) : the_row();?>
                <div class="text tile">
                    <?php if (get_sub_field('title')):?>
                    <h3 class="heading-tertiary"><?php the_sub_field('title');?></h3>
                    <?php endif;?>
                    <?php the_sub_field('text');?>
                </div>

                <?php endwhile; endif;?>
            </div>




        </div>
    </div>
</section>