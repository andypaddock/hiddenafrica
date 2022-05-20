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
                    <?php $campLocation = get_sub_field('camp_location');?> {
                        'type': 'Feature',
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [
                                <?php echo esc_attr($campLocation['lng']); ?>,
                                <?php echo esc_attr($campLocation['lat']); ?>
                            ]
                        },
                        <?php if( get_sub_field('marker_title') ): ?>
                        properties: {
                            title: '<?php the_sub_field('marker_title'); ?>',
                        }
                        <?php endif; ?>

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
                'icon-image': 'pulsing-dot',
                'text-field': ['get', 'title'],
                'text-font': [
                    'Lato Regular',
                    'Arial Unicode MS Bold'
                ],
                'text-offset': [0, 1.25],
                'text-anchor': 'top'
            }
        });

    });
    <?php endif; ?>
    </script>
</div>
<style>
.mapboxgl-popup {
    max-width: 200px;
}

.mapboxgl-popup-content {
    text-align: center;
    font-family: 'Open Sans', sans-serif;
}
</style>