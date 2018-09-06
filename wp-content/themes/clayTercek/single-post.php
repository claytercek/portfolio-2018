<?php get_header(); ?>

<div class="content">
	<main class="single">
		
		<div class="mainInfo">
			<?php 
			if (has_post_thumbnail()) {
				the_post_thumbnail('large');
			} else {
				echo '<img src="https://placehold.it/576x448/f69/fff" alt="">' ;
			}?>
			<h1><?php the_title(); ?></h1>
			<div class="controls">
				<?php previous_post_link('%link', 'next project', FALSE); ?>
				<?php next_post_link('%link', 'previous project', FALSE); ?>
			</div>
			
		</div>

		<div class="bodyText">
			<h2>Challenge</h2>
			<?php the_field('challenge'); ?>
			<h2>Answer</h2>
			<?php the_field('answer'); ?>
			<ul>
				<li><h3>Deliverables:</h3> <?php the_field('deliverables'); ?></li>
				<li><h3>Date:</h3> <?php the_field('date'); ?></li>
				<?php if( have_rows('subtext') ):
					while ( have_rows('subtext') ) : the_row(); ?>
					<li><h3><?php the_sub_field('title'); ?>:</h3> <?php the_sub_field('content'); ?></li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>

			<div class="links">
				<a href="<?php the_field('url'); ?>" target="_blank">Launch Site</a>
				<?php if( get_field('code_url')): ?>
					<a href="<?php the_field('code_url'); ?>" target="_blank">View Code</a>
				<?php endif; ?>
			</div>
		</div>


	</main>
</div>

<?php get_footer(); ?>