<script type="text/javascript">
    
  var x = 0 

    window.addEventListener("scroll", function(event) {

        x = document.getElementById('totalHeigh').clientHeight * 0.70

        var top = this.scrollY,
        loading = document.getElementById('loading').className,
        height = document.getElementById('totalHeigh').clientHeight * 0.70;

        if (top > x ) {

          if (!loading) {
             x = height;
            console.log(height)
            console.log(x)
            console.log(top)
            Livewire.emit('addPage')
          } 


        }
      
    }, false);

</script>