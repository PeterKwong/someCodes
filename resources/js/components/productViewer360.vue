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
         	<div class="col-12">
         		<canvas id="productViewer" class="flex" :width="width" :height="height" 

	         		@mousedown="startDrag" @touchstart="startDrag"
			        @mousemove="onDrag" @touchmove="onDrag"
			        @mouseup="stopDrag" @touchend="stopDrag" @mouseleave="stopDrag">
         			
         		</canvas>
         	</div>         		
		</div>
</template>

<script type="text/javascript">

	export default {
		props: ['folder', 'filename', 'size','rotate'],
		data(){
			return {
				dragging: false,
        // quadratic bezier control point
        c: { x: 160, y: 160 },
        // record drag start point
        start: { x: 0, y: 0 },

				width:1080,
				height:720,
				viewer:{ width:1080,heigh:720,progress:0,stage:'',},
        rotatingTime:100,
				interval:'',

			}
		},
		methods:{
		  startDrag(e) {
        e = e.changedTouches ? e.changedTouches[0] : e;
        this.dragging = true;
        this.start.x = e.pageX;
        this.start.y = e.pageY;
        document.body.style.cursor = 'ew-resize';
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

          // this.setRotation(moved)

          this.rotateDirection(moved)

        }

      },
      setRotation(moved){

        this.clearInterval()

        this.interval = setInterval(() => {
          if (!this.dragging ) {
            this.nextImage(moved)
          }
        }, this.rotatingTime)             

      },
      clearInterval(){
    		clearInterval(this.interval);
        // console.log('clear')
      },
      nextImage(moved){
        console.log(moved)
      	this.rotateDirection(moved)

      },
      rotateDirection(moved){

        this.viewer.progress +=  moved

        console.log(this.viewer.progress)

        this.drawImg()


        if (this.viewer.progress <= 0 && moved == -1) {
        	this.viewer.progress = this.size -1
        }

        if (this.viewer.progress >= this.size -1 && moved == 1) {
        	this.viewer.progress = 0
        }

      },
      stopDrag() {
        if (this.dragging) {
          this.dragging = false;
          document.body.style.cursor = 'auto';
        }
      },
      drawImg(){

  			var myCanvas = document.getElementById('productViewer');
  			var ctx = myCanvas.getContext('2d');
  			var img = new Image;

        img.src = this.folder + this.filename +  this.viewer.progress + '.jpg';

  			img.onload = function(){
  			  ctx.drawImage(img,0, 0, 1080 ,720); // Or at whatever offset you like
  			};
        
        console.log(this.viewer.progress)

      },

		},
		computed:{
		},
		components: {
		},
    destroyed(){
      this.clearInterval()      
    },
		mounted(){
			this.drawImg()
      this.setRotation(this.rotate)

		}
	
	}




</script>



