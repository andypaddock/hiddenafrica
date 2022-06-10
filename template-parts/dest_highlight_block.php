<?php $term = get_queried_object();
if( have_rows('blocks', $term) ): ?>

<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-hightlightmap <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php $image = get_field('destination_map', $term);
                $rowReverse = get_field('reverse_layout', $term);
                $selectMedia = get_field('image_or_map', $term); ?>
        <div class="map-item">
            <?php if ($selectMedia == 'map'): ?>
            <div class="map-box">
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
$centreLocation = get_field('center_position', $term);?>
                        <?php echo esc_attr($centreLocation['lng']); ?>,
                        <?php echo esc_attr($centreLocation['lat']); ?>
                    ], // starting position [lng, lat]
                    zoom: <?php the_field('map_zoom_level', $term);?>
                });
                // Add zoom and rotation controls to the map.
                map.addControl(new mapboxgl.NavigationControl());
                map.on('idle', function() {
                    map.resize();
                })
                </script>
            </div>
            <?php elseif ($selectMedia == 'image'):?>

            <div class="map-image image fmleft"
                style="background-image: url(<?php echo esc_url($image['sizes']['large']); ?>)">
                <a data-fslightbox="map" href="<?php echo esc_url($image['url']); ?>">
                    <div class="overlay-link">
                        <span class="map-link"><i class="fa-solid fa-location-dot"></i> View Map</span>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <div class="highlight-text">
                <?php
                if( have_rows('blocks', $term) ):
                while ( have_rows('blocks', $term) ) : the_row();?>
                <div class="text tile">
                    <?php if (get_sub_field('title', $term)):?>
                    <h3 class="heading-tertiary"><?php the_sub_field('title');?></h3>
                    <?php endif;?>
                    <?php the_sub_field('text', $term);?>
                </div>

                <?php endwhile; endif;?>
            </div>




        </div>
    </div>
</section>
<?php endif; ?>