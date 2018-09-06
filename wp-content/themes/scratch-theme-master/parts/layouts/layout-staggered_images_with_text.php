<?php global $layout_count; ?>
<section id="scratch-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="staggered">
  <?php
    if(get_sub_field('icon_or_image') === 'Icon') {
      $icon_or_image = 'icon';
    } else {
      $icon_or_image = 'image';
    }
  ?>
  <?php while(has_sub_field('rows')) { ?>
    <div class="row">
      <div class="wrap hpad clearfix">
        <div class="fivecol first">
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
        </div>
        <div class="sevencol last">
          <div class="content valign">
            <?php if(get_sub_field('header')): ?>
              <h3><?php the_sub_field('header'); ?></h3>
            <?php endif; ?>
            <?php the_sub_field('blurb'); ?>
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
        </div>
      </div>
    </div>
  <?php } ?>
</section>
