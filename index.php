<?php get_header(); ?>

<?php get_template_part( 'content', 'blog_header' ); ?>
<section class="wrap-posts">
	<div class="wrap all-posts" id="content">
		<div class="grid-sizer"></div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<a href="<?php the_permalink(); ?>" class="one-quater article-post">
				<div class="thumbnail">
					<?php
						$image = get_field('featured_image');
						$image_src = wp_get_attachment_image_url( $image[id], '800w' );
						$image_srcset = wp_get_attachment_image_srcset( $image[id], '800w' );
					?>
					<img src="<?php echo esc_url( $image_src ); ?>"
						 srcset="<?php echo esc_attr( $image_srcset ); ?>"
						 sizes="(max-width: 800px) 100vw, 800px" alt="<?php echo $image[alt] ?>" width="100%">
				</div>
				<div class="info">
					<div class="tab black"><?php $category = get_the_category();
						echo $category[0]->cat_name; ?></div>
					<h3><?php the_title(); ?></h3>
				</div>
				<p class="date"><?php echo get_the_date(); ?></p>
			</a>
		<?php  endwhile; endif; ?>
	</div>
	<?php wp_pagenavi(); ?>
</section>

<?php get_template_part( 'content', 'blog_footer' ); ?>

<?php get_footer(); ?>
