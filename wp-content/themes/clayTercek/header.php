<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=5APB6Mnx9n">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=5APB6Mnx9n">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=5APB6Mnx9n">
	<link rel="manifest" href="/site.webmanifest?v=5APB6Mnx9n">
	<link rel="mask-icon" href="/safari-pinned-tab.svg?v=5APB6Mnx9n" color="#f936b4">
	<link rel="shortcut icon" href="/favicon.ico?v=5APB6Mnx9n">
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="theme-color" content="#f936b4">
	<!-- end favicons -->

	<?php
	$title = "Clay Tercek";
	if (!is_front_page()){
		$title = "Clay Tercek | " . get_the_title();
	} if (is_post_type_archive()) {
		$title = "Clay Tercek | " . post_type_archive_title('',false);
	}
	?>
	<title><?php echo $title;?></title>
	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="bg"></div>
		<a id="logo" href="<?php echo get_home_url()  ?>">
			<h2>Clay Tercek</h2>
		</a>

		<?php
			$menuParameters = array(
				'container' => false,
				'depth' => 0,
				'theme_location' => 'main',
				'link_before' => '<h2>',
				'link_after' => '</h2>',
			);
			wp_nav_menu($menuParameters);
		?>

		<img class="menuIcon" src="<?php echo get_template_directory_uri() ?>/static/imgs/menuIcon.svg" alt="menu">

		<div id="overlay">
			<?php
				$menuParameters = array(
					'container' => false,
					'depth' => 0,
					'theme_location' => 'main',
					'link_before' => '<h2>',
					'link_after' => '</h2>',
				);
				wp_nav_menu($menuParameters);
			?>
		</div>
		<img class="closeIcon" src="<?php echo get_template_directory_uri() ?>/static/imgs/exitIcon.svg" alt="exit">
	</header>