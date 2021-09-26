
<script type="text/javascript">
    
        var  timerId;
        
        function  makeAPICall() {
         
         Livewire.emit('addPage')

      }

      var  throttleFunction  =  function (func, delay) {
        if (timerId) {
          return
        }
        timerId  =  setTimeout(function () {
          func()          
          timerId  =  undefined;
        }, delay)
      }

    window.addEventListener("scroll", function(event) {

          if (window.mutualVar.screen.y == 0) {
            window.mutualVar.screen.y = document.getElementById('toTop').offsetTop - 800
          }

          var top = window.scrollY,
          y = window.mutualVar.screen.y,
          loading = document.getElementById('loading').className,
          height = document.getElementById('toTop').offsetTop - 800;


          if (top > y ) {
          // console.log(height)
            if (!loading) {
              window.mutualVar.screen.y = height;
              // console.log(height)
              // console.log(window.mutualVar.screen.y)
              // console.log(top)

              throttleFunction(makeAPICall, 1000)
            } 

          }

    }, false);
    
    window.addEventListener('popstate', function (event) {
        location.reload()
    });

</script>