<?php 
$term = get_queried_object();

// vars
$heroSize = get_field('hero_section_size', $term);
$heroImage = get_field('hero_image', $term); 
?>

<div class="hero v50 imageoff-<?php the_field('image_offset');?>"
    style="background-image: url(<?php echo $heroImage['url']; ?>)">


</div>