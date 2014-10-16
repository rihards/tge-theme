<article id="post-<?php the_ID(); ?>" <?php post_class('post-number-' . $post_number . ' clearfix'); ?>>
	<header class="entry-header">
		<?php if (is_single()) : ?>
		<h1 class="entry-title "><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf('Permalink to %s', the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; ?>
	</header>
	<div class="post-thumbnail"><?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?></div>
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
			<?php the_content('Read more'); ?>
			<?php wp_link_pages(array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>')); ?>
		<?php endif; ?>
		</div>
	</div>
</article>
<div class="post-divider"></div>
<?php if(is_single()) { comments_template(); } ?>