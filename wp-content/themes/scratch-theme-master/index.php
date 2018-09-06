<?php get_template_part('parts/header'); ?>

<main>

<p class="center">This is the index.php file</p>

  <section class="wrap hpad clearfix">

  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>
             itemscope itemtype="http://schema.org/BlogPosting">

      <header>
        <h2 itemprop="headline">
          <a href="<?php the_permalink(); ?>"
             title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
      </header>

      <div itemprop="articleBody">
        <?php the_content(); ?>
      </div>

    </article>

    <?php endwhile; else: ?>

      <p>No posts here.</p>

  <?php endif; ?>

  </section>

</main>

<?php get_template_part('parts/footer'); ?>