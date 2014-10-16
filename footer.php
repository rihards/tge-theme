	<footer>
		<h4 id="footer-logo">
			<a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		</h4>
		<div class="footer-info">
			<div class="footer-inner clearfix">
				<div class="footer-column">
					<h3>About</h3>
					<p>The Giant Eye is a geeky blog of things, updated sporadically.</p>
					<p><a href="#" class="footer-more">More</a></p>
				</div>
				<div class="footer-column">
					<h3>Submit</h3>
					<p>Show us stuff you love, things you think should get featured.</p>
					<p><a href="#" class="footer-more">Send us goodies</a></p>
				</div>
				<div class="footer-column">
					<h3>Join us</h3>
					<p>Want to contribute more directly? Write, post, share the awesome.</p>
					<p><a href="#" class="footer-more">Say hi</a></p>
				</div>
				<div class="footer-column">
					<h3>Site credits</h3>
					<p>Design by <a href="http://studiosquid.co.uk/">Squid</a><br> Development by <a href="http://rihards.com/">Rihards</a></p>
				</div>
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