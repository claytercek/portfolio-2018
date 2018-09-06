---
title: CSS
currentMenu: css
---

## Overview

### HTML5 Boilerplate

Scratch is built on the [HTML5 Boilerplate](https://github.com/h5bp/html5-boilerplate). Here are the CSS features that Scratch utilizes in full:

- HTML5 ready. Use the new elements with confidence.
- Designed with progressive enhancement in mind.
- [Normalize.css](https://necolas.github.com/normalize.css/) for CSS normalizations and common bug fixes
- A custom build of [Modernizr](https://modernizr.com/) for feature detection
- Useful CSS helper classes.
- Default print styles, performance optimized.

### Typography Overview

Scratch makes use of the excellent [Gutenberg](http://matejlatin.github.io/Gutenberg/) framework for responsive typography with the proper vertical rhythm. The configuration for this framework can be controlled within `config/_variables.scss` and `config/_global.scss`:

```
scratch-theme/
├── assets/
│   └── scss/
│   │   ├── config/
│   │   │   ├── _global.scss
│   │   │   └── _variables.scss
```

### Containers Overview

Scratch includes a few full-width containers, found in `config/_global.scss`, with various max-widths. Here they are:

```
.wrap {
  max-width: 1024px;
}

.contain {
  max-width: 700px;
}

.constrain {
  max-width: 450px;
}
```

Use them in your project:

```
<div class="wrap clearfix">
  ...
</div>
```

---

## Ionicons Overview

Scratch comes bundled with an icon font called [Ionicons](http://ionicons.com/). Use them in your project:

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>
    <i class="ion-checkmark-circled"></i>
  </p>
</div>

```
<i class="ion-checkmark-circled"></i>
```

---

## Autoprefixer

Before your stylesheets are created for the browser, regardless of whether you choose to use Grunt or Gulp, Scratch runs them through [Autoprefixer](https://github.com/postcss/autoprefixer). This means you can keep your CSS free of vendor prefixes, and let Autoprefixer add the ones that are necessary. Hooray for slimming down our code _as well as_ the output!

---

## Grid System

### Introduction

Scratch includes the simple & lightweight responsive 12-column grid system from [Bones](http://themble.com/bones/). Here's how it works:

- Column classes are `.onecol` through `.twelvecol`
- Scratch includes a bonus five-column layout accessible through the class `.twoptfourcol`
  - (think 12 divided by 5)
- Columns must add up to 12 and be wrapped in an element with class `.clearfix`
  - (this ensures all floats are cleared, and that the row as a whole has a proper height)
- The first column in a row must have class `.first`
- The last column in a row must have class `.last`
- Columns will stack on top of each other at full width until the breakpoint defined in `master.scss` is reached

### Examples

<div class="clearfix">
  <div class="fourcol scratch-bg gray-bg first"></div>
  <div class="fourcol scratch-bg gray-bg"></div>
  <div class="fourcol scratch-bg gray-bg last"></div>
</div>
<div class="clearfix">
  <div class="twoptfourcol scratch-bg gray-bg first"></div>
  <div class="twoptfourcol scratch-bg gray-bg"></div>
  <div class="twoptfourcol scratch-bg gray-bg"></div>
  <div class="twoptfourcol scratch-bg gray-bg"></div>
  <div class="twoptfourcol scratch-bg gray-bg last"></div>
</div>
<div class="clearfix">
  <div class="eightcol scratch-bg gray-bg first"></div>
  <div class="fourcol scratch-bg gray-bg last"></div>
</div>

```
<div class="clearfix">
  <div class="fourcol first"></div>
  <div class="fourcol"></div>
  <div class="fourcol last"></div>
</div>
<div class="clearfix">
  <div class="twoptfourcol first"></div>
  <div class="twoptfourcol"></div>
  <div class="twoptfourcol"></div>
  <div class="twoptfourcol"></div>
  <div class="twoptfourcol last"></div>
</div>
<div class="clearfix">
  <div class="eightcol first"></div>
  <div class="fourcol last"></div>
</div>
```

### Grid Breakpoint and `grid-always`

Check `master.scss` for the breakpoint that defines when `config/_grid.scss` is imported. The default is `min-width: 767px`.

`config/_grid-always.scss` is always active. Here's how you use it:

<div class="clearfix">
  <div class="fourcol-always scratch-bg gray-bg first-always"></div>
  <div class="fourcol-always scratch-bg gray-bg"></div>
  <div class="fourcol-always scratch-bg gray-bg last-always"></div>
</div>

```
<div class="clearfix">
  <div class="fourcol-always first-always"></div>
  <div class="fourcol-always"></div>
  <div class="fourcol-always last-always"></div>
</div>
```

### Custom Columns

Also included in `config/_grid-always.scss` is a small grid system that starts as one column, and then gradually adds a column until desktop width is reached. Resize your browser window to see it in action:

<div class="clearfix">
  <div class="custom-col scratch-bg gray-bg"></div>
  <div class="custom-col even scratch-bg gray-bg"></div>
  <div class="custom-col three-last scratch-bg gray-bg"></div>
  <div class="custom-col even four-last scratch-bg gray-bg"></div>
</div>

```
<div class="clearfix">
  <div class="custom-col"></div>
  <div class="custom-col even"></div>
  <div class="custom-col three-last"></div>
  <div class="custom-col even four-last"></div>
</div>
```

---

## Typography

### Headings

All HTML headings, `<h1>` through `<h6>`, are available. `.h1` through `.h6` classes are also available, for when you want to match the font styling of a heading but keep your content structurally sound. Heading styles are controlled in `config/_global.scss`.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div class="h1">Heading 1</div>
  <div class="h2">Heading 2</div>
  <div class="h3">Heading 3</div>
  <div class="h4">Heading 4</div>
  <div class="h5">Heading 5</div>
  <div class="h6">Heading 6</div>
</div>

```
<h1>Heading 1</h1>
<h2>Heading 2</h2>
<h3>Heading 3</h3>
<h4>Heading 4</h4>
<h5>Heading 5</h5>
<h6>Heading 6</h6>
```

### Body Copy

Scratch's global default (desktop) `font-size` is **20px**, with a `line-height` of **1.625rem**. `line-height` is applied to all elements, while `font-size` is applied to `<html>`. You can change these values in `config/_variables.scss`:

```
// Base sizes
$base-font-size: 112.5; // In %. Also used for mobile. Number only, no units.
$base-font-size-desktop: 125; // In %. Used to calculate the desktop font size. Number only, no units.
$line-height: 1.5;
$line-height-desktop: 1.625;
$max-width: 35; // Number only, no units. Gets converted to REMs.
```

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

```
<p>
  ...
</p>
```

### Blockquotes

Scratch borrows some basic `blockquote` styles from [CSS-Tricks](https://css-tricks.com/snippets/css/simple-and-nice-blockquote-styling/). You can change these in `config/_global.scss`.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
  </blockquote>
</div>

```
<blockquote>
  <p>
    ...
  </p>
</blockquote>
```

---

## Buttons

Use the `.button` class on an `<a>` element. `<button>` and `<input>` elements have `.button` styles by default. In addition, `.acf-button` is set to match in case you want to use [front-end ACF forms.](https://www.advancedcustomfields.com/resources/create-a-front-end-form/) Control the styles in `config/_global.scss`.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p>
    <a href="#" class="button">Link</a>&nbsp;
    <button>Button</button>&nbsp;
    <input type="button" value="Input">&nbsp;
    <input type="submit" value="Submit">
  </p>
</div>

```
<a href="" class="button">Link</a>
<button>Button</button>
<input type="button" value="Input">
<input type="submit" value="Submit">
```

---

## Helper Classes

All of the styles for these classes can be edited in `config/_global.scss`.

### Uppercase Text

Use `.uppercase` to make any element's text be all caps.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p class="uppercase">
    Uppercase Text
  </p>
</div>

```
<p class="uppercase">
  ...
</p>
```

### Responsive Embeds

To make an oEmbed responsive, simply wrap it in `.embed-container`. The styles have been taken from [Embed Responsively](http://embedresponsively.com/).

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div class="embed-container">
    <iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" frameborder="0" allowfullscreen></iframe>
  </div>
</div>

```
<div class="embed-container">
  <iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" frameborder="0" allowfullscreen></iframe>
</div>
```

### Sensible Default Background Image

Use `.scratch-bg` to add `background-position: center center`, `background-repeat: no-repeat`, and `background-size: cover`  to an element.

<div class="example scratch-bg-example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div class="scratch-bg"></div>
</div>

```
<div class="scratch-bg"
     style="background-image: url('https://unsplash.it/600/600/?random');">
</div>
```

### Responsive Line Breaks

Use `br.mbr` to have a desktop-only line break. Use `br.brm` to have a mobile-only line break.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <h4>Lorem ipsum dolor sit amet<br class="mbr">consectetur adipisicing elit</h4>
  <h5>Lorem ipsum dolor sit amet<br class="brm">consectetur adipisicing elit</h5>
</div>

```
<h4>Lorem ipsum dolor sit amet<br class="mbr">consectetur adipisicing elit</h4>
<h5>Lorem ipsum dolor sit amet<br class="brm">consectetur adipisicing elit</h5>
```

### Horizontal Padding

Add **1rem** of padding to the sides of any element with class `hpad`.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <div class="hpad">
    <h4>This content is padded on the sides.</h4>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
  </div>
</div>

```
<div class="hpad">
  ...
</div>
```

### Text Alignment

Apply class `.left`, `.right`, or `.center` to align your text accordingly.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <p class="left">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  </p>
  <p class="center">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  </p>
  <p class="right">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  </p>
</div>

```
<p class="left">
  ...
</p>
<p class="center">
  ...
</p>
<p class="right">
  ...
</p>
```

### Float Alignment

Apply class `.alignleft`, `.alignright`, or `.aligncenter` to align any element accordingly. These styles will automatically be applied when you align elements via the WordPress content editor.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <img class="alignleft" src="https://unsplash.it/200/200/?random">
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <img class="aligncenter" src="https://unsplash.it/200/200/?random">
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <img class="alignright" src="https://unsplash.it/200/200/?random">
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
</div>

```
<img class="alignleft" src="https://unsplash.it/200/200/?random">
<p>
  ...
</p>
<img class="aligncenter" src="https://unsplash.it/200/200/?random">
<p>
  ...
</p>
<img class="alignright" src="https://unsplash.it/200/200/?random">
<p>
  ...
</p>
```

### Blink and Spin Animations

Apply class `.blink` or `.spin` for some snazzy sh*t.

<div class="example hpad clearfix">
  <small class="label uppercase">Example</small>
  <i class="ion-chevron-down blink"></i>
  <i class="ion-load-d"></i>
</div>

```
<i class="ion-chevron-down blink"></i>
<i class="ion-load-d"></i>
```

**Note:** You can `.spin` _most_ elements. For some reason, if you apply `.spin` directly to the `<i>` element with an Ionicons class, it doesn't work. But if you apply those styles to the `:before` pseudo-element it works. So here's the SCSS for this example:

```
.ion-load-d {
  &:before {
    @extend .spin;
  }
}
```

---

## Mixins

`config/_mixins.scss` houses all of the included mixins. These are for slightly more advanced users, so the docs here are a little sparse.

### Gutenberg

First, let's look at the mixins specific to [Gutenberg](http://matejlatin.github.io/Gutenberg/). They include `line-height`, `margin-top`, `margin-bottom`, `margin`, `padding`, and `padding-equal`. Here is how to use them properly:

```
@include margin(1);

@include m {
  $leading-rem: $leading-rem-desktop;
  @import 'config/mixins';
  @include margin(1);
}
```

`@include m` is the standard Gutenberg media query that can be altered by changing the `$max-width` variable in `config/_variables.scss`. By default, it compiles to:

```
@media (min-width: 40em) {
  ...
}
```

Global styles (`config/_global.scss`) are already using these mixins properly. You have the power to change them, so be responsible. There's a reason why it's a little verbose. Having the redundant media queries enables the mixins for mobile- or desktop-only use. If you need a use case, look no further than the desktop-only styles for `figure.alignleft, figure.alignright`:

```
figure.alignleft,
figure.alignright {
  @include m {
    $leading-rem: $leading-rem-desktop;
    @import 'config/mixins';
    max-width: #{0.5 * $max-width + 'rem'};
    @if $paragraph-indent == true {
      @include padding-equal(1);
      @include margin-bottom(0);
    } @else {
      @include padding(0, 1);
    }
  }
}
```


### Alignment

If you can't or don't want to use Flexbox for a particular section of a site, you might want to use these mixins. Alignment mixins include `halign`, `valign`, and `hvalign`:

```
/* CSS Horizontal Centering */
@mixin halign {
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}

/* CSS Vertical Centering */
@mixin valign {
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  margin-top: 0;
  margin-bottom: 0;
}

/* CSS Horizontal & Vertical Centering */
@mixin hvalign {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin-top: 0;
  margin-bottom: 0;
}
```

There are also helper classes, which include `.halign`, `.valign`, `.valign-always`, and `.hvalign`:

```
.halign {
  @include halign;
}

.valign {
  @include m {
    @include valign;
  }
}

.valign-always {
  @include valign;
}

.hvalign {
  @include hvalign;
}
```

The trick to using these is that the parent must compute to a non-percentage `height` OR be set to `position: absolute`. See [CSS Vertical Centering](https://davidwalsh.name/css-vertical-center) for more info:

> Finally, a few warnings: If you want to centralice a relative positioned element, its parent must have a height value, i.e., it won't work if said parent's height is set to auto. And of course, as most CSS3 features and properties, transforms don't work in IE 8 and earlier versions.

### Ionicons

`@include icons` compiles to:

```
.element {
  font-family: 'Ionicons';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  text-rendering: auto;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
```

This allows you to use the `:before` pseudo-element to add icons via CSS without the need to add an `<i>` tag to your markup. Like so:

```
.element:before {
  content: '\f120'; // .ion-checkmark-circled
}
```

See the [Ionicons Cheatsheet](http://ionicons.com/cheatsheet.html) for more info.

### Webkit Proof

If you have a complex structure of nested elements wrapped in `<a>` tags, you may notice some funny behaviors when you try to add a `:hover` effect (particularly when changing the `opacity` of an `<img>`). If you've fixed all the _other_ problems, `@include webkit-proof` fixes the rest:

```
.element {
  -webkit-backface-visibility: hidden;
  -webkit-transform-style: preserve-3d;
  -webkit-transform: rotateY(0deg);
  position: relative;
  overflow: hidden;
}
```

---

**Next up:** [JavaScript](/javascript.html)
