<?php

/*
 * Template Name: Layouts
 */

get_template_part('parts/header'); the_post(); ?>

<main>

	<?php get_template_part('parts/content', 'layouts'); ?>

</main>

<?php get_template_part('parts/footer'); ?>
