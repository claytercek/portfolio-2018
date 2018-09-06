<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

<head>
  <meta charset="utf-8">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header id="header">
  <div class="wrap hpad clearfix">

    <a class="logo"
       href="<?php bloginfo('url'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/site-logo.svg" alt="<?php bloginfo('name'); ?>">
    </a>

    <span class="nav-toggle"
          data-direction="down">
      <i class="icon ion-navicon"></i>
    </span>

    <nav id="nav">
      <?php scratch_main_nav(); ?>
    </nav>

  </div>
</header>
