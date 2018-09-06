<?php global $layout_count; ?>
<section id="scratch-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="flexible-columns">
  <div class="wrap hpad clearfix center">
    <?php if( get_sub_field('header')): ?>
      <h2><?php the_sub_field('header'); ?></h2>
    <?php endif; ?>
    <?php the_sub_field('blurb'); ?>
    <?php
      $columns = get_sub_field('use_custom_columns') ? 'custom' : 4;
      $icon_or_image = get_sub_field('icon_or_image') === 'Icon' ? 'icon' : 'image';
      scratch_layout_declare(get_sub_field('columns'), $columns);
      while(has_sub_field('columns')):
        scratch_layout_start();
    ?>
      <?php if(get_sub_field('link')): ?>
        <a href="<?php the_sub_field('link'); ?>">
      <?php endif; ?>
        <?php if($icon_or_image === 'icon'): ?>
          <?php if(get_sub_field('icon')): ?>
            <div class="circle center">
              <i class="<?php the_sub_field('icon'); ?> valign-always"></i>
            </div>
          <?php endif; ?>
        <?php else: ?>
          <?php if(get_sub_field('image')): ?>
            <div class="scratch-bg circle"
                 style="background-image: url('<?php the_sub_field('image'); ?>');">
            </div>
          <?php endif; ?>
        <?php endif; ?>
        <?php if(get_sub_field('header')): ?>
          <h3><?php the_sub_field('header'); ?></h3>
        <?php endif; ?>
      <?php if(get_sub_field('link')): ?>
        </a>
      <?php endif; ?>
      <?php the_sub_field('blurb'); ?>
      <?php if(get_sub_field('link') && get_sub_field('link_text')): ?>
        <p>
          <a class="button"
             href="<?php the_sub_field('link'); ?>"
             title="<?php the_sub_field('link_text'); ?>">
            <?php the_sub_field('link_text'); ?>
          </a>
        </p>
      <?php endif; ?>
    <?php
        scratch_layout_end();
      endwhile;
    ?>
    <?php if(get_sub_field('cta_link') && get_sub_field('cta_text')): ?>
      <p>
        <a class="button"
           href="<?php the_sub_field('cta_link'); ?>"
           title="<?php the_sub_field('cta_text'); ?>">
          <?php the_sub_field('cta_text'); ?>
        </a>
      </p>
    <?php endif; ?>
  </div>
</section>
