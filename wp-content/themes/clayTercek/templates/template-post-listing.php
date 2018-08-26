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
$postAmount = 0;
$posts = new WP_Query($arg);
get_header(); ?>
<div class="content">
	<?php if ($posts->have_posts()) : ?>
		<main>
			<?php while ($posts->have_posts()) : $posts->the_post(); ?>
					<div class="work is-active">
						<div class="yellow"></div>
						<div class="pink"></div>
						<div class="imgWrapper">
							<?php the_post_thumbnail();?>
							<div class="animContainer"></div>
						</div>
						<div class="blue">
							<h3><?php the_title()?></h3>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
			<?php 
			$postAmount += 1;
			endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</main>
		<aside class="work-subnav">
			<?php for ($x = 1; $x <= $postAmount; $x++) { ?>
				<div class="link is-active">
					<span><?php echo $x ;?></span>
					<div class="bg"></div>
					<span><?php echo $postAmount ;?></span>
				</div>
			<?php } ?>
		</aside>
		<div class="nav-arrows">
			<img src="imgs/nav-up.svg" alt="up">
			<img src="imgs/nav-down.svg" alt="down">
		</div>
	<?php else : ?>
		<p>
			<?php echo 'Sorry, no posts matched your criteria.'; ?>
		</p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>