// game panel setup

var vanimator = {
  canvas:'',
  context:'',
  size: 32,
  panels: 12,
  alphaMax: 0.4,
  alphaMin: 0,
  animated: false
}

// var pool = [];
// var panels = [];


// populate every canvas background on the page with triangles
$(document).ready(function() {
  vanimator.alphaSpeed = (vanimator.alphaMax-vanimator.alphaMin)/vanimator.panels;
  vanimator.alphaSpeed = vanimator.alphaSpeed*0.02;

  setupBackground();
});


$(window).resize(function(){
  waitForFinalEvent(function(){
    setupBackground();
  },160);
});


// for each background element create panels and create shapes
function setupBackground() {
  const containers = $('.js-vanimator-bg');
  containers.each(function(){

    let background = {
      canvas: null,
      context: null,
      shapes: null,
      panels: null,
    }

    background.canvas = $(this)[0];
    background.canvas.width = background.canvas.offsetWidth;
    background.canvas.height = background.canvas.offsetHeight;
    background.context = background.canvas.getContext('2d');
    background.panels = createPanels(background);
    background.shapes = createTriangles(background);

    renderShapes(background);
    renderPanels(background);

    $(document).on('animate',function(){
      clearCanvas(background);
      renderPanels(background);
    });

    loop();
  });
}


function clearCanvas(background) {
  background.context.clearRect(0,0,background.canvas.width,background.canvas.height);
}
//
//
// ------
// loop
function loop(background) {
  requestAnimationFrame(loop);
  $(document).trigger('animate');
}


// ---------------------------------------------------------------


function createTriangles(background) {
  let shapes = [];
  let rowCount = 0;
  let alternate = true;
  const size = vanimator.size;


  // repeat vertically untill the background is filled
  while (rowCount < background.canvas.height) {
    alternate = !alternate;

    // find the center
    let center = background.canvas.width/2;

    if (alternate === true) {
      center -= size/2;
    }


    var startPos = center;

    // find out where the first triangle shall be placed.
    while (startPos > 0) {
      startPos-=size;
    }

    // draw shapes from left to right.
    while (startPos < background.canvas.width) {
      var elem = {
        posX: startPos,
        posY: rowCount,
        layer: rand(1,vanimator.panels),
      }
      shapes.push(elem);
      startPos+=size;
    }
    rowCount+=size;
  }

  return shapes;
}

// render all created shapes to canvas panels
function renderShapes(background) {
  const size = vanimator.size;

  // create one canvas for the shape.
  var shape = {
    canvas:null,
    context:null,
    mode: 1
  };

  // create a canvas to print the shape on
  shape.canvas = document.createElement('canvas');
  shape.canvas.width = size;
  shape.canvas.height = size;
  shape.context = shape.canvas.getContext('2d');

  // draw the shape
  // triangles
  shape.context.fillStyle = 'rgba(255,255,255,0.5)';
  if (shape.mode === 1) {
    shape.context.beginPath();
    shape.context.moveTo(0,0);
    shape.context.lineTo(size,0);
    shape.context.lineTo(size/2,size);
    shape.context.lineTo(0,0);
    shape.context.closePath();
    shape.context.fill();
    shape.context.strokeStyle = 'white';
    shape.context.strokeWidth = 2;
    shape.context.stroke();
  }

  // Squares
  if (shape.mode === 2) {
    shape.context.rect(1,1,size-2,size-2);
    shape.context.fill();
  }

  // Circles
  if (shape.mode === 3) {
    shape.context.beginPath();
    shape.context.arc(size/2, size/2, 4, 0, Math.PI*2, true);
    shape.context.closePath();
    shape.context.fill();
  }

  // Draw shape canvas on different panels
  // split the shapes to canvases
  for (i = 0; i < background.shapes.length; i++) {
    const element = background.shapes[i];
    const layer = element.layer-1;
    const context = background.panels[layer].context;
    context.drawImage(shape.canvas,element.posX,element.posY);
  }
}





// create a set of panels to add shapes to.
function createPanels(background) {

  let panels = [];
  let alternate = true;

  // create some canvas panels to draw the shapes on
  for (i = 0; i < vanimator.panels; i++) {
    if (alternate === true) {
      alternate = false;
    } else {
      alternate = true;
    }
    var panel = {
      canvas:null,
      context:null,
    };
    panel.canvas = document.createElement('canvas');
    panel.canvas.width = background.canvas.width;
    panel.canvas.height = background.canvas.height;
    panel.context = panel.canvas.getContext('2d');
    panel.anim = alternate;

    // max opacity of a layer = 0.5
    // vanimator.panels = 20?
    // (0.5/20)*panel
    panel.alpha = (vanimator.alphaMax/vanimator.panels)*[i];
    panels.push(panel);
  }

  return panels;
}




// draw all layers of canvas to the primary canvas and animatie their opacity
function renderPanels(background) {
  const context = background.context;
  const panels = background.panels;

  for (i = 0; i < panels.length; i++) {
    var panel = panels[i];

    // decrease opacity
    if (panel.anim === false) {
      if (panel.alpha > vanimator.alphaMin) {
        panel.alpha -= vanimator.alphaSpeed;
      } else {
        panel.anim = true;
      }

    // increase opacity
    } else {
      if (panel.alpha < vanimator.alphaMax) {
        panel.alpha += vanimator.alphaSpeed;
      } else {
        panel.anim = false;
      }
    }

    // dont allow for alphas outside of the expected range to be rendered.
    var renderedAlpha = panel.alpha;
    if (renderedAlpha > 1) {
      renderedAlpha = 1;
    }
    if (renderedAlpha < 0) {
      renderedAlpha = 0;
    }

    context.globalAlpha = renderedAlpha;
    context.drawImage(panel.canvas,0,0);

    console.log(i);
  }
}
