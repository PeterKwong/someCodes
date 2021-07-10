<div>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Product",
    "name": "Ting Diamond",
    "image": [
      "https://lh5.googleusercontent.com/p/AF1QipPUqwzVMGpEPZIn32pIWkW1LgbbGI8szltJyLYA=w100-h100-p-n-k-no"   
        ],
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "{{ cache()->get('googleCommentRate') }}",
      "reviewCount": "{{ cache()->get('googleCommentCount') }}"
    }
  }
  </script>

<script type="text/javascript">
    (function(){

      var doc = document.documentElement;
      var w = window;

      var prevScroll = w.scrollY || doc.scrollTop;
      var curScroll;
      var direction = 0;
      var prevDirection = 0;

      var header = document.getElementById('site-header');

      var checkScroll = function() {

        /*
        ** Find the direction of scroll
        ** 0 - initial, 1 - up, 2 - down
        */

        curScroll = w.scrollY || doc.scrollTop;
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
        if (direction === 2 && curScroll > 52) { 
          
          //replace 52 with the height of your header in px

          header.classList.add('hide');
          prevDirection = direction;
        }
        else if (direction === 1) {
          header.classList.remove('hide');
          prevDirection = direction;
        }
      };
      
      window.addEventListener('scroll', checkScroll);

    })();
</script>



</div>

