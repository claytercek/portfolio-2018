<?php /* Template Name: Experience Listing */


// args
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'experience',
);

// query
$the_query = new WP_Query( $args );


get_header(); ?>
<div class="content">
	<main class="experience">
		<?php if( $the_query->have_posts() ): ?>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<a class="experienceItem" href="<?php the_field('url'); ?>">
					<div class="dot"></div>
					<div class="text">
						<h3><span><?php the_field('company'); ?></span> <?php the_field('title'); ?></h3>
						<h4><?php the_field('start_date'); ?> - <?php the_field('end_date'); ?></h4>
						<?php the_field('description'); ?>
					</div>
				</a>
			<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	</main>
</div>
<?php get_footer(); ?>