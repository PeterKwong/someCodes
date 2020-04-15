<template>
  <div @click="alertMe">
    <vue-slider ref="slider" :interval="interval" :value="value" :min="min" :max="max" :tooltip="tooltip" ></vue-slider>
  </div>
</template>
<script>
// import vueSlider from 'vue-slider-component';

export default {
  components: {
    // vueSlider
  },
  props : ['prices', 'logPrices'],
  data () {
    return {
          value: [this.prices[0],this.prices[1]],
          width: "100%",
          height: 8,
          dotSize: 16,
          interval: 0.1,
          min: 6.907755278982137,
          max: 17.72753356339242,
          maxValue:50000000,
          minValue:1000,
          controlDots:[this.logMin,this.logMax],
          sliderValues:[0,0],
          disabled: false,
          show: false,
          useKeyboard: true,
          tooltip: "false",
          formatter: "HK${value}",
          bgStyle: {
            "backgroundColor": "#fff",
            "boxShadow": "inset 0.5px 0.5px 3px 1px rgba(0,0,0,.36)"
          },
          tooltipStyle: {
            "backgroundColor": "#666",
            "borderColor": "#666"
          },
          processStyle: {
            "backgroundColor": "#999"
          },
        }
  },
  computed:{
    values(){
      return this.logPrices
    },
    logMin(){
      return this.logValue(this.minValue)
    },
    logMax(){
      return this.logValue(this.maxValue)
    },
    inputMinValue(){
      var min = this.logslider(this.logScalePage(this.prices[0]))
        return this.controlDots[0] = (this.logValue(this.prices[0]))
    },
    inputMaxValue(){
        var max = this.logslider(this.logScalePage(this.prices[1]))
        return this.controlDots[1] = (this.logValue(this.prices[1]))
    },
    scaleFactor(){
          var minp = this.min;
          var maxp = this.max;

          // The result should be between 100 an 10000000
          var minv = Math.log(this.minValue);
          var maxv = Math.log(this.maxValue);

          // calculate adjustment factor
          var scale = (maxv-minv) / (maxp-minp);
          return scale 
    }
  },
  watch:{
    'prices':'logPriceValues'
  },
  methods:{
        logslider(position) {
          // position will be between 0 and 100
          var minp = this.min;
          var maxp = this.max;

          // The result should be between 100 an 10000000
          var minv = Math.log(this.minValue);
          var maxv = Math.log(this.maxValue);

          // calculate adjustment factor
          var scale = (maxv-minv) / (maxp-minp);

          return Math.exp(minv + scale*(position-minp));
        },
        logValue(value){

          return Math.log(value)
    
        },
        logScalePage(value){
          //90
          return Math.ceil( ((this.maxValue - Math.log(value)))/ this.scaleFactor);

        },
        expSliderValues(){
          var values = this.$refs.slider.getValue()

          for (var i = 0 ;values.length > i ; i++) {
             this.sliderValues[i] = Math.ceil(Math.exp(values[i]))
          }

        },
        logPriceValues(){
          var values = this.prices

          for (var i = 0 ;values.length > i ; i++) {
             this.value[i] = Math.log(values[i])
          }

        },
        alertMe(){
          // alert('hi')
          this.expSliderValues();
          this.$emit('slider-bar-update', this.sliderValues)
        }


  }
}
</script>