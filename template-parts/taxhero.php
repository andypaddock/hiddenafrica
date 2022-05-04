<?php 
$term = get_queried_object();

// vars
$heroSize = get_field('hero_section_size', $term);
$heroImage = get_field('hero_image', $term); 
?>

<div class="hero v50 imageoff-<?php the_field('image_offset');?> darkoverlay-<?php the_field('image_overlay');?>"
    style="background-image: url(<?php echo $heroImage['sizes'] ['hero-image']; ?>)">
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>

</div>