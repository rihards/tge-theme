<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php $post_number = 1; ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php
				$format = get_post_format();
				if($format === false) {
					if(is_page()) {
						$format = 'page';
					}
					else {
						$format = 'standard';
					}
				}
				include(locate_template('content-' . $format . '.php'));
				$post_number++;
			?>
		<?php endwhile; ?>
		<div class="navigate-search clearfix">
			<div class="navigate-left">
				<?php if(!is_singular() && !is_tag()) { echo '<span class="btn-inactive">' . get_previous_posts_link(__('Newer', 'tge-theme')) . '</span>'; } ?> &nbsp;
			</div>
			<div class="navigate-search-form"><?php //get_search_form(); ?></div>
			<div class="navigate-right">
				<?php if(!is_singular() && !is_tag()) { echo '<span class="btn-active">' . get_next_posts_link(__('Older', 'tge-theme')) . '</span>'; } ?> &nbsp;
			</div>
		</div>
	<?php else : ?>
		<article id="post-0" class="post no-results not-found clearfix">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e('Nothing found', 'tge-theme'); ?></h1>
			</header>
			<div class="entry-content">
				<p><?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'tge-theme'); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>
	<?php endif; ?>

<?php get_footer(); ?>
