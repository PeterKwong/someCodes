<style type="text/css">
/*	canvas {
	  background-color:#fff;
	  margin:50px;
	},*/
	.productViewer {
	  height: auto;
	  width: 100%;
	}
</style>

<template>
    <div class="grid grid-cols-12 ">
          <div class="col-span-12">
            <div class="bg-black relative" @click="pauseOrStart()">
              <canvas :id="id" class="flex productViewer" :width="width" :height="height" 

                @mousedown="startDrag" @touchstart="startDrag"
                @mousemove="onDrag" @touchmove="onDrag"
                @mouseup="stopDrag" @touchend="stopDrag" @mouseleave="stopDrag">
                
              </canvas>
              <div v-if="init" class="absolute flex flex-row left-1/2 top-1/2 border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700 opacity-50" >
                <svg class="w-6 fill-current text-white " viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5987 5.09811C14.8234 4.96838 15.0999 4.96721 15.3257 5.09518L21.3455 8.50637L15.0035 12.1851L8.66356 8.52473L14.5987 5.09811ZM10.5967 20.7044C10.19 20.2906 9.48326 20.4928 9.35914 21.0613L9.03555 22.5431C4.18829 21.2384 1.86104 18.4324 6.46729 16.1307V14.5189C0.42305 17.1264 1.37154 22.0238 8.72266 23.9757L8.43169 25.3079C8.30694 25.8791 8.873 26.3623 9.41895 26.1439L13.0798 24.6795C13.5641 24.4859 13.6968 23.8598 13.3302 23.4866L10.5967 20.7044ZM23.5414 14.5189V16.1307C25.119 16.9189 26.0356 17.8947 26.0356 18.8626C26.0356 21.0811 21.5722 22.8239 17.1564 23.1912C16.7532 23.2244 16.4535 23.5783 16.4872 23.981C16.5188 24.3683 16.8528 24.681 17.2769 24.6506C21.1208 24.3342 27.5 22.6755 27.5 18.8626C27.5 16.7802 25.4624 15.3476 23.5414 14.5189ZM7.93144 16.6461C7.93144 16.9077 8.07099 17.1494 8.29751 17.2802L14.2722 20.7296V13.4537L7.93139 9.79282V16.6461H7.93144ZM22.0773 9.77474V16.6461C22.0773 16.9077 21.9378 17.1494 21.7113 17.2802L15.7366 20.7297V13.4527L22.0773 9.77474Z" ></path>
                </svg>
                <span class="text-sm text-white">360°</span>
            </div>     
            </div>
            <!-- 360 view  -->
            <div class="absolute bottom-3 w-full flex justify-end items-center px-4">
                <div class="flex items-center opacity-75">
                    <button class="flex items-center justify-center" @click="viewerProgress(1)">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.8335 20C3.8335 11.0863 11.0864 3.83337 20.0002 3.83337C28.9139 3.83337 36.1668 11.0863 36.1668 20C36.1668 28.9138 28.9139 36.1667 20.0002 36.1667C11.0864 36.1667 3.8335 28.9138 3.8335 20Z" fill="white" stroke="#CCCCCC" />
                            <path d="M19.5285 25.5725L11.6665 20L19.5285 14.4275V18.3055L24.9998 14.4275V25.5725L19.5285 21.6945V25.5725Z" fill="#666666" />
                        </svg>
                    </button>
                    <button class="flex items-center justify-center" @click="pauseOrStart()">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.8335 20C3.8335 11.0714 11.0715 3.83337 20.0002 3.83337C28.9288 3.83337 36.1668 11.0714 36.1668 20C36.1668 28.9287 28.9288 36.1667 20.0002 36.1667C11.0715 36.1667 3.8335 28.9287 3.8335 20Z" fill="white" stroke="#CCCCCC" />
                            <path d="M15.499 13.108V26.8919L27.4313 20L15.499 13.108Z" fill="#666666" />
                        </svg>
                    </button>
                    <button class="flex items-center justify-center" @click="viewerProgress(-1)">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M36.1665 20C36.1665 11.0863 28.9136 3.83337 19.9998 3.83337C11.0861 3.83337 3.83317 11.0863 3.83317 20C3.83317 28.9138 11.0861 36.1667 19.9998 36.1667C28.9136 36.1667 36.1665 28.9138 36.1665 20Z" fill="white" stroke="#CCCCCC" />
                            <path d="M20.4715 25.5725L28.3335 20L20.4715 14.4275V18.3055L15.0002 14.4275V25.5725L20.4715 21.6945V25.5725Z" fill="#666666" />
                        </svg>
                    </button>
                </div>
            </div>
            <canvas :id="id +'loadingImg' "  class="flex" width="0" height="0" >
            </canvas>
          </div>            
    </div>


