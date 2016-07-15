<?php get_header(); ?>


<div id="barba-wrapper">
	<?php
		$next_post = get_next_post();
		$previous_post = get_previous_post();
	?>
	<div class="barba-container" data-prev="<?php echo get_permalink($previous_post->ID); ?>" data-next="<?php echo get_permalink($next_post->ID); ?>">

<section class="single-heros">
	<?php $image = get_field('featured_image', $next_post->ID);?>
	<div class="hero previous-post" style="background: url(<?php echo $image['sizes']['1800w'] ?>) center center no-repeat;"></div>
	<?php $image = get_field('featured_image');?>
	<div class="hero active" style="background: url(<?php echo $image['sizes']['1800w'] ?>) center center no-repeat;"></div>
	<?php $image = get_field('featured_image', $previous_post->ID);?>
	<div class="hero next-post" style="background: url(<?php echo $image['sizes']['1800w'] ?>) center center no-repeat;"></div>
	<?php if($next_post->ID) : ?>
		<a href="<?php echo get_permalink($next_post->ID); ?>" class="flickity-prev-next-button previous"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg></a>
	<?php endif; ?>
	<?php if($previous_post->ID) : ?>
	   <a href="<?php echo get_permalink($previous_post->ID); ?>" class="flickity-prev-next-button next"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path></svg></a>
	<?php endif; ?>
</section>

<section class="full-post content">
	<div class="wrap short">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<span class="tab"><?php $category = get_the_category();
				echo $category[0]->cat_name; ?></span>
			<span class="date"><?php echo get_the_date(); ?></span>
			<h1><?php the_title(); ?></h1>

			<div class="post">
				<?php the_content(); ?>
				<hr>
				<div class="post-footer">
					<?php
					echo get_the_tag_list('<div class="tags"><strong>Tags</strong> ',' ','</div>');
					?>

					<div class="share-this">
						<div class="addthis_toolbox prod" addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title();?>">
							<ul>
								<li>Share</li>
								<li><a class="addthis_button_facebook" href=""><i class="fa fa-facebook"></i></a></li>
								<li><a class="addthis_button_pinterest_share" href=""><i class="fa fa-pinterest"></i></a></li>
								<li><a class="addthis_button_twitter" href=""><i class="fa fa-twitter"></i></a></li>
								<li><a class="addthis_button_google_plusone_share" href=""><i class="fa fa-google-plus"></i></a></li>
								<li><a class="addthis_button_print" href=""><i class="fa fa-print"></i></a></li>
								<li><a class="" href="mailto:?subject=<?php bloginfo('name'); ?> <?php the_title(); ?>&body=<?php bloginfo('name'); ?> <?php the_title(); ?> Visit: <?php the_permalink(); ?>"><i class="fa fa-envelope"></i></a></li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<div class="post-nav">
			<a class="one-third left previous" href="<?php echo get_permalink($previous_post->ID); ?>"><?php if ($previous_post->ID) :?><span>&laquo;</span> Previous Post<?php endif; ?></a>
			<a class="one-third center" href="<?php echo get_permalink(11); ?>">Back to All</a>
			<a class="one-third right next" href="<?php echo get_permalink($next_post->ID); ?>"><?php if ($next_post->ID) :?>Next Post <span>&raquo;</span><?php endif; ?></a>
		</div>
	</div>
</section>

<section class="wrap-posts">
	<div class="wrap all-posts" id="content">
		<h3 class="also">You may also like</h3>
	<?php
	    $tags = wp_get_post_tags($post->ID);
	    $tag_ids = array();
	    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	    $args=array(
		    'tag__in' => $tag_ids,
		    'post__not_in' => array($post->ID),
		    'posts_per_page'=>4, // Number of related posts to display.
		    'caller_get_posts'=>1
	    );
    	$my_query = new wp_query( $args );
	?>
		<?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
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
		<?php endwhile; wp_reset_query(); ?>
	</div>
</section>

</div>
</div>

<?php get_footer(); ?>
