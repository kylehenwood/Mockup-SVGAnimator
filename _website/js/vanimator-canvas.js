// game panel setup

var vanimator = {
  container:'',
  canvas:'',
  context:'',
  size: 32,
  panels: 5,
  alphaMax: 0.2,
  alphaMin: 0,
  alphaSpeed: 0.001
}

var pool = [];
var panels = [];

$(document).ready(function(){
  setupCanvas();
  createTriangles();

  drawTriangles();
});


$(window).resize(function(){
  waitForFinalEvent(function(){
    pool = [];
    panels = [];
    clearCanvas();
    setupCanvas();
    createTriangles();

    //drawTriangles();
  },160);
});


function clearCanvas() {
  vanimator.context.clearRect(0,0,vanimator.canvas.width,vanimator.canvas.height);
}

function setupCanvas() {
  vanimator.container = document.getElementById('js-vanimator-banner');
  vanimator.canvas = document.getElementById('js-vanimator-canvas');
  vanimator.canvas.width = vanimator.container.offsetWidth;
  vanimator.canvas.height = vanimator.container.offsetHeight;
  vanimator.context = vanimator.canvas.getContext('2d');
}


// ------
// loop
function drawTriangles() {
  requestAnimationFrame(drawTriangles);
  clearCanvas();
  renderShapes();
}



// ---------------------------------------------------------------


function createTriangles() {
  let rowCount = 0;
  let alternate = true;
  const size = vanimator.size;

  // populate the shape array
  while (rowCount < vanimator.canvas.height) {
    createRow(rowCount,alternate);
    rowCount+=vanimator.size;
    if (alternate === true) {
      alternate = false;
    } else {
      alternate = true;
    }
  }


  // create some canvas panels to draw the stars on
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
    panel.canvas.width = vanimator.canvas.width;
    panel.canvas.height = vanimator.canvas.height;
    panel.context = panel.canvas.getContext('2d');
    panel.anim = alternate;

    // max opacity of a layer = 0.5
    // vanimator.panels = 20?
    // (0.5/20)*panel

    panel.alpha = (vanimator.alphaMax/vanimator.panels)*[i];
    panels.push(panel);
  }


  // create one canvas for the shape.
  var shape = {
    canvas:null,
    context:null,
  };
  shape.canvas = document.createElement('canvas');
  shape.canvas.width = size;
  shape.canvas.height = size;
  shape.context = shape.canvas.getContext('2d');

  // draw the shape
  shape.context.fillStyle = 'white';
  shape.context.beginPath();
  shape.context.moveTo(0,0);
  shape.context.lineTo(size,0);
  shape.context.lineTo(size/2,size);
  shape.context.lineTo(0,0);
  shape.context.closePath();
  shape.context.fill();

  // // Squares
  // shape.context.rect(element.posX+1,element.posY+1,size-2,size-2);
  // shape.context.fill();

  // // Circles
  // shape.context.beginPath();
  // shape.context.arc(element.posX, element.posY, 4, 0, Math.PI*2, true);
  // shape.context.closePath();

  // split the shapes to canvases
  for (i = 0; i < pool.length; i++) {
    const element = pool[i];
    const layer = element.layer-1;
    const context = panels[layer].context;

    context.drawImage(shape.canvas,element.posX,element.posY);
  }
}

// create a row of triangles
function createRow(row,alternate) {
  const size = vanimator.size;
  // center shape
  let center = vanimator.canvas.width / 2;
      center = center - size/2;

  if (alternate === true) {
    center-=size/2;
  }

  var elem = {
    posX: center,
    posY: row,
    layer: rand(1,vanimator.panels),
  }
  pool.push(elem);

  // draw squares to the left of the center
  let startPos = center;
  while (startPos > 0) {
    startPos-=size;
    var elem = {
      posX: startPos,
      posY: row,
      layer: rand(1,vanimator.panels),
    }
    pool.push(elem);
  }

  // draw squares to the right of center
  let endPos = center;
  while (endPos < vanimator.canvas.width) {
    endPos+=size;
    var elem = {
      posX: endPos,
      posY: row,
      layer: rand(1,vanimator.panels),
    }
    pool.push(elem);
  }
}



// print panel canvases to primary canvas
function renderShapes() {
  const context = vanimator.context;

  for (i = 0; i < panels.length; i++) {
    var panel = panels[i];

    // decrease opacity
    if (panel.anim === false) {
      if (panel.alpha > vanimator.alphaMin) {
        panel.alpha -= vanimator.alphaSpeed;
        if (panel.alpha < 0) {
          panel.alpha = 0;
        }
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

    //context.save();
    context.globalAlpha = panel.alpha;
    context.drawImage(panel.canvas,0,0);
    //context.restore();
  }
}


// create a canvas for each triangle opacity
