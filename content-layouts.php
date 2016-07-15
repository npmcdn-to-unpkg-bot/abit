	<?php if( have_rows('layouts') ): while ( have_rows('layouts') ) : the_row(); ?>
		<?php if( get_row_layout() == 'full_width' ): ?>
			<div class="fullwidth">
				<?php the_sub_field('content'); ?>
			</div>
		<?php elseif( get_row_layout() == 'two_columns' ): ?>
			<div class="two-col">
				<div class="one-half">
					<?php the_sub_field('left_content'); ?>
				</div>
				<div class="one-half">
					<?php the_sub_field('right_content'); ?>
				</div>
			</div>
		<?php elseif( get_row_layout() == 'galleries' ): ?>
			<div class="gallery-wrap">
			<?php if (get_sub_field('gallery_title')): ?>
				<div class="title">
					<?php the_sub_field('gallery_title'); ?>
				</div>
			<?php endif; ?>
				<div class="gallery-slider slider">

					<?php $i = 0; if(get_sub_field('gallery')): while(has_sub_field('gallery')): ?>
						<?php $attachment = get_sub_field('images');  ?>
						<img src="<?php echo $attachment['sizes']['680croped']; ?>" alt="<?php echo $attachment['alt']; ?>">
				    <?php $i++; endwhile; endif; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; endif; ?>
