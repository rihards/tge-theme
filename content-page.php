<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
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
	<div class="entry-content">
		<?php the_content('Read more'); ?>
	</div>
</article>