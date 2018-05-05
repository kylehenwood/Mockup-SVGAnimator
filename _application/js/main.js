// javascripts
$(document).ready(function(){
  mobileNavigation();
  howItWorks();
});


function howItWorks() {

  var shareTrigger = $('js-share-animation');
  var shareAnimating = false;

  shareTrigger.mouseenter(function(){
    if (shareAnimating === false) {
      shareTrigger.addClass('svg-share--animate');
      shareAnimating = true;
      setTimeout(function(){
          shareTrigger.removeClass('svg-share--animate');
      },5000);
    }
    return false;
  });

}


// mobile navigation
function mobileNavigation() {
  var trigger = $('.js-mobile-button');
  var navigation = $('.js-mobile-navigation');
  var header = $('.js-mobile-header');

  trigger.click(function(){
    header.toggleClass('header-mobile--open');
    navigation.toggleClass('header-mobile__navigation--visible');
  });
}