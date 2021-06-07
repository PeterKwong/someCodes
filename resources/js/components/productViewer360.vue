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
  <div>
 <!--    <div class="relative z-10" v-if="loading" >
      <button tabindex="1" class="fixed inset-0 bg-black opacity-25 h-full w-full cursor-default">
        <div class="flex justify-center z-20">
          <svg width="100" height="100" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
          <defs>
              <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                  <stop stop-color="#fff" stop-opacity="0" offset="0%"/>
                  <stop stop-color="#fff" stop-opacity=".631" offset="63.146%"/>
                  <stop stop-color="#fff" offset="100%"/>
              </linearGradient>
          </defs>
          <g fill="none" fill-rule="evenodd">
              <g transform="translate(1 1)">
                  <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                      <animateTransform
                          attributeName="transform"
                          type="rotate"
                          from="0 18 18"
                          to="360 18 18"
                          dur="0.9s"
                          repeatCount="indefinite" />
                  </path>
                  <circle fill="#fff" cx="36" cy="18" r="1">
                      <animateTransform
                          attributeName="transform"
                          type="rotate"
                          from="0 18 18"
                          to="360 18 18"
                          dur="0.9s"
                          repeatCount="indefinite" />
                  </circle>
              </g>
          </g>
      </svg>
        </div>
      </button>
    </div>
     -->
    <div class="grid grid-cols-12 ">
          <div class="col-span-12">
            <canvas id="productViewer" @click="pauseOrStart()" class="flex" :width="width" :height="height" 

              @mousedown="startDrag" @touchstart="startDrag"
              @mousemove="onDrag" @touchmove="onDrag"
              @mouseup="stopDrag" @touchend="stopDrag" @mouseleave="stopDrag">
              
            </canvas>
            <div class="flex justify-center bg-gray-300 opacity-50">
              <div class="border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700"  @click="viewerProgress(1)">
                    <i class="hidden sm:block fa fa-chevron-left text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-chevron-left text-white " aria-hidden="true" ></i>
              </div>
              <div class="border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700"  @click="pauseOrStart()">
                    <i class="hidden sm:block fa fa-play text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-play text-white " aria-hidden="true" ></i>
              </div>
              <div class="border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700"  @click="viewerProgress(-1)">
                    <i class="hidden sm:block fa fa-chevron-right text-white fa-2x" aria-hidden="true" ></i>
                    <i class="sm:hidden fa fa-chevron-right text-white " aria-hidden="true" ></i>
              </div>
            </div>
            <canvas id="loadingImg"  class="flex" width="0" height="0" >
            </canvas>
          </div>            
    </div>
  </div>
</template>

<script type="text/javascript">

	export default {
		props: ['folder', 'filename', 'size'],
		data(){
			return {
				dragging: false,
        // quadratic bezier control point
        c: { x: 160, y: 160 },
        // record drag start point
        start: { x: 0, y: 0 },

				width:1100,
				height:618,
				viewer:{ progress:0, lastProgress:0, stage:'',},
        rotatingTime:70,
				interval:'',
        rotate:1,
        lastRotate:0,
        loading:true,

			}
		},
		methods:{
      pauseOrStart(){
        if (this.rotate > 0 || this.rotate < 0) {
          this.lastRotate = this.rotate
          this.rotate = 0 
          this.clearInterval()
        }else{
          this.rotate = this.lastRotate
          this.setRotation(this.rotate)
        }
      },
      viewerProgress(step){
          this.lastRotate = step
          this.rotate = 0 
          this.viewer.progress += step
      },
		  startDrag(e) {
        e = e.changedTouches ? e.changedTouches[0] : e;
        this.dragging = true;
        this.start.x = e.pageX;
        this.start.y = e.pageY;
        document.body.style.cursor = 'ew-resize';
      },
      onDrag(e) {

        e = e.changedTouches ? e.changedTouches[0] : e;
        if (this.dragging) {

          this.c.x = 160 + (e.pageX - this.start.x);
          this.c.y = 160 + (e.pagey - this.start.y);

          if (e.pageX > this.start.x ) {
          	this.rotate = -1
          	this.start.x =  e.pageX -1

          }
          if (e.pageX < this.start.x ) {
          	this.rotate = 1
          	this.start.x =  e.pageX + 1

          }

          // this.setRotation(this.rotate)

          this.rotateDirection()

        }

      },
      setRotation(){

        this.clearInterval()

        this.interval = setInterval(() => {
          if (!this.dragging ) {
            this.rotateDirection()
          }
        }, this.rotatingTime)             

      },
      clearInterval(){
    		clearInterval(this.interval);
        // console.log('clear')
      },
      rotateDirection(){

        this.viewer.progress +=  this.rotate

        // console.log(this.viewer.progress)

        this.drawImg()


        if (this.viewer.progress <= 0 && this.rotate == -1) {
        	this.viewer.progress = this.size -1
        }

        if (this.viewer.progress >= this.size -1 && this.rotate == 1) {
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

        console.log(this.viewer.progress)

  			img.onload = function(){
  			  ctx.drawImage(img,0, 0, 1100 ,618); // Or at whatever offset you like
  			};
        
        // console.log(this.viewer.progress)

      },
      loadImages(){

        for (var i = 0; this.size > i; i++) {
          this.viewer.progress = i
          this.loadImg()
        }
        this.loading = false
      },
      loadImg(){

        var myCanvas = document.getElementById('loadingImg');
        var ctx = myCanvas.getContext('2d');
        var img = new Image;

        img.src = this.folder + this.filename +  this.viewer.progress + '.jpg';

        img.onload = function(){
          ctx.drawImage(img,0, 0, 0 ,0); // Or at whatever offset you like
        };
        
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
			this.loadImages()
      this.setRotation(this.rotate)
		},
	
	}




</script>



