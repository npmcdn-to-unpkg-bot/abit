<?php
/*
Template name: Homepage
*/
get_header(); ?>

	<section id="homeslider">
		<div class="flickity">
			<?php if(get_field('slider')): while(has_sub_field('slider')): ?>
				<?php $image = get_sub_field('image');?>
				<div class="slide" style="background: url(<?php echo $image['sizes']['1800w'] ?>) 50% 25% no-repeat;">
					<?php $align_text = get_sub_field('align_text'); ?>
					<div class="wrap <?php echo $align_text ?>">
						<div class="text-box">
							<div class="text">
								<?php if (get_sub_field('title')): ?>
									<div class="title"><?php the_sub_field('title') ?></div>
								<?php endif; ?>
								<?php if (get_sub_field('blue_box')): ?>
									<div class="blue"><?php the_sub_field('blue_box') ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</section>

	<section class="section-one">
		<div class="wrap">
			<div class="one-half left">
				<div class="col">
					<?php if(get_field('section_one')): while(has_sub_field('section_one')): ?>
						<?php if (get_sub_field('section_tab')): ?>
							<div class="tab"><?php the_sub_field('section_tab') ?></div>
						<?php endif; ?>
						<?php if (get_sub_field('title')): ?>
							<h2><?php the_sub_field('title') ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('section_tab')): ?>
							<?php the_sub_field('content') ?>
						<?php endif; ?>
						<?php if (get_sub_field('pagelink')): ?>
							<a class="pagelink" href="<?php the_sub_field('pagelink') ?>"><?php the_sub_field('button_text') ?></a>
						<?php endif; ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
			<div class="one-half right">
				<div class="boy rellax" data-rellax-speed="1" data-aos="fade-up"></div>
			</div>
		</div>
	</section>

	<section class="section-two">
		<div class="wrap">
			<?php if(get_field('section_two')): while(has_sub_field('section_two')): ?>
				<?php if (get_sub_field('section_tab')): ?>
					<div class="tab"><?php the_sub_field('section_tab') ?></div>
				<?php endif; ?>
				<?php if (get_sub_field('title')): ?>
					<h2><?php the_sub_field('title') ?></h2>
				<?php endif; ?>
			<?php endwhile; endif; ?>
			<div class="product_categories">
				<?php echo do_shortcode('[product_categories number="10" parent="0"]'); ?>
			</div>

		</div>

	</section>
	<div class="popular-courses">
		<div class="wrap fullwidth">
			<h2>Popular Courses</h2>
			<?php echo do_shortcode('[best_selling_products per_page="3"]'); ?>
		</div>
	</div>

	<?php get_template_part( 'content', 'home_map' ); ?>

	<section class="quote-slider">
		<div class="wrap-quote">
			<?php wp_reset_query();
				query_posts(array(
					'post_type' => 'quote',
					'showposts' => 4
				) );
			?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="wrap">
				<?php if(get_field('quote')): while(has_sub_field('quote')): ?>
					<div class="slide">
						<?php $image = get_sub_field('profile_pic');?>
						<div class="profile" style="background: url(<?php echo $image['sizes']['800w'] ?>) center center no-repeat;"></div>
						<div class="quote">
							<div class="details">
								<span class="name"><?php the_sub_field('name') ?></span>
								<span class="loaction"><?php the_sub_field('location') ?></span>
								<span class="certificates"><?php the_sub_field('certificates') ?></span>
							</div>
							<?php the_sub_field('content') ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
		<a class="pagelink" href="<?php echo get_permalink(10) ?>">Read our student success stories</a>

	</section>

	<section class="news-feed">
		<div class="news-person"></div>
		<div class="wrap">
			<div class="feed">
				<?php if(get_field('section_four')): while(has_sub_field('section_four')): ?>
					<?php if (get_sub_field('section_tab')): ?>
						<div class="tab"><?php the_sub_field('section_tab') ?></div>
					<?php endif; ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query();
					query_posts(array(
						'post_type' => 'post',
						'showposts' => 4
					) );
				?>
				<?php while (have_posts()) : the_post(); ?>
					<?php $image = get_field('featured_image');?>
					<a href="<?php the_permalink(); ?>" class="post">
						<div class="post-thumbnail" style="background: url(<?php echo $image['sizes']['200w'] ?>) center center no-repeat;"></div>
						<div class="info">
							<div class="date"><?php echo get_the_date(); ?></div>
							<div class="title"><?php the_title(); ?></div>
						</div>
					</a>
				<?php endwhile; wp_reset_query(); ?>
				<a class="pagelink" href="<?php echo get_permalink(11) ?>">View all blog posts</a>
			</div>
			<div class="title-links">
				<?php if(get_field('section_four')): while(has_sub_field('section_four')): ?>
					<?php if (get_sub_field('intro_title')): ?>
						<div class="intro-title"><?php the_sub_field('intro_title') ?></div>
					<?php endif; ?>
					<?php if (get_sub_field('title')): ?>
						<div class="title"><?php the_sub_field('title') ?></div>
					<?php endif; ?>
					<?php if(get_sub_field('links')): while(has_sub_field('links')): ?>
						<a class="link" href="<?php the_sub_field('document_link') ?>"><?php the_sub_field('button_text') ?></a>
					<?php endwhile; endif; ?>
				<?php endwhile; endif; ?>
			</div>

		</div>
	</section>
	<section class="logos">
		<div class="wrap">
			<?php if(get_field('logos')): while(has_sub_field('logos')): ?>
				<?php if (get_sub_field('url')): ?>
					<a href="<?php the_sub_field('url') ?>">
				<?php endif; ?>
				<?php $image = get_sub_field('logo');?>
				<img src="<?php echo $image['sizes']['400w'] ?>" alt="<?php echo $image['alt'] ?>" class="fl-logo">
				<?php if (get_sub_field('url')): ?>
					</a>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</div>
	</section>

<?php get_footer(); ?>
