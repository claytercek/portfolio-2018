<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
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
				
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>
