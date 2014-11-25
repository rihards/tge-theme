<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="icon" sizes="196x196" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">
	<div class="header">
		<div id="tge-mobile-logo" style="display: none;"><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>
		<nav class="navigation">
			<ul>
				<li id="nav-first"><a href="<?php echo site_url('/about/'); ?>"><?php _e('About', 'tge-theme'); ?></a></li>
				<li id="nav-second"><a href="#"><?php _e('Filter', 'tge-theme'); ?></a></li>
				<li id="tge-home"><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></li>
				<li id="nav-third"><a href="#"><?php _e('Search', 'tge-theme'); ?></a></li>
				<li id="nav-forth"><a href="/submit"><?php _e('Submit', 'tge-theme'); ?></a></li>
			</ul>
		</nav>
		<nav id="nav-search">
			<?php get_search_form(true); ?>
		</nav>
		<?php $selected_tags = get_query_var('tag'); ?>
		<nav id="filter"<?php if(!empty($selected_tags)) { echo ' style="display: block;"'; } ?>>
			<?php
			// Current tags
			$current_tags = array();
			if(!empty($selected_tags)) {
				$current_tags = explode('+', $selected_tags);
			}

			// List all the tags
			$tags = get_tags();
			$html = '<ul>';
			foreach($tags as $tag) {
				$active = '';
				if(in_array($tag->slug, $current_tags)) {
					$active = ' tag-selected';
				}
				$html .= '<li><a href="';

				// If we already have tags, then we add
				if(!empty($current_tags)) {
					// Are we adding or removing the tag?
					if(!empty($active)) {
						// Do we only have one tag selected?
						if(count($current_tags) == 1) {
							$html .= site_url();
						}
						else {
							$new_tags = $current_tags;
							$active_key = array_search($tag->slug, $new_tags);
							unset($new_tags[$active_key]);
							$html .= site_url('tag/' . implode('+', $new_tags));
						}
					}
					else {
						$new_tags = $current_tags;
						$new_tags[] = $tag->slug;
						$html .= site_url('tag/' . implode('+', $new_tags));
					}
				}
				else {
					$tag_link = get_tag_link($tag->term_id);
					$html .= $tag_link;
				}

				$html .= '" title="' . $tag->name . '" class="tag-' . $tag->slug . $active . '">';
				$html .= $tag->name . '</a></li>';
			}
			$html .= '</ul>';
			echo $html;
			?>
		</nav>
	</div>
	<div class="post-divider"></div>
