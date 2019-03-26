$(function() {
  const $slider = $(".slider");
  const $sliderItems = $slider.children();

  // Force the container height
  const h = $sliderItems.first().height();
  $slider.height(h);

  let i = $sliderItems.length - 1;
  setInterval(function() {
    $slider
      .children()
      .eq(i)
      .animate({ top: h }, 300, function() {
        $(this)
          .detach()
          .css({ top: 0 })
          .prependTo($slider);
      });

    // $sliderItems
    //   .eq(i + 1)

    // i--;
    // if (i <= 1) {
    //   i = $sliderItems.length - 1;
    // }
  }, 1000);
});
