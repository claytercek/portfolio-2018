<?php
/*
Template Name: General with Sidebar
*/

get_header(); ?>


<!-- banner Page
    ==========================================-->
    <header class="entry-header" style="background-image: url(<?php echo get_template_directory_uri();?>/dist/img/s-1.jpg);">
    <div class="content  wow fadeInUp">
      <div class="container">
        <h1><?php the_title();?></h1>
    </div>
  </header>

<!--blog body-->
<div id="Blog-post">
  <div class="container">
    <div class="row"> 
      <!--blog posts container-->
      <div class="col-md-8 col-sm-12 single-post"> 
        
        <!--article-->

        <!--/article-->
        
        <div class="clearfix"></div>
        
        <!--portfolio page nav-->
        <nav class="navigation posts-navigation  wow fadeInUp"  role="navigation">
          <ul>
            <li >
              <div class="nav-previous"><a href="http://localhost/wordpress/page/2/"><i class="fa fa-chevron-left"></i></a></div>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li >
              <div class="nav-next"><a href="http://localhost/wordpress/page/2/"> <i class="fa fa-chevron-right"></i></a></div>
            </li>
          </ul>
        </nav><!--/portfolio page nav-->
      </div>
      <!--blog posts container--> 
      
      <!--aside-->
      <aside class="col-md-4 col-sm-12"> 
        <?php get_sidebar();?>
      </aside>
      <!--aside-->
      
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
