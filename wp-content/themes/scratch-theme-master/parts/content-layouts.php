<?php
if( have_rows('layout') ) {
  $GLOBALS['layout_count'] = 1; while ( have_rows('layout') ) { the_row();
    if( get_row_layout() === 'hero_unit' ) { ?>

      <?php get_template_part( 'parts/layouts/layout', 'hero_unit' ); ?>

    <?php
    } elseif( get_row_layout() === 'flexible_columns' ) {
    ?>

      <?php get_template_part( 'parts/layouts/layout', 'flexible_columns' ); ?>

    <?php
    } elseif( get_row_layout() === 'staggered_images_with_text' ) {
    ?>

      <?php get_template_part( 'parts/layouts/layout', 'staggered_images_with_text' ); ?>

    <?php
    } elseif( get_row_layout() === 'slider' ) {
    ?>

      <?php get_template_part( 'parts/layouts/layout', 'slider' ); ?>

    <?php
    } elseif( get_row_layout() === 'wysiwygs' ) {
    ?>

      <?php get_template_part( 'parts/layouts/layout', 'wysiwygs' ); ?>

    <?php
    }
    ?>

  <?php
    $GLOBALS['layout_count']++;
  }
  ?>

<?php
} else {
?>
  <p class="center">You haven't added any layouts yet. <?php edit_post_link('Add one now.'); ?></p>
<?php
}
?>
