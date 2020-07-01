<style type="text/css">
/*	canvas {
	  background-color:#fff;
	  margin:50px;
	},*/
	#productViewer {
	  height: auto;
	  width: 100%;
	}
</style>

<template>
         <div class="row text-center" id="mydiv">
         	<div class="col-12" >
         		<div class="progress" v-if="loading">
    				  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
    				  :aria-valuenow="viewer.progress" aria-valuemin="0" :aria-valuemax="viewer.size" 
    				  :style=" 'width:' +  viewer.progress * 100/viewer.size + '%'"></div>
    				</div>
    				<img :src="viewer.source + viewer.progress + viewer.filename" v-if="loading" width="100%">
			  	  <canvas id="productViewer" :width="width" :height="height"></canvas>
			  
         	</div>         		
		</div>
</template>

<script type="text/javascript">

  import viewerJs from '../helpers/productViewer'

	export default {
		props: ['folder', 'filename'],
		data(){
			return {
				width:800,
				height:800,
				viewer:mutualVar.productViewer,
        viewerJs,
				}
		},
		methods:{
			init(){
				this.viewer.source = this.folder
				this.viewer.filename = this.filename

				var elmnt = document.getElementById("myDIV");
			},
		},
		computed:{
			loading(){
          return this.viewer.progress * 100/this.viewer.size != 100
			}
		},
		components: {
		},
		created(){
			this.init()
		}
	
	}

// import '../../../node_modules/easeljs/lib/easeljs.min'

var viewer = mutualVar.productViewer
var stage = viewer.stage

function init() {
  var canvas = document.getElementById("productViewer")
  if (!canvas || !canvas.getContext) return;

  stage = new createjs.Stage(canvas);
  stage.enableMouseOver(true);
  stage.mouseMoveOutside = true;
  createjs.Touch.enable(stage);

  var imgList = new Array(viewer.size);

  console.log(viewer)

  for (var i = 0; imgList.length > i; i++) {
    var j = 1 + i 
    imgList[i] = viewer.source + j + viewer.filename
  }
  
  imgList = imgList.reverse()

  console.log(imgList)
  // return

  var images = [],
    loaded = 0,
    currentFrame = 0,
    totalFrames = imgList.length;
  var rotate360Interval, start_x;

  var bg = new createjs.Shape();
  stage.addChild(bg);

  var bmp = new createjs.Bitmap();
  stage.addChild(bmp);

  // var myTxt = new createjs.Text("360 prototype", '13px Roboto', "#E81280");
  // myTxt.x = myTxt.y =0;
  // myTxt.alpha = 0.5;
  // stage.addChild(myTxt);   

  function load360Image() {
    var img = new Image(viewer.width, viewer.height);
    img.src = imgList[loaded];
    img.onload = img360Loaded;
    images[loaded] = img;
  }

  function img360Loaded(event) {
    loaded++;
    viewer.progress++
    bg.graphics.clear()
    bg.graphics.beginFill("#fff").drawRect(0, 0, viewer.width * loaded / totalFrames, viewer.height);
    bg.graphics.endFill();

    if (loaded == totalFrames) start360();
    else load360Image();
  }

  function start360() {
    document.body.style.cursor = 'none';

    // 360 icon
    // var iconImage = new Image();
    // iconImage.src = "http://jsrun.it/assets/y/n/D/c/ynDcT.png";
    // iconImage.onload = iconLoaded;        

    // update-draw
    update360(0);

    // first rotation
    rotate360Interval = setInterval(function() {
      if (currentFrame === totalFrames - 1) {
        clearInterval(rotate360Interval);
        addNavigation();
      }
      update360(1);
    }, 25);
  }

  function iconLoaded(event) {
    var iconBmp = new createjs.Bitmap();
    iconBmp.image = event.target;
    iconBmp.x = 20;
    iconBmp.y = canvas.height - iconBmp.image.height - 20;
    stage.addChild(iconBmp);
  }

  function update360(dir) {
    currentFrame += dir;
    if (currentFrame < 0) currentFrame = totalFrames - 1;
    else if (currentFrame > totalFrames - 1) currentFrame = 0;
    bmp.image = images[currentFrame];
  }

  //------------------------------- 
  function addNavigation() {
    stage.onMouseOver = mouseOver;
    stage.onMouseDown = mousePressed;
    document.body.style.cursor = 'auto';
  }

  function mouseOver(event) {
    document.body.style.cursor = 'pointer';
  }

  function mousePressed(event) {
    start_x = event.rawX;
    stage.onMouseMove = mouseMoved;
    stage.onMouseUp = mouseUp;

    document.body.style.cursor = 'w-resize';
  }

  function mouseMoved(event) {
    var dx = event.rawX - start_x;
    var abs_dx = Math.abs(dx);

    if (abs_dx > 5) {
      update360(dx / abs_dx);
      start_x = event.rawX;
    }
  }

  function mouseUp(event) {
    stage.onMouseMove = null;
    stage.onMouseUp = null;
    document.body.style.cursor = 'pointer';
  }

  function handleTick() {
    stage.update();
  }

  document.body.style.cursor = 'progress';
  load360Image();

  // TICKER
  createjs.Ticker.addEventListener("tick", handleTick);
  createjs.Ticker.setFPS(24);
  createjs.Ticker.useRAF = true;
}

// Init
window.addEventListener('load', init, false);



</script>



