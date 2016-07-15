<?php if (is_search()) { $ID = 12; } ?>
<?php if(get_field('banner', $ID)): while(has_sub_field('banner', $ID)): ?>
    <?php $background = get_sub_field('image'); ?>
    <div class="banner" style="background: url(<?php echo $background['sizes']['1800w']; ?>) center center no-repeat;">
        <div class="overlay">
            <h1><?php the_sub_field('white_text'); ?> <strong><?php the_sub_field('white_bold'); ?> <span class="blue"><?php the_sub_field('blue_text'); ?></span></strong></h1>
        </div>
    </div>
<?php endwhile; endif; ?>

<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div class="breadcrumbs"><div class="wrap">','</div></div>');} ?>
