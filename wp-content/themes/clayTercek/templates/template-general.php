<?php /* Template Name: Example Template */
get_header(); ?>
	<div class="content">
		<main>
			<?php if (have_posts()): ?>
				<article class="post">   
					<?php // TO SHOW THE PAGE CONTENTS?>
					<?php while (have_posts()) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
					<?php the_content(); ?> <!-- Page Content (WYSIWYG Field) -->
					<?php endwhile; //resetting the page loop?>
					<?php wp_reset_query(); //resetting the page query?>
				</article>
				<?php else: ?>
				<h2>Sorry, No Post Found</h2>
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>