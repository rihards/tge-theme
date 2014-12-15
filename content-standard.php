<article id="post-<?php the_ID(); ?>" <?php post_class('post-number-' . $post_number . ' clearfix'); ?>>
	<header class="entry-header">
		<?php
		if(is_single()) {
			the_title('<h1 class="entry-title">', '</h1>');
		}
		else {
			the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>');
		}
		?>
	</header>
	<div class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		<?php endif; ?>
	</div>
	<div class="entry-entry">
		<div class="meta-info">
			<div class="author-and-date">
				<p><?php printf('by %s', get_the_author()); ?></p>
				<p><?php the_time(get_option('date_format')); ?></p>
			</div>
			<div class="entry-tags">
				<p><?php the_tags('',', '); ?></p>
			</div>
		</div>
		<div class="entry-content">
		<?php if (is_search()) : # Only display Excerpts for Search ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content(__('Read more', 'tge-theme')); ?>
			<?php wp_link_pages(array( 'before' => '<div class="page-links">' . __('Pages:', 'tge-theme'), 'after' => '</div>')); ?>
		<?php endif; ?>
		</div>
	</div>
</article>
<div class="post-divider"></div>
<?php if(is_single()) { comments_template(); } ?>