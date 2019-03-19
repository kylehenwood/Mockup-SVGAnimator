// javascripts
$(document).ready(function(){
  const animationPanel = $('.js-animation-panel');
  const animationClose = $('.js-animation-panel-close');


  const group = $('.js-group');
  group.each(function(){
    const head = $(this).children('.js-group-head');
    const body = $(this).children('.js-group-body');

    // expand && collapse events
    head.on('group-expand',function(){
      body.show();
    });

    head.on('group-collapse',function() {
      body.hide();
    });
  });



  $('.js-layer-control').each(function(){
    const layer = $(this);
    const group = $(this).parent();
    const icons = {
      chevron:$(this).find('.js-chevron'),
      symbol: $(this).find('.js-symbol')
    }

    let layerAnimation = {
      hideOther: false,
      hasAnimation: false,
      style: {},
      animation: {},
      keyframes: {}
    }


    const addAnimation = $(this).find('.js-add-animation');

    let open = true;
    let selected = false;

    // only one layer can be selected at a time
    animationClose.click(function(){
      animationPanelClose(animationPanel);
      layerDeselect(layer);
    });


    layer.click(function(event){
      const target = $(event.target);
      //console.log(target);

      switch(true) {
        case target.hasClass('js-layer-chevron'):
          toggleGroupExpand(group,icons,open,layer);
          open ^= true;
          break;
        case target.hasClass('js-layer-background'):
          toggleGroupExpand(group,icons,open,layer);
          open ^= true;
          break;
        case target.hasClass('js-layer-animation'):
          layerSelect(layer);
          animationPanelOpen(animationPanel,target);
          break;
        case target.hasClass('js-layer-label'):
          event.stopPropagation();
          layerSelect(layer);
          animationPanelOpen(animationPanel,target);
          break;
        case target.hasClass('js-add-animation'):
          event.stopPropagation();
          layerSelect(layer);
          animationPanelOpen(animationPanel,target);
          break;
        default:
          // code block
      }
    });
  });
});


function layerControlHover() {}

// Animation panel
function animationPanelOpen(panel,layerId) {
  panel.show();
}

function animationPanelClose(panel) {
  panel.hide();
}

// Animation range
function animationTimelineRange() {}

function toggleGroupExpand(group,icons,open, layer){

  if (open == true) {
    open = false;
    layer.trigger('group-collapse');
    icons.chevron.removeClass('icon--chevron-down');
    icons.chevron.addClass('icon--chevron-right');
    icons.symbol.removeClass('icon--folder-open');
    icons.symbol.addClass('icon--folder');
  } else {
    open = true;
    layer.trigger('group-expand');
    icons.chevron.removeClass('icon--chevron-right');
    icons.chevron.addClass('icon--chevron-down');
    icons.symbol.removeClass('icon--folder');
    icons.symbol.addClass('icon--folder-open');
  }
}

let selectedLayer;

function layerSelect(element) {
  if (selectedLayer) {
    layerDeselect(selectedLayer);
  }
  selectedLayer = element;
  element.addClass('layer-control--selected');
}

function layerDeselect(element) {
  element.removeClass('layer-control--selected');
}





function disableAnimations(current) {
  // disable all animations except current
}
