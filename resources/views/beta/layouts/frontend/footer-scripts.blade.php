<script>
    function price() {
        return {
          minprice: 0, 
          maxprice: 10000,
          min: 100, 
          max: 10000,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 500);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
    function caret() {
        return {
          minprice: 0, 
          maxprice: 10000,
          min: 100, 
          max: 10000,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 500);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
    function cut() {
        return {
          minprice: 0, 
          maxprice: 10000,
          min: 100, 
          max: 10000,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 500);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
    function clarity() {
        return {
          minprice: 0, 
          maxprice: 10000,
          min: 100, 
          max: 10000,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 500);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
</script>
    

<script type="text/javascript">
    (function(){

      var doc = document.documentElement;

      var prevScroll = window.scrollY || doc.scrollTop;
      var curScroll;
      var direction = 0;
      var prevDirection = 0;

      var header = document.getElementById('td-header');
      var logo = document.getElementById('td-logo');
      var navUpper = document.getElementById('td-nav-upper');

      var checkScroll = function() {
      // console.log(window.pageYOffset)
        if ( window.pageYOffset > 100) { 
          
          //replace 52 with the height of your header in px

          header.classList.add('shorter');
          logo.classList.add('scale-75');
          navUpper.classList.add('hidden');
        }else{
          header.classList.remove('shorter');
          logo.classList.remove('scale-75');
          navUpper.classList.remove('hidden');

        }

        /*
        ** Find the direction of scroll
        ** 0 - initial, 1 - up, 2 - down
        */

        curScroll = window.scrollY || doc.scrollTop;
        if (curScroll > prevScroll) { 
          //scrolled up
          direction = 2;
        }
        else if (curScroll < prevScroll) { 
          //scrolled down
          direction = 1;
        }

        if (direction !== prevDirection) {
          toggleHeader(direction, curScroll);
        }
        
        prevScroll = curScroll;
      };

      var toggleHeader = function(direction, curScroll) {

        if (direction === 2 && curScroll > 190) { 
          
          //replace 52 with the height of your header in px

          header.classList.add('hide');
          prevDirection = direction;
        }
        else if (direction === 1) {
          header.classList.remove('hide');
          prevDirection = direction;
        }
      // console.log(curScroll)

      };
      window.addEventListener('scroll', checkScroll);

    })();
</script>

@include('layouts.js.google-comment')
