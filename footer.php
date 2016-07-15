	<footer>
		<section class="email-signup">
			<div class="wrap">
				<div class="one-half">
					<?php if(get_field('sign_up', option)): while(has_sub_field('sign_up', option)): ?>
						<?php if (get_sub_field('title')): ?>
							<h2><?php the_sub_field('title') ?></h2>
						<?php endif; ?>
						<?php if (get_sub_field('description')): ?>
							<p><?php the_sub_field('description') ?></p>
						<?php endif; ?>
					<?php endwhile; endif; ?>
				</div>
				<div class="one-half">
					<?php echo do_shortcode('[gravityform id="1" title="false" description="false" tabindex="555"]') ?>
				</div>
			</div>
		</section>
		<section class="footer-details">
			<div class="wrap">
				<div class="five-cols">
					<div class="one-fifth">
						<?php $logo = get_field('footer_logo', option); ?>
						<img src="<?php echo $logo['url'] ?>" alt="<?php bloginfo('name') ?>" width="50%" />
					</div>
					<div class="one-fifth">
						<h4>Quicklinks</h4>
						<?php wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'quicklinks', 'menu_id'=> 'quicklinks-nav', 'theme_location' => 'quicklinks' ) ); ?>
					</div>
					<div class="one-fifth">
						<h4>About</h4>
						<?php wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'about', 'menu_id'=> 'about-nav', 'theme_location' => 'about_footer' ) ); ?>
					</div>
					<div class="one-fifth">
						<h4>Legal</h4>
						<?php wp_nav_menu( array( 'container'=> false, 'menu_class'=> 'legal', 'menu_id'=> 'legal-nav', 'theme_location' => 'legal' ) ); ?>
					</div>
					<div class="one-fifth">
						<h4>Get Social</h4>
						<?php  if(get_field('facebook', option)): while(has_sub_field('facebook', option)): ?>

							<div class="social facebook pos-0" href="#">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								<div class="spacer">
									<div class="popup">
										<a href="<?php the_sub_field('nsw') ?>">NSW Facebook</a>
										<a href="<?php the_sub_field('qld') ?>">QLD Facebook</a>
									</div>
								</div>
							</div>
						<?php endwhile; endif; ?>

						<?php $i = 1; if(get_field('social', option)): while(has_sub_field('social', option)): ?>
							<?php if (get_sub_field('icon')): ?>
								<a class="social pos-<?php echo $i; ?>" href="<?php the_sub_field('url') ?>"><?php the_sub_field('icon') ?></a>
							<?php endif ?>
						<?php $i++; endwhile; endif; ?>
					</div>
				</div>

			</div>
		</section>

		<section class="copyright">
			<div class="wrap">

				<div class="copy-text">
					<p>
						<span>&copy;&nbsp;<?php echo date("Y"); echo " "; bloginfo('name'); echo "."; ?></span>
						<?php
							$footer_menu = array(
							  'container'       => false,
							  'echo'            => false,
							  'items_wrap'      => '%3$s',
							  'depth'           => 0,
							  'theme_location'	=> 'footer',
							);
						?>
						<?php echo strip_tags(wp_nav_menu( $footer_menu ), '<a>' ); ?>

					</p>
				</div>
			</div>
		</section>

	</footer>
	<?php wp_footer(); ?>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-577b5e71a3c92026"></script>
</body>
</html>
