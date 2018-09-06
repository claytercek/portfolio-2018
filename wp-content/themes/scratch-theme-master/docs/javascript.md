---
title: JavaScript
currentMenu: javascript
---

## Overview

### HTML5 Boilerplate

Scratch is built on the [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate). Here are the Javascript features that Scratch utilizes in full:

- HTML5 ready. Use the new elements with confidence.
- Designed with progressive enhancement in mind.
- Includes:
  - [jQuery](https://jquery.com/) via CDN, with a local fallback
  - A custom build of [Modernizr](https://modernizr.com/) for feature detection
- An optimized version of the Google Universal Analytics snippet.
- Protection against any stray `console` statements causing JavaScript errors in older browsers.
- Extensive inline and accompanying documentation.

---

## Modals via Magnific Popup

Scratch is bundled with [Magnific Popup](http://dimsemenov.com/plugins/magnific-popup/) for the best responsive modals in the biz. `main.js` includes several helper functions to make modal usage trivial.

### Image Link

This is what it would look like if you added the image via the WordPress content editor, and then added the class `.image-link` to its parent link in the advanced options. See [Inserting Images into Posts and Pages](http://codex.wordpress.org/Inserting_Images_into_Posts_and_Pages).

Basically all you need is an `<a>` tag with an `href` of the image source and a `class` of `.image-link`.

<div class="example image-link-example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div id="attachment_112" style="width: 310px" class="wp-caption aligncenter">
    <a class="image-link" href="https://unsplash.it/600/600/?image=0">
      <img class="wp-image-112 size-medium" src="https://unsplash.it/300/200/?image=0" alt="Click to view larger image" width="300" height="200">
    </a>
    <p class="wp-caption-text">
      Click to view larger image.
    </p>
  </div>
</div>

The code is generated automatically, but it should look like this:

```
<div id="attachment_112" style="width: 310px" class="wp-caption aligncenter">
  <a class="image-link" href="https://unsplash.it/600/600/?image=0">
    <img class="wp-image-112 size-medium" src="https://unsplash.it/300/200/?image=0" alt="Click to view larger image" width="300" height="200">
  </a>
  <p class="wp-caption-text">
    Click to view larger image.
  </p>
</div>
```

### Popup Link

Add class `.popup-link` to an `<a>` tag with an `href` that matches the target popup's `id`.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>
    <a href="#popup" class="button popup-link">Click</a>
  </p>
</div>
<div id="popup" class="white-popup mfp-hide">
  Popup content.
</div>

```
<p>
  <a href="#popup" class="button popup-link">Click</a>
</p>
```

### Iframe Link

Add class `.iframe-link` to an `<a>` tag with an `href` that is a YouTube or Vimeo video URL.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>
    <a href="https://www.youtube.com/watch?v=ndnjBq8ROpo" class="button iframe-link">Click</a>
  </p>
</div>

```
<p>
  <a href="https://www.youtube.com/watch?v=ndnjBq8ROpo" class="button iframe-link">Click</a>
</p>
```

### Use Magnific Popup Directly

Check out the [Magnific Popup API](http://dimsemenov.com/plugins/magnific-popup/documentation.html#api) if you need something more custom than what Scratch comes with.

---

## jQuery Waypoints

Scratch comes with [jQuery Waypoints](http://imakewebthings.com/waypoints/guides/jquery-zepto/). Scratch does not use this library by default, but it's a great utility, especially for sticky navs. This documentation page uses Waypoints to set its sticky nav:

```
jQuery(document).ready(function($) {
  if (!Modernizr.touch) {
    $('#docs-main').waypoint(function(dir) {
      if (dir === 'down') {
        $('#docs-nav').addClass('fixed').css('width', $('#sidebar').width());
      } else {
        $('#docs-nav').removeClass('fixed').css('width', 'auto');
      }
    });
  }
});
```

---

## Animations with Velocity.js

Scratch comes with [Velocity.js](http://velocityjs.org/), a JavaScript library for highly performant animations. `main.js` includes snippets for smooth "scroll-to" links and accordions, or "toggles" as we call them.

### Scroll Link

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>
    <a href="#scroll-here" class="button scroll-link-example">Click</a>
  </p>
  <div id="scroll-here" class="scratch-bg gray-bg">
    <div class="valign-always center">
      Scroll here.
    </div>
  </div>
</div>

```
<p>
  <a href="#scroll-here" class="button scroll-link">Click</a>
</p>
<div id="scroll-here" class="scratch-bg gray-bg">
  <div class="valign-always center">
    Scroll here.
  </div>
</div>
```

### Toggles

<div class="example toggles-example hpad clearfix">
  <small class="label uppercase">Example</small>
  <h5 class="toggle-heading"
      data-direction="down">
    Toggle Heading 1
  </h5>
  <div class="toggle-content">
    <p>Toggle content 1.</p>
  </div>
  <h5 class="toggle-heading"
      data-direction="down">
    Toggle Heading 2
  </h5>
  <div class="toggle-content">
    <p>Toggle content 2.</p>
  </div>
  <h5 class="toggle-heading"
      data-direction="down">
    Toggle Heading 3
  </h5>
  <div class="toggle-content">
    <p>Toggle content 3.</p>
  </div>
</div>

```
<h5 class="toggle-heading"
    data-direction="down">
  Toggle Heading 1
</h5>
<div class="toggle-content">
  <p>Toggle content 1.</p>
</div>
<h5 class="toggle-heading"
    data-direction="down">
  Toggle Heading 2
</h5>
<div class="toggle-content">
  <p>Toggle content 2.</p>
</div>
<h5 class="toggle-heading"
    data-direction="down">
  Toggle Heading 3
</h5>
<div class="toggle-content">
  <p>Toggle content 3.</p>
</div>
```

### Use Velocity.js Directly

> **Never** use jQuery's `$.animate()` and `$.fade()` functions. They slow everything else down, including other animation libraries. **Always** use Velocity's built-in solutions instead of rolling your own (or relying on jQuery): looping, reversing, delaying, hiding/showing elements, property math (+, -, \*, /), and hardware acceleration can all be done within Velocity.

Example usage:

```
jQuery(document).ready(function($) {
  $element.velocity("fadeIn", {
    duration: 1500
  }).velocity("fadeOut", {
    delay: 500,
    duration: 1500
  });
});
```

Check out [Velocity's excellent documentation](http://velocityjs.org/) for more info.

---

## Sliders via Glide.js

Scratch includes [Glide.js](http://glide.jedrzejchalubek.com/), a simple, responsive, and fast slider. Use a slider in your project:

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

```
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
```

Armed with the knowledge of [Glide.js's options](http://glide.jedrzejchalubek.com/docs.html#options), control the slider's configuration in `main.js`:

```
jQuery(document).ready(function($) {
  $('.glide').glide({
    autoplay: false
  });
});
```

---

**Next up:** [Advanced Custom Fields](/acf.html)
