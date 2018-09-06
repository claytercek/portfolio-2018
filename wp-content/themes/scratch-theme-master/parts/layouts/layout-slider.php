<?php global $layout_count; ?>
<section id="scratch-layout-<?php echo $layout_count; ?>-id-<?php the_ID(); ?>"
         class="slider-row">
  <div class="wrap hpad clearfix">
    <?php if(get_sub_field('slides')) { ?>
      <div class="glide">
        <div class="glide__arrows">
          <button class="glide__arrow prev" data-glide-dir="<">
            <i class="ion-chevron-left"></i>
          </button>
          <button class="glide__arrow next" data-glide-dir=">">
            <i class="ion-chevron-right"></i>
          </button>
        </div>
        <div class="glide__wrapper">
          <ul class="glide__track">
            <?php while(has_sub_field('slides')) { ?>
              <li class="glide__slide"
                  style="background-image: url('<?php the_sub_field('background'); ?>');">
                <div class="overlay clearfix">
                  <div class="slide-text center valign-always">
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
              </li>
            <?php } ?>
          </ul>
        </div>
        <ul class="glide__bullets"></ul>
      </div>
    <?php } ?>
  </div>
</section>
