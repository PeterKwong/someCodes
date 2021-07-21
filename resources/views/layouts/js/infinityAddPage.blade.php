<script type="text/javascript">
    

    window.addEventListener("scroll", function(event) {

          if (window.mutualVar.screen.y == 0) {
            window.mutualVar.screen.y = document.getElementById('totalHeigh').offsetHeight * 0.55
          }
          // console.log(window.scrollY)
          var top = window.scrollY,
          y = window.mutualVar.screen.y,
          loading = document.getElementById('loading').className,
          height = document.getElementById('totalHeigh').offsetHeight * 0.55;

          console.log(height)

          if (top > y ) {
          console.log(height)

            if (!loading) {
              window.mutualVar.screen.y = height;
              console.log(height)
              console.log(window.mutualVar.screen.y)
              console.log(top)
              Livewire.emit('addPage')
            } 


          }
      
    }, false);

</script>