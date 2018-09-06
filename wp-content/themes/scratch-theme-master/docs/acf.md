---
title: Advanced Custom Fields
currentMenu: acf
---

This section is meant to provide easy, paste-able snippets to get you quickly up and running with some Scratch + [Advanced Custom Fields](http://advancedcustomfields.com) awesomeness. You should purchase and install [ACF Pro](http://advancedcustomfields.com/pro), otherwise this section (aside from Layout Functions) will be pretty useless to you.

---

## Using Scratch's Layout Functions

Layout Functions are **awesome.** They're great for plugging posts within [The Loop](http://codex.wordpress.org/The_Loop) into a CSS grid, or plugging [ACF Repeater](http://www.advancedcustomfields.com/resources/field-types/repeater/) rows into a CSS grid. Let's call the space occupied by these posts and repeater rows _cells_.

Each row of _cells_ is automatically wrapped in a `div.clearfix`. A global counter keeps track of the rows and columns behind the scenes, and injects classes so you have tons of control when it comes to styling. For example, you can apply a style to `.row-3 .column-2`.

**Another cool thing:** Let's say you wanted a 4-column layout, but didn't have a number of _cells_ divisible by 4. By default, if you had 7 _cells_, Scratch would convert the layout in the second row to 3 columns instead of 4. Pretty sweet, right? You can't do that with plain ol' HTML.

Below are some examples of how to use these bad boys.

[The Loop](http://codex.wordpress.org/The_Loop) example:

```
<?php  
  $args = array(); // WP_Query arguments
  $posts = get_posts($args);
  scratch_layout_declare($posts, 4); // build to 4 columns and fill the remaining space with the number of cells left over
  foreach($posts as $post) {
    setup_postdata($post);
    scratch_layout_start();
?>
  ...
<?php  
    scratch_layout_end();
  }
  wp_reset_postdata();
?>
```

[ACF Repeater](http://www.advancedcustomfields.com/resources/field-types/repeater/) example:

```
<?php  
  $repeater = get_field('repeater');
  scratch_layout_declare($repeater, 4); // build to 4 columns and fill the remaining space with the number of cells left over
  while(has_sub_field('repeater')) {
    scratch_layout_start();
?>
  ...
<?php  
    scratch_layout_end();
  }
?>
```

If you had 7 _cells_ – _posts_ or _repeater rows_ – both of the above functions would compile to:

<div class="clearfix row-1">
  <div class="threecol first column-1 scratch-bg gray-bg">
  </div>
  <div class="threecol column-2 scratch-bg gray-bg">
  </div>
  <div class="threecol column-3 scratch-bg gray-bg">
  </div>
  <div class="threecol last column-4 scratch-bg gray-bg">
  </div>
</div>

<div class="clearfix row-2">
  <div class="fourcol first column-1 scratch-bg gray-bg">
  </div>
  <div class="fourcol column-2 scratch-bg gray-bg">
  </div>
  <div class="fourcol last column-3 scratch-bg gray-bg">
  </div>
</div>

```
<div class="clearfix row-1">
  <div class="threecol first column-1">
    ...
  </div> <!-- /.column-1 -->
  <div class="threecol column-2">
    ...
  </div> <!-- /.column-2 -->
  <div class="threecol column-3">
    ...
  </div> <!-- /.column-3 -->
  <div class="threecol last column-4">
    ...
  </div> <!-- /.column-4 -->
</div> <!-- /.row-1 -->

<div class="clearfix row-2">
  <div class="fourcol first column-1">
    ...
  </div> <!-- /.column-1 -->
  <div class="fourcol column-2">
    ...
  </div> <!-- /.column-2 -->
  <div class="fourcol last column-3">
    ...
  </div> <!-- /.column-3 -->
</div> <!-- /.row-2 -->
```

The full function to declare the layout looks like this (parameters below):

```
scratch_layout_declare($cells, $columns, $flex = true, $offset = null)
```

### Parameters

#### $cells

- (array) Any array

#### $columns

- (int) Number of columns to build to
- (string) custom (`.custom-col` from `config/_grid-always.scss` will be used)

#### $flex

- (bool) Whether or not to fill the space in the last row with the remaining _cells_

#### $offset

- (string) Offset to use, if any **\*Only applicable for 2 and 3 column layouts**
  - `1:2`
  - `2:1`
  - `1:1:2`
  - `1:2:1`
  - `2:1:1`

---

## Layouts Page Template

To play around with this, create a new page in WordPress and set its template to "Layouts." With Scratch, you can now add robust layouts on the fly, including sliders, hero units, flexible columns, and more. In addition, you have full control over `parts/layouts/layout-*.php` and `_layouts.scss` for customization.

![Scratch's Layouts in action](/assets/img/marketing-page.gif)

ACF does not currently support editing the field groups themselves, but as per [this post](http://www.advancedcustomfields.com/resources/local-json/), that feature should be in the roadmap.

**Update:** Editing the field groups from the Custom Fields screen is now possible through [synchronized JSON](http://www.advancedcustomfields.com/resources/synchronized-json/)!

---

## HTML5 Audio/Video

### Audio

Create a Text field called "Audio Attributes". Then, create 2 [File](http://www.advancedcustomfields.com/resources/field-types/file/) fields that return their URLs called "Audio MP4 File" and "Audio WAV File."

Paste this code into your template file:

```
<?php if(get_field('audio_file')): ?>
<audio class="scratch-audio"
       <?php the_field('audio_attributes'); ?>>
       <source src="<?php the_field('audio_wav_file'); ?>" type="audio/wav">
       <source src="<?php the_field('audio_mp4_file'); ?>" type="audio/mpeg">
  <p>Your browser does not support the audio element.</p>
</audio>
<?php endif; ?>
```

### Video

Create an [Image](http://www.advancedcustomfields.com/resources/field-types/image/) field that returns the URL called "Video Fallback Image", and a Text field called "Video Attributes". Then, create 2 [File](http://www.advancedcustomfields.com/resources/field-types/file/) fields that return their URLs called "Video MP4 File" and "Video WEBM File".

Paste this code into your template file:

```
<?php if(get_field('video_file')): ?>
  <?php if(wp_is_mobile()) { ?>
    <div class="scratch-video" style="background-image: url('<?php the_field('video_fallback_image'); ?>');">
    </div>
  <?php } else { ?>
    <video class="scratch-video"
           <?php the_field('video_attributes'); ?>
           poster="<?php the_field('video_fallback_image'); ?>"
           style="background-image: url('<?php the_field('video_fallback_image'); ?>');">
      <source src="<?php the_field('video_webm_file'); ?>" type="video/webm">
      <source src="<?php the_field('video_mp4_file'); ?>" type="video/mp4">
    </video>
  <?php } ?>
<?php endif; ?>
```

---

## Image Gallery via [Magnific Popup](/javascript.html#modals-via-magnific-popup)

Click the images to view popup.

<div class="example slider-example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div class="popup-gallery clearfix">
    <a href="https://unsplash.it/1800/1200?image=1" title="">
      <div class="custom-col odd three-first four-first scratch-bg" style="background-image: url('https://unsplash.it/1800/1200?image=1');">
      </div>
    </a>
    <a href="https://unsplash.it/1800/1200?image=2" title="">
      <div class="custom-col even scratch-bg" style="background-image: url('https://unsplash.it/1800/1200?image=2');">
      </div>
    </a>
    <a href="https://unsplash.it/1800/1200?image=3" title="">
      <div class="custom-col odd three-last scratch-bg" style="background-image: url('https://unsplash.it/1800/1200?image=3');">
      </div>
    </a>
    <a href="https://unsplash.it/1800/1200?image=4" title="">
      <div class="custom-col even three-first four-last scratch-bg" style="background-image: url('https://unsplash.it/1800/1200?image=4');">
      </div>
    </a>
  </div>
</div>

Create a [Gallery](http://www.advancedcustomfields.com/add-ons/gallery-field/) field named "Gallery".

Paste this code in your template file:

```
<?php $images = get_field('gallery'); ?>
<?php if($images): ?>
  <div class="popup-gallery clearfix">
    <?php $count = 1; ?>
    <?php foreach( $images as $image ): ?>
      <a href="<?php echo $image['url']; ?>"
         title="<?php echo $image['caption']; ?>">
        <div class="<?php echo custom_columns($count); ?> scratch-bg"
             style="background-image: url('<?php echo $image['url']; ?>');">
        </div>
      </a>
      <?php $count++; ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
```
---

## Slider via [Glide.js](/javascript.html#sliders-via-glidejs)

<div class="example slider-example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div id="Glide" class="glide">

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
        <li class="glide__slide"
            style="background-image: url('https://unsplash.it/1800/1200?image=1');">
        </li>
        <li class="glide__slide"
            style="background-image: url('https://unsplash.it/1800/1200?image=2');">
        </li>
        <li class="glide__slide"
            style="background-image: url('https://unsplash.it/1800/1200?image=3');">
        </li>
      </ul>
    </div>

    <div class="glide__bullets"></div>

  </div>
</div>

Create a [Repeater](http://www.advancedcustomfields.com/add-ons/repeater-field/) field named "Slides". Add an [Image](http://www.advancedcustomfields.com/resources/field-types/image/) sub-field named "Slide BG".

Paste this code in your template file:

```
<?php if(get_field('slides')) { ?>
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
              style="background-image: url('<?php the_sub_field('slide_bg'); ?>');">
            ...
          </li>
        <?php } ?>
      </ul>
    </div>
    <ul class="glide__bullets"></ul>
  </div>
<?php } ?>
```

---
