<?php 
get_header(); ?>

<div class="content">
	<main class="search">
		<div>
			<?php get_search_form(); ?>
		</div>
		<?php if ( have_posts() ) : ?>
			<div>
				<?php while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="result">
					<h3><?php the_title(); ?></h3>
					<h4><?php the_date(); ?></h4>
					<p><?php the_excerpt(); ?></p>
				</a>

				<?php endwhile; ?>
			</div>
			<div class="page">
				<?php if ( get_previous_posts_link() ) : ?>
					<?php previous_posts_link( __( '<img src="' . get_template_directory_uri() . '/static/imgs/ArrowLeft.svg" alt="ArrowLeft">', 'aj' ) ); ?>
				<?php endif; ?>
				<?php if (function_exists("pagination")) {
					pagination();
				}
				endif; ?>
				<?php if ( get_next_posts_link() ) : ?>
					<?php next_posts_link( __( '<img src="' . get_template_directory_uri() . '/static/imgs/ArrowRight.svg" alt="ArrowRight">', 'aj' ) ); ?>
				
			</div>
		<?php endif; ?>
	</main>
</div>
<?php get_footer(); ?>
