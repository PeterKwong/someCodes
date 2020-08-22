
<div class="text-center text-gray-700">
        <div class="border border-gray-300 p-2 mx-1">
           <div  class="hover:text-blue-600" @click="selectDisplayColumn('shape')">
              <a class="is-primary">{{trans('diamondSearch.Shape')}}</a>
              <div  class="hover:text-blue-600" @click="selectDisplayColumn('shape')">
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[0].clicked"  @click="toggleValue(query.search_conditions.shape[0].clicked,'shape', 0)">
                          <img src="/images/front-end/diamond_shapes/Round.png" class="w-6 h-6" v-if=" query.search_conditions.shape[0].clicked">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[1].clicked"  @click="toggleValue(query.search_conditions.shape[1].clicked,'shape', 1)">
                          <img src="/images/front-end/diamond_shapes/Pear.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[2].clicked"  @click="toggleValue(query.search_conditions.shape[2].clicked,'shape', 2)">
                          <img src="/images/front-end/diamond_shapes/Emerald.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[3].clicked"  @click="toggleValue(query.search_conditions.shape[3].clicked,'shape', 3)">
                          <img src="/images/front-end/diamond_shapes/Princess.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[4].clicked"  @click="toggleValue(query.search_conditions.shape[4].clicked,'shape', 4)">
                          <img src="/images/front-end/diamond_shapes/Marquise.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[5].clicked"  @click="toggleValue(query.search_conditions.shape[5].clicked,'shape', 5)">
                          <img src="/images/front-end/diamond_shapes/Cushion.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[6].clicked"  @click="toggleValue(query.search_conditions.shape[6].clicked,'shape', 6)">
                          <img src="/images/front-end/diamond_shapes/Asscher.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[7].clicked"  @click="toggleValue(query.search_conditions.shape[7].clicked,'shape', 7)">
                          <img src="/images/front-end/diamond_shapes/Oval.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[8].clicked"  @click="toggleValue(query.search_conditions.shape[8].clicked,'shape', 8)">
                          <img src="/images/front-end/diamond_shapes/Heart.png" class="w-6 h-6">
                  </button>
                  <button  class="btn btn-outline" v-if=" query.search_conditions.shape[9].clicked"  @click="toggleValue(query.search_conditions.shape[9].clicked,'shape', 9)">
                          <img src="/images/front-end/diamond_shapes/Radiant.png" class="w-6 h-6">
                  </button>
              </div>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div v-if="displayColumn == 'shape' ">
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[0].clicked} "  @click="toggleValue(query.search_conditions.shape[0].clicked,'shape', 0)">
                <img src="/images/front-end/diamond_shapes/Round.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[1].clicked} "  @click="toggleValue(query.search_conditions.shape[1].clicked,'shape', 1)">
                <img src="/images/front-end/diamond_shapes/Pear.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[2].clicked} "  @click="toggleValue(query.search_conditions.shape[2].clicked,'shape', 2)">
                <img src="/images/front-end/diamond_shapes/Emerald.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[3].clicked} "  @click="toggleValue(query.search_conditions.shape[3].clicked,'shape', 3)">
                <img src="/images/front-end/diamond_shapes/Princess.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[4].clicked} "  @click="toggleValue(query.search_conditions.shape[4].clicked,'shape', 4)">
                <img src="/images/front-end/diamond_shapes/Marquise.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[5].clicked} "  @click="toggleValue(query.search_conditions.shape[5].clicked,'shape', 5)">
                <img src="/images/front-end/diamond_shapes/Cushion.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[6].clicked} "  @click="toggleValue(query.search_conditions.shape[6].clicked,'shape', 6)">
                <img src="/images/front-end/diamond_shapes/Asscher.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[7].clicked} "  @click="toggleValue(query.search_conditions.shape[7].clicked,'shape', 7)">
                <img src="/images/front-end/diamond_shapes/Oval.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[8].clicked} "  @click="toggleValue(query.search_conditions.shape[8].clicked,'shape', 8)">
                <img src="/images/front-end/diamond_shapes/Heart.png" class="w-6 h-6">
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.shape[9].clicked} "  @click="toggleValue(query.search_conditions.shape[9].clicked,'shape', 9)">
                <img src="/images/front-end/diamond_shapes/Radiant.png" class="w-6 h-6">
              </button>
          </div>
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('price')">
              <a class="is-primary">{{trans('diamondSearch.Price')}} </a>
               <button class="btn btn-outline"> @{{fetchData.priceRange[0]}} - @{{fetchData.priceRange[1]}} </button> 
              <i class="fas fa-chevron-down"></i> 
          </div>

          <div class="level"  v-if="displayColumn == 'price' ">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[0]" @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[1]" @focus="$event.target.select()">
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('weight')">
              <a class="is-primary">{{trans('diamondSearch.Weight')}}</a>
               <button class="btn btn-outline"> @{{fetchData.weight[0]}} - @{{fetchData.weight[1]}} </button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'weight' ">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[0]" @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[1]" @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('color')">
            <a class="is-primary">{{trans('diamondSearch.Color')}}</a>
              <a  class="hover:text-blue-600" @click="selectDisplayColumn('color')">

               <button class="btn btn-outline" v-if="query.search_conditions.color[0].clicked" type="button" @click="toggleValue(query.search_conditions.color[0].clicked,'color', 0)" > 
              D
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[1].clicked" type="button" @click="toggleValue(query.search_conditions.color[1].clicked,'color', 1)" > 
              E
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[2].clicked" type="button" @click="toggleValue(query.search_conditions.color[2].clicked,'color', 2)" > 
              F
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[3].clicked" type="button" @click="toggleValue(query.search_conditions.color[3].clicked,'color', 3)" > 
              G
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[4].clicked" type="button" @click="toggleValue(query.search_conditions.color[4].clicked,'color', 4)" > 
              H
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[5].clicked" type="button" @click="toggleValue(query.search_conditions.color[5].clicked,'color', 5)" > 
              I
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[6].clicked" type="button" @click="toggleValue(query.search_conditions.color[6].clicked,'color', 6)" > 
              J
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[7].clicked" type="button" @click="toggleValue(query.search_conditions.color[7].clicked,'color', 7)" > 
              K
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[8].clicked" type="button" @click="toggleValue(query.search_conditions.color[8].clicked,'color', 8)" > 
              L
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.color[9].clicked" type="button" @click="toggleValue(query.search_conditions.color[9].clicked,'color', 9)" > 
              M
              </button>

             </a>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="level"  v-if="displayColumn == 'color' ">

              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[0].clicked} " type="button" @click="toggleValue(query.search_conditions.color[0].clicked,'color', 0)" > 
              D
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[1].clicked} " type="button" @click="toggleValue(query.search_conditions.color[1].clicked,'color', 1)" > 
              E
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[2].clicked} " type="button" @click="toggleValue(query.search_conditions.color[2].clicked,'color', 2)" > 
              F
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[3].clicked} " type="button" @click="toggleValue(query.search_conditions.color[3].clicked,'color', 3)" > 
              G
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[4].clicked} " type="button" @click="toggleValue(query.search_conditions.color[4].clicked,'color', 4)" > 
              H
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[5].clicked} " type="button" @click="toggleValue(query.search_conditions.color[5].clicked,'color', 5)" > 
              I
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[6].clicked} " type="button" @click="toggleValue(query.search_conditions.color[6].clicked,'color', 6)" > 
              J
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[7].clicked} " type="button" @click="toggleValue(query.search_conditions.color[7].clicked,'color', 7)" > 
              K
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[8].clicked} " type="button" @click="toggleValue(query.search_conditions.color[8].clicked,'color', 8)" > 
              L
              </button>
              <button  class="btn btn-outline" :class=" {' active' : query.search_conditions.color[9].clicked} " type="button" @click="toggleValue(query.search_conditions.color[9].clicked,'color', 9)" > 
              M
              </button>

          </div>  
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('clarity')">
            <a class="is-primary">{{trans('diamondSearch.Clarity')}}</a>

               <button class="btn btn-outline" v-if="query.search_conditions.clarity[0].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[0].clicked,'clarity', 0)" > 
              FL
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[1].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[1].clicked,'clarity', 1)" > 
              IF
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[2].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[2].clicked,'clarity', 2)" > 
              VVS1
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[3].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[3].clicked,'clarity', 3)" > 
              VVS2
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[4].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[4].clicked,'clarity', 4)" > 
              VS1
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[5].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[5].clicked,'clarity', 5)" > 
              VS2
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[6].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[6].clicked,'clarity', 6)" > 
              SI1
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[7].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[7].clicked,'clarity', 7)" > 
              SI2
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.clarity[8].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[8].clicked,'clarity', 8)" > 
              I1
              </button>

              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'clarity' ">

              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[0].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[0].clicked,'clarity', 0)" > 
              FL
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[1].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[1].clicked,'clarity', 1)" > 
              IF
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[2].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[2].clicked,'clarity', 2)" > 
              VVS1
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[3].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[3].clicked,'clarity', 3)" > 
              VVS2
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[4].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[4].clicked,'clarity', 4)" > 
              VS1
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[5].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[5].clicked,'clarity', 5)" > 
              VS2
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[6].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[6].clicked,'clarity', 6)" > 
              SI1
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[7].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[7].clicked,'clarity', 7)" > 
              SI2
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.clarity[8].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[8].clicked,'clarity', 8)" > 
              I1
              </button>

          </div>
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('cut')">
              <a class="is-primary">{{trans('diamondSearch.Cut')}}</a>

               <button class="btn btn-outline" v-if="query.search_conditions.cut[0].clicked" type="button" @click="toggleValue(query.search_conditions.cut[0].clicked,'cut', 0)" > 
              Excellent
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.cut[1].clicked" type="button" @click="toggleValue(query.search_conditions.cut[1].clicked,'cut', 1)" > 
              Very Good
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.cut[2].clicked" type="button" @click="toggleValue(query.search_conditions.cut[2].clicked,'cut', 2)" > 
              Good
              </button>

              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'cut' ">

              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.cut[0].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[0].clicked,'cut', 0)" > 
              Excellent
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.cut[1].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[1].clicked,'cut', 1)" > 
              Very Good
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.cut[2].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[2].clicked,'cut', 2)" > 
              Good
              </button>

          </div>    
        </div>
        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" @click="selectDisplayColumn('polish')">
              <a class="is-primary">{{trans('diamondSearch.Polish')}}</a>

               <button class="btn btn-outline" v-if="query.search_conditions.polish[0].clicked" type="button" @click="toggleValue(query.search_conditions.polish[0].clicked,'polish', 0)" > 
              Excellent
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.polish[1].clicked" type="button" @click="toggleValue(query.search_conditions.polish[1].clicked,'polish', 1)" > 
              Very Good
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.polish[2].clicked" type="button" @click="toggleValue(query.search_conditions.polish[2].clicked,'polish', 2)" > 
              Good
              </button>

              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'polish' ">

              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.polish[0].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[0].clicked,'polish', 0)" > 
              Excellent
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.polish[1].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[1].clicked,'polish', 1)" > 
              Very Good
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.polish[2].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[2].clicked,'polish', 2)" > 
              Good
              </button>

          </div>   
        </div>
        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" @click="selectDisplayColumn('symmetry')">
              <a class="is-primary">{{trans('diamondSearch.Symmetry')}}</a>

               <button class="btn btn-outline" v-if="query.search_conditions.symmetry[0].clicked" type="button" @click="toggleValue(query.search_conditions.symmetry[0].clicked,'symmetry', 0)"> 
              Excellent
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.symmetry[1].clicked" type="button" @click="toggleValue(query.search_conditions.symmetry[1].clicked,'symmetry', 1)"> 
              Very Good
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.symmetry[2].clicked" type="button" @click="toggleValue(query.search_conditions.symmetry[2].clicked,'symmetry', 2)"> 
              Good
              </button>

              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'symmetry' ">

              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.symmetry[0].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[0].clicked,'symmetry', 0)" > 
              Excellent
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.symmetry[1].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[1].clicked,'symmetry', 1)" > 
              Very Good
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.symmetry[2].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[2].clicked,'symmetry', 2)" > 
              Good
              </button>

          </div>     
        </div>
        <div class="border border-gray-300 p-2 mx-1">
           <div class="hover:text-blue-600" @click="selectDisplayColumn('fluorescence')">
              <a class="is-primary">{{trans('diamondSearch.Fluorescence')}}</a>

               <button class="btn btn-outline" v-if="query.search_conditions.fluorescence[0].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[0].clicked,'fluorescence', 0)" > 
               {{trans('diamondSearch.None')}}
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.fluorescence[1].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[1].clicked,'fluorescence', 1)" > 
               {{trans('diamondSearch.Faint')}}
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.fluorescence[2].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[2].clicked,'fluorescence', 2)" > 
               {{trans('diamondSearch.Medium')}}
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.fluorescence[3].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[3].clicked,'fluorescence', 3)" > 
               {{trans('diamondSearch.Strong')}}
              </button>
               <button class="btn btn-outline" v-if="query.search_conditions.fluorescence[4].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[4].clicked,'fluorescence', 4)" > 
               {{trans('diamondSearch.Very Strong')}}
              </button>

              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'fluorescence' ">

              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.fluorescence[0].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[0].clicked,'fluorescence', 0)" > 
               {{trans('diamondSearch.None')}}
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.fluorescence[1].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[1].clicked,'fluorescence', 1)" > 
               {{trans('diamondSearch.Faint')}}
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.fluorescence[2].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[2].clicked,'fluorescence', 2)" > 
               {{trans('diamondSearch.Medium')}}
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.fluorescence[3].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[3].clicked,'fluorescence', 3)" > 
               {{trans('diamondSearch.Strong')}}
              </button>
              <button class="btn btn-outline" :class=" {' active' : query.search_conditions.fluorescence[4].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[4].clicked,'fluorescence', 4)" > 
               {{trans('diamondSearch.Very Strong')}}
              </button>

          </div>  
        </div>


      <ul class="flex border-b justify-center mt-2">
         <li class="-mb-px mr-1">
          <a class="bg-white hover:text-blue-600 inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 font-semibold"  @click="showAdvance=!showAdvance" >{{ __('diamondSearch.More Advance') }}</a>
        </li>
      </ul>


      <div v-if="showAdvance">
        
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('crownAngle')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.crownAngle[1] != 0}" @click="fetchData.crownAngle = [0,0]">{{trans('diamondSearch.Crown Angle')}}</p>
               <button class="btn btn-outline"> @{{fetchData.crownAngle[0]}}°- @{{fetchData.crownAngle[1]}}°</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'crownAngle' " @click="addAdvanceSearch('crownAngle')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.crownAngle[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.crownAngle[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('parvilionAngle')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.parvilionAngle[1] != 0}" @click="fetchData.parvilionAngle = [0,0]">{{trans('diamondSearch.Parvilion Angle')}}</p>
               <button class="btn btn-outline"> @{{fetchData.parvilionAngle[0]}}°- @{{fetchData.parvilionAngle[1]}}°</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'parvilionAngle' " @click="addAdvanceSearch('parvilionAngle')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('tablePercent')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.tablePercent[1] != 0}" @click="fetchData.tablePercent = [0,0]">{{trans('diamondSearch.Table Percent')}}</p>
               <button class="btn btn-outline"> @{{fetchData.tablePercent[0]}}% - @{{fetchData.tablePercent[1]}}% </button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'tablePercent' " @click="addAdvanceSearch('tablePercent')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.tablePercent[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.tablePercent[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('depthPercent')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.depthPercent[1] != 0}" @click="fetchData.depthPercent = [0,0]">{{trans('diamondSearch.Depth Percent')}}</p>
               <button class="btn btn-outline"> @{{fetchData.depthPercent[0]}}% - @{{fetchData.depthPercent[1]}}% </button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'depthPercent' " @click="addAdvanceSearch('depthPercent')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('length')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.length[1] != 0}" @click="fetchData.length = [0,0]">{{trans('diamondSearch.Length')}}</p>
               <button class="btn btn-outline"> @{{fetchData.length[0]}}mm- @{{fetchData.length[1]}}mm</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'length' " @click="addAdvanceSearch('length')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.length[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.length[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('width')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.width[1] != 0}" @click="fetchData.width = [0,0]">{{trans('diamondSearch.Width')}}</p>
               <button class="btn btn-outline"> @{{fetchData.width[0]}}mm- @{{fetchData.width[1]}}mm</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'width' " @click="addAdvanceSearch('width')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.width[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.width[1] " @focus="$event.target.select()">       
          </div> 
        </div>
        <div class="border border-gray-300 p-2 mx-1">
          <div class="hover:text-blue-600" @click="selectDisplayColumn('depth')">
              <p  class="btn " :class="{'btn-outline-secondary ': fetchData.depth[1] != 0}" @click="fetchData.depth = [0,0]">{{trans('diamondSearch.Depth')}}</p>
               <button class="btn btn-outline"> @{{fetchData.depth[0]}}mm- @{{fetchData.depth[1]}}mm</button>
              <i class="fas fa-chevron-down"></i>
          </div>

          <div class="level"  v-if="displayColumn == 'depth' " @click="addAdvanceSearch('depth')">
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depth[0] " @focus="$event.target.select()">

              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depth[1] " @focus="$event.target.select()">       
          </div> 
        </div>

      </div>  

</div>  







