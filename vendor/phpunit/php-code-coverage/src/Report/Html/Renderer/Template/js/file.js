<<<<<<< HEAD
  $(function() {
   var $window     = $(window)
     , $top_link   = $('#toplink')
     , $body       = $('body, html')
     , offset      = $('#code').offset().top
     , hidePopover = function ($target) {
        $target.data('popover-hover', false);

        setTimeout(function () {
         if (!$target.data('popover-hover')) {
          $target.popover('hide');
         }
        }, 300);
     };

   $top_link.hide().click(function(event) {
    event.preventDefault();
    $body.animate({scrollTop:0}, 800);
   });

   $window.scroll(function() {
    if($window.scrollTop() > offset) {
     $top_link.fadeIn();
    } else {
     $top_link.fadeOut();
    }
   }).scroll();

   $('.popin')
    .popover({trigger: 'manual'})
    .on({
     'mouseenter.popover': function () {
      var $target = $(this);
      var $container = $target.children().first();

      $target.data('popover-hover', true);

      // popover already displayed
      if ($target.next('.popover').length) {
       return;
      }

      // show the popover
      $container.popover('show');

      // register mouse events on the popover
      $target.next('.popover:not(.popover-initialized)')
       .on({
        'mouseenter': function () {
         $target.data('popover-hover', true);
        },
        'mouseleave': function () {
         hidePopover($container);
        }
       })
       .addClass('popover-initialized');
     },
     'mouseleave.popover': function () {
      hidePopover($(this).children().first());
     }
    });
  });
=======
$(function () {
  var $window = $(window)
    , $top_link = $('#toplink')
    , $body = $('body, html')
    , offset = $('#code').offset().top;

  $top_link.hide().click(function (event) {
    event.preventDefault();
    $body.animate({scrollTop: 0}, 800);
  });

  $window.scroll(function () {
    if ($window.scrollTop() > offset) {
      $top_link.fadeIn();
    } else {
      $top_link.fadeOut();
    }
  });

  var $popovers = $('.popin > :first-child');
  $('.popin').on({
    'click.popover': function (event) {
      event.stopPropagation();

      var $container = $(this).children().first();

      //Close all other popovers:
      $popovers.each(function () {
        var $current = $(this);
        if (!$current.is($container)) {
          $current.popover('hide');
        }
      });

      // Toggle this popover:
      $container.popover('toggle');
    },
  });

  //Hide all popovers on outside click:
  $(document).click(function (event) {
    if ($(event.target).closest($('.popover')).length === 0) {
      $popovers.popover('hide');
    }
  });

  //Hide all popovers on escape:
  $(document).keyup(function (event) {
    if (event.key === 'Escape') {
      $popovers.popover('hide');
    }
  });
});
>>>>>>> f6994d1d1fa872cc6e72ef83b9b29a9296af2123
