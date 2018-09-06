<?php

/*
 * Template Name: Style Guide
 */

get_template_part('parts/header'); ?>

<header class="wrap hpad clearfix">
  <h1 class="center">Scratch Theme Style Guide</h1>
  <p class="center">To make visible changes to the Style Guide, you'll need to edit <a href="https://github.com/zackphilipps/scratch-theme/tree/master/assets/scss/config">the SCSS config files</a> and <a href="https://github.com/zackphilipps/scratch-theme/blob/master/page-style_guide.php">page-style_guide.php</a>. View <a href="http://scratchtheme.com">the Scratch Theme website</a> for further documentation.</p>
</header>

<main class="wrap hpad clearfix">

  <section>

    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>

    <p>I barely knew Philip, but as a clergyman I have no problem telling his most intimate friends all about him. Ok, we'll go deliver this crate like professionals, and then we'll go ride the bumper cars. Switzerland is small and neutral! We are more like Germany, ambitious and misunderstood! One hundred dollars. Say it in Russian! Who's brave enough to fly into something we all keep calling a death sphere?</p>

    <ul>

      <li>I've got to find a way to escape the <strong>horrible ravages of youth.</strong> Suddenly, I'm going to the bathroom like clockwork, every three hours. And those jerks at Social Security stopped sending me checks. Now I have to pay them!</li>
      <li>Kif, <em>I have mated with a woman.</em> Inform the men.</li>
    </ul>

    <blockquote>
      <p>Good man. Nixon's pro-war and pro-family. <strong>Son, as your lawyer,</strong> I declare y'all are in a <em>12-piece bucket o' trouble.</em> But I done struck you a deal: Five hours of community service cleanin' up that ol' mess you caused.</p>
    </blockquote>

  </section>

  <section class="clearfix">
    <h2 class="center">Colors</h2>
    <div class="threecol first scratch-bg black-bg">
      <div class="white center valign-always">Black</div>
    </div>
    <div class="threecol scratch-bg red-bg">
      <div class="white center valign-always">Red</div>
    </div>
    <div class="threecol scratch-bg orange-bg">
      <div class="white center valign-always">Orange</div>
    </div>
    <div class="threecol last scratch-bg yellow-bg">
      <div class="center valign-always">Yellow</div>
    </div>
  </section>
  <section class="clearfix">
    <div class="threecol first scratch-bg green-bg">
      <div class="white center valign-always">Green</div>
    </div>
    <div class="threecol scratch-bg blue-bg">
      <div class="white center valign-always">Blue</div>
    </div>
    <div class="threecol scratch-bg purple-bg">
      <div class="white center valign-always">Purple</div>
    </div>
    <div class="threecol last scratch-bg gray-bg">
      <div class="center valign-always">Gray</div>
    </div>
  </section>

  <section class="clearfix">
    <h2 class="center">Links</h2>
    <div class="sixcol first scratch-bg gray-bg">
      <div class="center valign-always"><a href="">Normal</a></div>
    </div>
    <div class="sixcol last scratch-bg gray-bg">
      <div class="center valign-always">
        <a href="" class="button">Button</a><br><br>
        <a href="" class="button black">Button</a>
      </div>
    </div>
  </section>

</main>

<?php get_template_part('parts/footer'); ?>
