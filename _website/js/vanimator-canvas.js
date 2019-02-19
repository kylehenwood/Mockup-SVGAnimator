// game panel setup

var vanimator = {
  container:'',
  canvas:'',
  context:'',
  gridSize: 32,
  panels: 8,
  alphaMax: 0.2,
  alphaMin: 0,
}

const size = 32;
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

  // populate the shape array
  while (rowCount < vanimator.canvas.height) {
    createRow(rowCount,alternate);
    rowCount+=(size);
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


  // split the shapes to canvases
  for (i = 0; i < pool.length; i++) {
    const element = pool[i];
    const layer = element.layer-1;
    const context = panels[layer].context;

    context.fillStyle = 'rgba(255,255,255,1)';
    context.beginPath();
    context.moveTo(element.posX,element.posY);
    context.lineTo(element.posX+32,element.posY);
    context.lineTo(element.posX+16,element.posY+32);
    context.lineTo(element.posX,element.posY);
    context.fill();

  }
}


function randomAlpha() {
  var alpha = rand(1,100);
      alpha = (alpha/100)*0.4;
  return alpha;
}


function createRow(row,alternate) {
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
    anim: false
  }
  pool.push(elem);

  // draw squares to the left of the center
  let startPos = center;
  while (startPos > 0) {
    startPos-=32;
    var elem = {
      posX: startPos,
      posY: row,
      layer: rand(1,vanimator.panels),
      anim: false
    }
    pool.push(elem);
  }

  // draw squares to the right of center
  let endPos = center;
  while (endPos < vanimator.canvas.width) {
    endPos+=32;
    var elem = {
      posX: endPos,
      posY: row,
      layer: rand(1,vanimator.panels),
      anim: false
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
        panel.alpha -= 0.002;
        if (panel.alpha < 0) {
          panel.alpha = 0;
        }
      } else {
        panel.anim = true;
      }

    // increase opacity
    } else {
      if (panel.alpha < vanimator.alphaMax) {
        panel.alpha += 0.002;
      } else {
        panel.anim = false;
      }
    }

    context.save();
    context.globalAlpha = panel.alpha;
    context.drawImage(panel.canvas,0,0);
    context.restore();
  }
}


// create a canvas for each triangle opacity
