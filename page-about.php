<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if (is_single()) : ?>
		<h1 class="entry-title "><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf('Permalink to %s', the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; ?>
	</header>

	<div class="entry-entry clearfix">
		<div class="entry-content">
			<?php the_content('Read more'); ?>
		</div>
	</div>

	<h2 class="entry-title">The Geeks</h2>

	<?php
	$geeks = get_pages(array(
		'child_of' => $post->ID,
		'sort_column' => 'menu_order',
		'sort_order' => 'asc',
	));

	foreach($geeks as $geek) {
		$content = $geek->post_content;
		if(empty($content)) {
			// Don't bother with empty page content
			continue;
		}
		$content = apply_filters('the_content', $content);

		// Geek images, yay, saxay!
		$geek_image = get_the_post_thumbnail($geek->ID, 'full');

		// Custom fields should have the social media links
		$custom_fields = get_post_custom($geek->ID);
		$social_media_links = '';
		foreach($custom_fields as $field_name => $field_value) {
			// we currently only support these two? whaaaat?!
			if(in_array($field_name, array('twitter', 'instagram',))) {
				$social_media_links .= '<li><a class="link-' . $field_name . '" href="' . $field_value[0] . '" title="Follow ' . $geek->post_title . ' on ' . ucfirst($field_name) . '">';
				$social_media_links .= 'Follow ' . $geek->post_title . ' on ' . ucfirst($field_name) . '</a></li>';
			}
		}
	?>

	<div id="geek-<?php the_ID(); ?>" <?php post_class(array('the-geeks', 'clearfix', 'geek-' . $geek->post_name,)); ?>>
		<?php if (!empty($geek_image)) { ?>
			<div class="geek-image">
				<?php echo $geek_image; ?>
			</div>
		<?php } ?>
		<div class="geek-info">
			<h3><?php echo $geek->post_title; ?></h3>
			<?php echo $content; ?>
			<?php if(!empty($social_media_links)) { ?>
				<ul>
					<?php echo $social_media_links; ?>
				</ul>
			<?php } ?>
		</div>
	</div>

	<?php
	} // Closing div for the geek foreach loop
	?>
</article>

<?php endwhile; ?>
<?php get_footer(); ?>