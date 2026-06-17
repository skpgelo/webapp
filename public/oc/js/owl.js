jQuery(document).ready(function () {
  var owl = jQuery("#owl-example");

  owl.owlCarousel({
    itemsDesktop: [1000, 5], //5 items between 1000px and 901px
    itemsDesktopSmall: [900, 3], // betweem 900px and 601px
    itemsTablet: [600, 1], //2 items between 600 and 0
    itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
    slideSpeed: 1000,
    responsive: true,
    items: 4,
    pagination: false,
    lazyLoad: true,
  });

  // Custom Navigation Events
  jQuery(".next").click(function () {
    owl.trigger("owl.next");
  });
  jQuery(".prev").click(function () {
    owl.trigger("owl.prev");
  });
});
