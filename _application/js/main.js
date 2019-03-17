// javascripts
$(document).ready(function(){


  $('.js-layer-group').click(function(){
    const parent = $(this).parent();

    parent.toggleClass('layers__group--collapsed');

  });


  // alignRulers();
  // tabControl();
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

  function resizeRulers(){
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



var tabs;
var tabLen;

// tab control
function tabControl(){
  tabs = [{
    title: 'animator',
    element: $('.js-tab-animator'),
    state: 'state-animator'
  },{
    title: 'editor',
    element: $('.js-tab-editor'),
    state: 'state-editor'
  },{
    title: 'designer',
    element: $('.js-tab-designer'),
    state: 'state-designer'
  }];

  tabLen = tabs.length;

  // loop through tabs
  for (var i = 0; i < tabLen; i++) {
    tabs[i].index = i;
    setupTab(tabs[i]);
  }
}

function setupTab(tab) {
  var title = tab.title;
  var element = tab.element;
  var state = tab.state;
  var index = tab.index;
  var className = 'tabs-list__tab--active';

  element.click(function(){
    // remove other tabs active state
    for (var i = 0; i < tabLen; i++) {
      if (i != index){
        tabs[i].element.removeClass(className);
      }
    }
    // apply this tabs styles
    element.addClass(className);
    changeLayout(state);
  });
}

function changeLayout(state){
  //selectedTab.addClass('tabs-list__tab--active');
}
