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

	<div class="entry-entry the-geeks geek-mark clearfix">
		<div class="geek-image">
			<img src="<?php echo bloginfo('template_directory'); ?>/images/geek-mark.jpg" alt="Mark" title="Mark Dormand">
		</div>
		<div class="geek-info">
			<h3>Mark Dormand</h3>
			<p>Graphic designer, amateur potter and writing dabblerist. Based in Manchester, he runs a small studio named <a href="http://studiosquid.co.uk/" title="Squid">Squid</a> and is obsessed with LEGO and dinosaurs.</p>
			<ul>
				<li><a class="link-twitter" href="#" title="Follow Mark Dormand on Twitter">Follow Mark Dormand on Twitter</a></li>
				<li><a class="link-instagram" href="#" title="Follow Mark Dormand on Instagram">Follow Mark Dormand on Instagram</a></li>
			</ul>
		</div>
	</div>
	<div class="entry-entry the-geeks geek-rihards clearfix">
		<div class="geek-image">
			<img src="<?php echo bloginfo('template_directory'); ?>/images/geek-rihards.jpg" alt="Rihards" title="Rihards Steinbergs">
		</div>
		<div class="geek-info">
			<h3>Rihards Steinbergs</h3>
			<p>Web developer and gamer geek. Living in Helsinki and works for Exove. An unhealthy interest in meat products, beer and games. He also made Mark write this.</p>
			<ul>
				<li><a class="link-twitter" href="#" title="Follow Rihards Steinbergs on Twitter">Follow Rihards Steinbergs on Twitter</a></li>
			</ul>
		</div>
	</div>
	<div class="entry-entry the-geeks geek-jason clearfix">
		<div class="geek-image">
			<img src="<?php echo bloginfo('template_directory'); ?>/images/geek-jason.jpg" alt="Jason" title="Jason Millward">
		</div>
		<div class="geek-info">
			<h3>Jason Millward</h3>
			<p>Computer man, Oxford resident, Homeworld addict. On and off again EVE sufferer. Rehabilitated angry forum admin. Write this yourself.</p>
		</div>
	</div>
	<div class="entry-entry the-geeks geek-james clearfix">
		<div class="geek-image">
			<img src="<?php echo bloginfo('template_directory'); ?>/images/geek-james.jpg" alt="James" title="James Czajka">
		</div>
		<div class="geek-info">
			<h3>James Czajka</h3>
			<p>Computer man, Oxford resident, Homeworld addict... It’s like you’re clones. And this was the most normal picture I could find of you. Srsly.</p>
		</div>
	</div>
</article>

<?php endwhile; ?>
<?php get_footer(); ?>