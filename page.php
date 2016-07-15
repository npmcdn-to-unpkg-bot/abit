<?php get_header(); ?>

<section class="content ">
	<?php if (is_woocommerce() || is_cart() || is_checkout() || is_account_page()) { $ID = 140; } ?>
	<?php if(get_field('banner', $ID)): while(has_sub_field('banner', $ID)): ?>
		<?php $background = get_sub_field('image'); ?>
		<div class="banner" style="background: url(<?php echo $background['sizes']['1800w']; ?>) center center no-repeat;">
			<div class="overlay">
				<h1><?php the_sub_field('white_text'); ?> <strong><?php the_sub_field('white_bold'); ?> <span class="blue"><?php the_sub_field('blue_text'); ?></span></strong></h1>
			</div>
		</div>
	<?php endwhile; endif; ?>


	<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div class="breadcrumbs"><div class="wrap">','</div></div>');} ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="wrap woopage">
			<?php if (get_field( "extended_title" )): ?>
				<h2><?php the_field( "extended_title" ) ?></h2>
			<?php else: ?>
				<h2><?php the_title() ?></h2>
			<?php endif; ?>

			<?php get_template_part( 'content', 'layouts' ); ?>

			<?php
			// Woocommerce pages
			if (is_woocommerce() || is_cart() || is_checkout() || is_account_page()): ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>
	<?php  endwhile; endif; ?>

</section>

<?php get_footer(); ?>
