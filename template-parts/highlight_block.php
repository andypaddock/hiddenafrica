<?php $bgColor = get_sub_field('bg_colour');?>
<section class="section-hightlightmap <?php if($bgColor == true): echo 'alt-bg'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row full">

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
                    'pk.eyJ1Ijoic2lsdmVybGVzcyIsImEiOiJjaXNibDlmM2gwMDB2Mm9tazV5YWRmZTVoIn0.ilTX0t72N3P3XbzGFhUKcg';
                var map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/silverless/cl2ysw1v0001g14qn6ytjdl64', // style URL
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
                <?php if( have_rows('camp_markers') ): ?>
                //HERE
                var size = 100;

                // implementation of CustomLayerInterface to draw a pulsing dot icon on the map
                // see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
                var pulsingDot = {
                    width: size,
                    height: size,
                    data: new Uint8Array(size * size * 4),

                    // get rendering context for the map canvas when layer is added to the map
                    onAdd: function() {
                        var canvas = document.createElement('canvas');
                        canvas.width = this.width;
                        canvas.height = this.height;
                        this.context = canvas.getContext('2d');
                    },

                    // called once before every frame where the icon will be used
                    render: function() {
                        var duration = 1000;
                        var t = (performance.now() % duration) / duration;

                        var radius = (size / 2) * 0.3;
                        var outerRadius = (size / 2) * 0.7 * t + radius;
                        var context = this.context;

                        // draw outer circle
                        context.clearRect(0, 0, this.width, this.height);
                        context.beginPath();
                        context.arc(
                            this.width / 2,
                            this.height / 2,
                            outerRadius,
                            0,
                            Math.PI * 2
                        );
                        context.fillStyle = 'rgba(1, 55, 32,' + (1 - t) + ')';
                        context.fill();

                        // draw inner circle
                        context.beginPath();
                        context.arc(
                            this.width / 2,
                            this.height / 2,
                            radius,
                            0,
                            Math.PI * 2
                        );
                        context.fillStyle = 'rgba(1, 50, 32, 1)';
                        context.strokeStyle = 'white';
                        context.lineWidth = 2 + 4 * (1 - t);
                        context.fill();
                        context.stroke();

                        // update this image's data with data from the canvas
                        this.data = context.getImageData(
                            0,
                            0,
                            this.width,
                            this.height
                        ).data;

                        // continuously repaint the map, resulting in the smooth animation of the dot
                        map.triggerRepaint();

                        // return `true` to let the map know that the image was updated
                        return true;
                    }
                };


                //HERE

                map.on('load', function() {

                    //HERE
                    map.addImage('pulsing-dot', pulsingDot, {
                        pixelRatio: 2
                    });

                    map.addSource('points', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': [
                                    
                                    <?php while( have_rows('camp_markers') ): the_row();?>
                                    <?php $campLocation = get_sub_field('camp_location');?> {'type': 'Feature',
                                    'geometry': {
                                        'type': 'Point',
                                        'coordinates': [
                                            <?php echo esc_attr($campLocation['lng']); ?>,
                                            <?php echo esc_attr($campLocation['lat']); ?>
                                        ]
                                    }
                                },
                                <?php endwhile; ?>
                               
                            ]
                        }
                    });



                    //HERE
                    map.addLayer({
                        'id': 'points',
                        'type': 'symbol',
                        'source': 'points',
                        'layout': {
                            'icon-image': 'pulsing-dot'
                        }
                    });
                });
                <?php endif; ?>
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