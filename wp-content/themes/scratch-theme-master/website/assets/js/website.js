jQuery(document).ready(function($) {
  if (!Modernizr.touch) {
    $('#docs-main').waypoint(function(dir) {
      if (dir === 'down') {
        $('#docs-nav').addClass('fixed').css('width', $('#sidebar').width());
      } else {
        $('#docs-nav').removeClass('fixed').css('width', 'auto');
      }
    });
    $('.scroll-link-example').click(function(e) {
      e.preventDefault();
      $(this).blur();
      var string = $(this).attr('href').split('#')[1];
      $('#' + string)
        .velocity('scroll', { duration: 400 });
    });
    $('article hr:last-of-type').waypoint({
      handler: function(dir) {
        if (dir === 'down') {
          $('#docs-nav').velocity({ opacity: 0, translateY: '-1rem' }, { duration: 250 });
        } else {
          $('#docs-nav').velocity({ opacity: 1, translateY: 0 }, { duration: 250 });
        }
      },
      context: '#docs-nav',
      offset: $('#docs-nav').height()
    });
  }
});
