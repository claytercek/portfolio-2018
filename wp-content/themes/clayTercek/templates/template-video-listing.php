<?php
/*
 * Template Name: Video Listing
 *
 * This template will display all of my portfolio pieces
 *
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
*/
$arg = [
  'post_type'     => 'Video',
  'post_status'   => 'publish'
];
$posts = new WP_Query($arg);
get_header(); ?>

	<div class="content">
		<main class="videos">
		<?php if ($posts->have_posts()) : ?>
				<?php while ($posts->have_posts()) : $posts->the_post(); ?>
				<article>
					<h2><?php the_title()?></h2>
					<div style="padding:56.25% 0 0 0;position:relative;">
					<iframe src="https://player.vimeo.com/video/<?php the_field('id');   ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
					<!-- <script src="https://player.vimeo.com/api/player.js"></script> -->
					<p><?php the_field('description');?></p>
				</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
		</main>
		<?php endif; ?>
	</div>

<script src="<?php echo get_template_directory_uri() ?>/static/js/portfolio.js"></script>
<?php get_footer(); ?>