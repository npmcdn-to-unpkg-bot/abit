<?php
/*
Template name: About
 */
get_header(); ?>

	<section class="content">

		<?php get_template_part( 'content', 'banner' ); ?>

		<div class="wrap center">
			<?php if (get_field('black_tab')): ?>
				<div class="tab">
				<?php the_field('black_tab'); ?>
				</div>
			<?php endif; ?>

			<?php if (get_field('extended_title')): ?>
				<h2><?php the_field('extended_title'); ?></h2>
			<?php endif; ?>
		</div>

		<section class="about-top">
			<div class="two-col wrap">
				<div class="one-half">
					<?php if (get_field('intro')): ?>
						<blockquote>
							<p><?php the_field('intro'); ?></p>
						</blockquote>
					<?php endif; ?>
				</div>
				<div class="one-half">
					<?php if (get_field('content')): ?>
						<?php the_field('content'); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="wide-wrap">
				<?php if (get_field('quote_image')): ?>
					<?php $background = get_field('quote_image'); ?>
				    <div data-aos="fade-right" class="quote-image" style="background: url(<?php echo $background['sizes']['1800w']; ?>) center center no-repeat;"></div>
				<?php endif; ?>
				<?php if(get_field('quote')): while(has_sub_field('quote')): ?>
					<div data-aos="fade-left" class="quote-box">
						<blockquote>
							<p><?php the_sub_field('content'); ?></p>
							<?php if( get_sub_field('name') ): ?>
								<small><span class="position"><?php the_sub_field('position'); ?> / </span> <span class="name"><?php the_sub_field('name'); ?></span></small>
							<?php endif; ?>
						</blockquote>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</section>
		<section class="team">
			<div class="wrap">
				<h2 class="center-title">
					<?php if(get_field('team_title')): while(has_sub_field('team_title')): ?>
						<?php if( get_sub_field('grey') ): ?>
							<?php the_sub_field('grey'); ?>
						<?php endif; ?>
						<?php if( get_sub_field('blue') ): ?>
							<span class="blue"><?php the_sub_field('blue'); ?></span>
						<?php endif; ?>
					<?php endwhile; endif; ?>
				</h2>

				<blockquote>
					<p><?php the_field('team_intro'); ?></p>
				</blockquote>

				<div class="team-controler">
					<a href="javascript:void(0)" class="trainer active">Our Trainers</a><a href="javascript:void(0)" class="executive">Our Executive Team</a><a href="javascript:void(0)" class="board">Our Board</a>
				</div>
				<div id="team-slider">
					<div id="trainer" class="team-content">
						<?php
							wp_reset_query();
							query_posts(
								array(
								'post_type' => 'team',
								'team_tax' => 'trainer',
								'showposts' => -1
								)
							);
						?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="one-third team-member">
								<div class="title"><?php the_title(); ?></div>
								<?php if (get_field('course')): ?>
									<div class="course"><?php the_field('course'); ?> - <?php the_field('location'); ?></div>
								<?php endif; ?>
								<?php if (get_field('bio')): ?>
									<div class="bio"><?php the_field('bio'); ?></div>
								<?php endif; ?>
								<?php if (get_field('quote')): ?>
									<div class="quote">&quot;<?php the_field('quote'); ?>&quot;</div>
								<?php endif; ?>
							</div>
						<?php endwhile; wp_reset_query(); ?>

					</div>
					<div id="executive" class="team-content">
						<?php
							wp_reset_query();
							query_posts(
								array(
								'post_type' => 'team',
								'team_tax' => 'executive',
								'showposts' => -1
								)
							);
						?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="one-half team-member">
								<div class="title"><?php the_title(); ?></div>
								<?php if (get_field('course')): ?>
									<div class="course"><?php the_field('course'); ?> - <?php the_field('location'); ?></div>
								<?php endif; ?>
								<?php if (get_field('bio')): ?>
									<div class="bio"><?php the_field('bio'); ?></div>
								<?php endif; ?>
								<?php if (get_field('quote')): ?>
									<div class="quote">&quot;<?php the_field('quote'); ?>&quot;</div>
								<?php endif; ?>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
					<div id="board" class="team-content">
						<?php
							wp_reset_query();
							query_posts(
								array(
								'post_type' => 'team',
								'team_tax' => 'board',
								'showposts' => -1
								)
							);
						?>
						<?php while (have_posts()) : the_post(); ?>
							<div class="one-half team-member">
								<div class="title"><?php the_title(); ?></div>
								<?php if (get_field('course')): ?>
									<div class="course"><?php the_field('course'); ?> - <?php the_field('location'); ?></div>
								<?php endif; ?>
								<?php if (get_field('bio')): ?>
									<div class="bio"><?php the_field('bio'); ?></div>
								<?php endif; ?>
								<?php if (get_field('quote')): ?>
									<div class="quote">&quot;<?php the_field('quote'); ?>&quot;</div>
								<?php endif; ?>
							</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
				</div>
			</div>
			<div class="team-base"></div>
		</section>

		<section class="accreditation">
			<div class="wrap">
				<?php if (get_field('accreditation_tab')): ?>
					<div class="tab">
						<?php the_field('accreditation_tab'); ?>
					</div>
				<?php endif; ?>
				<blockquote>
					<p><?php the_field('accreditation_intro'); ?></p>
				</blockquote>
			</div>
		</section>
		<section class="logos">
			<div class="wrap">
				<?php if(get_field('accreditation_logos')): while(has_sub_field('accreditation_logos')): ?>
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

		<?php get_template_part( 'content', 'footer_banner' ); ?>

		<?php get_template_part( 'content', 'home_map' ); ?>


	</section>


<?php get_footer(); ?>
