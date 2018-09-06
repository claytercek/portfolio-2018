<footer id="footer"
        class="clearfix">
  <p class="center">
    &copy; <?php echo date( 'Y' ); ?>
    <?php bloginfo( 'name' ); ?>
  </p>
</footer>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php wp_footer(); ?>

<?php if(!is_preview()): ?>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
  ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<?php endif; ?>

</body>
</html>
