// javascripts
$(document).ready(function(){
  alignRulers();

});

// rulers
function alignRulers(){
  var stage = $('.js-stage');
  var stageArtwork = $('.js-stage-artwork');
  var stageArtworkX;
  var stageArtworkY;
  var rulerHorizontal = $('.js-ruler-horizontal');
  var rulerHorizontalZero = $('.js-ruler-horizontal-zero');
  var rulerVertical = $('.js-ruler-vertical');
  var rulerVerticalZero = $('.js-ruler-vertical-zero');

  var movedVertical = 0;
  var movedHorizontal = 0;

  // on resize run this also
  $(window).resize(function(){
    waitForFinalEvent(function(){
      resizeRulers();
    },80);
  });

  function resizeRulers() {
    // get distance of artboard from left / top;
    stageArtworkY = stageArtwork.offset().top - stage.offset().top;
    stageArtworkX = stageArtwork.offset().left - stage.offset().left;

    // horizontal
    var horizontalOffset = rulerHorizontalZero.offset().left - stage.offset().left - movedHorizontal;
    var horizontalMove = stageArtworkX-horizontalOffset;
    movedHorizontal = horizontalMove;

    rulerHorizontal.attr(
      'style','transform:translateX('+horizontalMove+'px)'
    );

    // vertical
    var verticalOffset = rulerVerticalZero.offset().top - stage.offset().top - movedVertical;
    var verticalMove = stageArtworkY-verticalOffset-rulerVerticalZero.outerHeight();
    movedVertical = verticalMove;

    rulerVertical.attr(
      'style','transform:translateY('+verticalMove+'px)'
    );
  };
  resizeRulers();
}
