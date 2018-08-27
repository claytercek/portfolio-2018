<?php
/*
 * Template Name: Post Listing
 *
 * This template will display all of my portfolio pieces
 *
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
*/
$arg = [
  'post_type'     => 'post',
  'post_status'   => 'publish'
];
$posts = new WP_Query($arg);
get_header(); ?>

	<div class="content">
		<main class="portfolio">
		<?php if ($posts->have_posts()) : ?>
			<div class="text">
				<?php while ($posts->have_posts()) : $posts->the_post(); ?>
				<article>
					<a href="<?php the_permalink(); ?>"><?php the_title()?></a>
					<div class="imgWrapper">
						<?php the_post_thumbnail();?>
					</div>
				</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<div class="circle"></div>
			</div>
		</main>
		<?php endif; ?>
	</div>

<script src="<?php echo get_template_directory_uri() ?>/static/js/portfolio.js"></script>
<?php get_footer(); ?>