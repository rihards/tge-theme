<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">
	<div class="header">
		<nav class="navigation desktop-navigation">
			<ul>
				<li id="tge-about"><a href="<?php $url = site_url('/about/'); echo $url; ?>">About</a></li>
				<li id="tge-forum"><a href="<?php $url = site_url('/forum/'); echo $url; ?>">Forum</a></li>
				<li id="tge-home"><a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></li>
				<li id="tge-filter"><a href="#">Filter</a></li>
				<li id="tge-night"><a href="#">Night</a></li>
			</ul>
		</nav>
		<nav id="filter"<?php if(!empty($_GET['tag'])) { echo ' style="display: block;"'; } ?>>
			<?php
			# Current tags
			$current_tags = array();
			if(isset($_GET['tag'])) {
				$current_tags = explode(' ', $_GET['tag']);
			}

			# List all the tags
			$tags = get_tags();
			$html = '<ul>';
			foreach($tags as $tag) {
				$active = '';
				if(in_array($tag->slug, $current_tags)) {
					$active = ' tag-selected';
				}
				$html .= '<li><a href="';

				# If we already have tags, then we add
				if(!empty($_GET['tag'])) {
					# Are we adding or removing the tag?
					if(!empty($active)) {
						# Do we only have one tag selected?
						if(count($current_tags) == 1) {
							$html .= site_url();
						}
						else {
							$new_tags = $current_tags;
							$active_key = array_search($tag->slug, $new_tags);
							unset($new_tags[$active_key]);
							$new_url = implode('+', $new_tags);
							$html .= site_url() . '/?tag=' . $new_url;
						}
					}
					else {
						$html .= $_SERVER['REQUEST_URI'] . '+' . $tag->slug;
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