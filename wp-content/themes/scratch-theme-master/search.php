<?php get_template_part('parts/header'); ?>

<main itemscope itemtype="http://schema.org/SearchResultsPage">

<p class="center">
  <strong>Search results for:</strong>
  <?php echo esc_attr(get_search_query()); ?>
</p>

  <section class="wrap hpad clearfix">

  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

    <article id="post-<?php the_ID(); ?>"
             <?php post_class(); ?>>

      <header>
        <h2>
          <a href="<?php the_permalink(); ?>"
             title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>
      </header>

      <div itemprop="description">
        <?php the_content(); ?>
      </div>

    </article>

    <?php endwhile; else: ?>

      <p>No posts here.</p>

  <?php endif; ?>

  </section>

</main>

<?php get_template_part('parts/footer'); ?>