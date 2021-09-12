
  
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
      var filter = document.getElementById('filter-icon');

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
          if (filter) {
            filter.classList.add('hidden')
          }
          header.classList.add('hide');
          prevDirection = direction;

        }
        else if (direction === 1) {
          if (filter) {
            filter.classList.remove('hidden')
          }
          header.classList.remove('hide');
          prevDirection = direction;
          // window.mutualVar.screen.scrollingDown = false
        }
      // console.log(curScroll)

      };
      window.addEventListener('scroll', checkScroll);

    })();
</script>

@include('layouts.js.google-comment')
