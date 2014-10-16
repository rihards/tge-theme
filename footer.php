	<footer>
		<h4 id="footer-logo">
			<a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		</h4>
		<div class="footer-info">
			<div class="footer-inner clearfix">
				<?php
				$footer_posts = get_pages(array(
					'post_type' => 'footer_posts',
					'sort_column' => 'menu_order',
					'sort_order' => 'asc',
				));
				foreach($footer_posts as $footer_post) {
					$content = $footer_post->post_content;
					if(empty($content)) {
						// Don't bother with empty page content
						continue;
					}
					$content = apply_filters('the_content', $content);
				?>

					<div class="footer-column">
						<h3><?php echo $footer_post->post_title; ?></h3>
						<?php echo $content; ?>
					</div>

				<?php
				} // Closing div for the footer post foreach loop
				?>
			</div>
		</div>
		<div class="footer-follow">
			<h3><?php _e('Follow us', 'tge-theme'); ?></h3>
			<?php
			// The social media links are in a custom menu
			wp_nav_menu(array(
				'theme-location' => 'social-media',
				'menu' => 'social-menu',
				'container' => false,
				'menu_class' => 'social-media-footer',
			));
			?>
		</div>
		<p class="footer-copyright">Copyright &copy; <?php echo date('Y'); ?> The Giant Eye. All article content &copy; of their respective owners.</p>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>