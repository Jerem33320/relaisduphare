$(function() {
  $("#restaurant-nav").tabify({
    container: ".menus-container",
    data: "menu"
  });

  const $window = $(window);
  const $navbar = $("#navbar");
  $window.on("scroll", function(e) {
    if ($(this).scrollTop() > window.innerHeight / 3) {
      $navbar.removeClass("top");
    } else {
      $navbar.addClass("top");
    }
  });
});

$.fn.tabify = function(options) {
  const $this = $(this);
  const $links = $this.find("a");

  const $tabContainer = $(options.container);
  const $tabs = $tabContainer.children();

  const height = $tabs
    .map(function() {
      return $(this).outerHeight();
    })
    .get()
    .reduce((acc, v) => Math.max(acc, v), 0);

  $tabContainer.height(height);

  function setActive($link) {
    const $menu = $("#" + $link.data(options.data));
    $tabs.not($menu).fadeOut();
    $menu.fadeIn();

    $links.removeClass("active");
    $link.addClass("active");
  }

  setActive($links.first());

  $links.on("click", function(e) {
    e.preventDefault();
    setActive($(this));
  });
};
