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
		<div class="row text-center">
         	<div class="col-12" >
         		<canvas id="productViewer" :width="width" :height="height" 
         		
	         		@mousedown="startDrag" @touchstart="startDrag"
			        @mousemove="onDrag" @touchmove="onDrag"
			        @mouseup="stopDrag" @touchend="stopDrag" @mouseleave="stopDrag">
         			
         		</canvas>
         	</div>         		
		</div>
</template>

<script type="text/javascript">

	export default {
		props: ['folder', 'filename'],
		data(){
			return {
				dragging: false,
	            // quadratic bezier control point
	            c: { x: 160, y: 160 },
	            // record drag start point
	            start: { x: 0, y: 0 },

				width:720,
				height:490,
				viewer:{ size:50, width:400,heigh:400,progress:1,stage:'',},
				rotating:false,
				direction:0,
				interval:'',

			}
		},
		methods:{

		  startDrag(e) {
            e = e.changedTouches ? e.changedTouches[0] : e;
            this.dragging = true;
            this.start.x = e.pageX;
            this.start.y = e.pageY;
          },
          onDrag(e) {
          	var moved = 0
            e = e.changedTouches ? e.changedTouches[0] : e;
            if (this.dragging) {
              this.c.x = 160 + (e.pageX - this.start.x);
              this.c.y = 160 + (e.pagey - this.start.y);

              if (e.pageX > this.start.x ) {
              	moved = -1
              	this.start.x =  e.pageX -1

              }
              if (e.pageX < this.start.x ) {
              	moved = 1
              	this.start.x =  e.pageX + 1

              }

          	  this.rotateDirection(moved)

              // console.log(this.start.x  )
              // console.log(e.pageX)

              this.keepRotate(moved)
            }
          },
          keepRotate(moved){

          	if (this.direction != moved || !this.rotating) {
          		this.clearInterval()
         		this.direction = moved 
			    this.rotating = true

			    this.interval = setInterval(() => {
				  this.nextImage(moved)
				}, 100)   
          	}

          	console.log(moved)
          },
          clearInterval(){
          		clearInterval(this.interval);
          },
          nextImage(moved){
          	this.rotateDirection(moved)
          	console.log(moved)

          	// this.keepRotate(moved)
          },
          rotateDirection(moved){

          	var viewer = this.viewer

              viewer.progress +=  moved



              console.log(viewer.progress)

              this.drawImg()


              if (viewer.progress < 2 && moved == -1) {
              	viewer.progress = viewer.size + 1
              }

              if (viewer.progress == viewer.size && moved == 1) {
              	viewer.progress = 1
              }

          },
          stopDrag() {
            if (this.dragging) {
              this.dragging = false;
            }
          },
          drawImg(){

			var myCanvas = document.getElementById('productViewer');
			var ctx = myCanvas.getContext('2d');
			var img = new Image;

			img.onload = function(){
			  ctx.drawImage(img,0, 0); // Or at whatever offset you like
			};

			img.src = this.folder + this.filename +  this.viewer.progress + '.jpg';

          },

		},
		computed:{
		},
		components: {
		},
		created(){
		},
		beforeMounted(){
		},
		mounted(){
			this.drawImg()


		}
	
	}




</script>



