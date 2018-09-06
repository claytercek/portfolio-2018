<?php get_template_part('parts/header'); the_post(); ?>

<main>

<p class="center">This is the single.php file</p>

  <section class="wrap hpad clearfix">

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>
             itemscope itemtype="http://schema.org/BlogPosting">

      <header>
        <h1 itemprop="headline">
          <?php the_title(); ?>
        </h1>
      </header>

      <div itemprop="articleBody">
        <?php the_content(); ?>
      </div>

    </article>

  </section>

</main>

<?php get_template_part('parts/footer'); ?>