</template>

<script type="text/javascript">

	export default {
		props: ['folder', 'filename', 'size','id','thumb'],
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
        init: 1,

			}
		},
		methods:{
      pauseOrStart(){
        if(this.init)
        {
          return this.clearInit()
        }
        if (this.rotate > 0 || this.rotate < 0) {
          this.lastRotate = this.rotate
          this.rotate = 0 
          this.clearInterval()
        }else{
          this.rotate = this.lastRotate
          this.setRotation(this.rotate)
        }
      },
      clearInit(){
        this.init = 0
        this.setRotation(this.rotate)
      },
      viewerProgress(step){
          this.lastRotate = step
          this.rotate = 0 
          this.viewer.progress += step
          this.checkProgressOver()
          this.drawImg()
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

        this.checkProgressOver()
        this.drawImg()

      },
      checkProgressOver(){
          if (this.lastRotate == -1 || this.rotate == -1) {
            if (this.viewer.progress < 0 ) {
              this.viewer.progress = this.size -1
            }
          }

          if (this.lastRotate ==1 || this.rotate == 1) {
            if (this.viewer.progress > this.size -1) {
              this.viewer.progress = 0
            }
          }

      },
      stopDrag() {
        if (this.dragging) {
          this.dragging = false;
          document.body.style.cursor = 'auto';
        }
      },
      setPoster(){

          var myCanvas = document.getElementById(this.id);
          var ctx = myCanvas.getContext('2d');
          var img = new Image;

          img.src = this.thumb;

          // console.log('draw',i)


          // console.log(this.viewer.progress)

          img.onload = function(){
            // console.log('i',i)
            // console.log('vm',vm.viewer.progress)
              ctx.drawImage(img,88, 0, 936 ,618); // Or at whatever offset you like
          };
          

          // console.log(this.viewer.progress)

      },
      drawImg(){
        
  			var myCanvas = document.getElementById(this.id);
  			var ctx = myCanvas.getContext('2d');
  			var img = new Image;
        var i = this.viewer.progress
        var vm = this

        img.src = this.folder + this.filename + this.viewer.progress + '.jpg';

        // console.log('draw',i)


        // console.log(this.viewer.progress)

  			img.onload = function(){
          // console.log('i',i)
          // console.log('vm',vm.viewer.progress)
          if( i == vm.viewer.progress  ){
            ctx.drawImage(img,0, 0, 1100 ,618); // Or at whatever offset you like
          }
  			};
        

        // console.log(this.viewer.progress)

      },
      loadImages(){

        for (var i = 0; this.size -1 > i; i++) {
          this.loadImg(i)
        }
        this.loading = false
      },
      loadImg(i){

        var myCanvas = document.getElementById(this.id +'loadingImg');
        var ctx = myCanvas.getContext('2d');
        var img = new Image;
        var loadedImage = false;
        var size = this.size -1

        img.src = this.folder + this.filename + i  + '.jpg';

        img.onload = function(){
            // console.log(i)
          ctx.drawImage(img,0, 0, 0 ,0); // Or at whatever offset you like

        };

        
      },

		},
		computed:{
		},
		components: {
		},
    watch:{
      'folder':'loadImages',
    },
    destroyed(){
      this.clearInterval()      
    },
		mounted(){
      // this.setRotation(this.rotate)
      this.setPoster()
			this.loadImages()
		},
	
	}




</script>



