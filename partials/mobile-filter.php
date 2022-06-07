<div class="mobile-filter">
    <div class="mobile-filter--nav">
        <div class="controls">
            <ul>
                <?php $all_categories = get_terms( array(
  'taxonomy' => $filterType,
  'hide_empty' => true,
) );?>
                <li>Filter</li>
                <li type="button" data-filter="all">All</li>
                <?php foreach($all_categories as $category): ?>
                <li type="button" data-filter=".<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="mobile-filter--button"><span id="mob-filter"><i class="fa-solid fa-filter"></i></span></div>

</div>