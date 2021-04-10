<div class="grid grid-cols-12 p-2 pt-4">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Price')}}</p>        
      </div>
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[0]" @focus="$event.target.select()" placeholder="HKD$">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[1]" @focus="$event.target.select()" placeholder="HKD$">
      </div>
    </div>

  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Weight')}}</p>
      </div>         
      <div class="col-span-5 mx-8">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[0]" @focus="$event.target.select()" placeholder="ct">
      </div>
      <div class="col-span-5">
          <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[1]" @focus="$event.target.select()" placeholder="ct">
      </div>
    </div>
  </div>
</div>


<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Shape')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">
          <div class="p-2" @click="toggleValue(query.search_conditions.shape[0].clicked,'shape', 0)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Round.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[0].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[1].clicked,'shape', 1)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Pear.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[1].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[2].clicked,'shape', 2)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Emerald.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[2].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[3].clicked,'shape', 3)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Princess.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[3].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[4].clicked,'shape', 4)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Marquise.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[4].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[5].clicked,'shape', 5)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Cushion.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[5].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[6].clicked,'shape', 6)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Asscher.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[6].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[7].clicked,'shape', 7)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Oval.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[7].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[8].clicked,'shape', 8)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Heart.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[8].clicked} "></div>
          </div>
          <div class="p-2"@click="toggleValue(query.search_conditions.shape[9].clicked,'shape', 9)">
            <img class="h-8" src="/images/front-end/diamond_shapes/Radiant.png" alt="">
            <div class="border-2 border-gray-600 mt-2" :class=" {'border-yellow-600' : query.search_conditions.shape[9].clicked} "></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap">
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">0.3-0.49</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">0.5-0.79</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">0.8-0.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">1.0-1.19</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">1.2-1.49</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">1.5-1.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">2.0-2.99</a>
          </div>
          <div class="m-2 bg-yellow-600 rounded">
            <a class="mx-1 text-white text-xs" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
            3.0 up</a>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Color')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          <div class="p-2" @click="toggleValue(query.search_conditions.color[0].clicked,'color', 0)"> 
                    D
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[1].clicked,'color', 1)"> 
                    E
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[2].clicked,'color', 2)"> 
                    F
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[2].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[3].clicked,'color', 3)"> 
                    G
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[3].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[4].clicked,'color', 4)"> 
                    H
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[4].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[5].clicked,'color', 5)"> 
                    I
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[5].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[6].clicked,'color', 6)"> 
                    J
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[6].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[7].clicked,'color', 7)"> 
                    K
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[7].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[8].clicked,'color', 8)"> 
                    L
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[8].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.color[9].clicked,'color', 9)"> 
                    M
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.color[9].clicked} "></div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Cut')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">
          <div class="p-2" @click="toggleValue(query.search_conditions.cut[0].clicked,'cut', 0)" > 
                    Excellent
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.cut[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.cut[1].clicked,'cut', 1)" > 
                    Very Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.cut[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.cut[2].clicked,'cut', 2)" > 
                    Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.cut[2].clicked} "></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Clarity')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[0].clicked,'clarity', 0)" > 
                      FL
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[1].clicked,'clarity', 1)"> 
                      IF
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[2].clicked,'clarity', 2)" > 
                      VVS1
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[2].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[3].clicked,'clarity', 3)"> 
                      VVS2
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[3].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[4].clicked,'clarity', 4)"> 
                      VS1
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[4].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[5].clicked,'clarity', 5)"> 
                      VS2
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[5].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[6].clicked,'clarity', 6)"> 
                      SI1
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[6].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[7].clicked,'clarity', 7)"> 
                      SI2
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[7].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.clarity[8].clicked,'clarity', 8)"> 
                    I1
            <div class="border-2 border-gray-600 px-4" :class=" {'border-yellow-600' : query.search_conditions.clarity[8].clicked} "></div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Polish')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">
          <div class="p-2" @click="toggleValue(query.search_conditions.polish[0].clicked,'polish', 0)" > 
                    Excellent
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.polish[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.polish[1].clicked,'polish', 1)" > 
                    Very Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.polish[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.polish[2].clicked,'polish', 2)" > 
                    Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.polish[2].clicked} "></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>



<div class="grid grid-cols-12 p-2">
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Fluorescence')}}</p>
      </div>
      <div class="col-span-10 mx-8">
        <div class="flex justify-between flex-wrap text-center">
          <div class="p-2" @click="toggleValue(query.search_conditions.fluorescence[0].clicked,'fluorescence', 0)" > 
                       {{trans('diamondSearch.None')}}
            <div class="border-2 border-gray-600 px-8" :class=" {'border-yellow-600' : query.search_conditions.fluorescence[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.fluorescence[1].clicked,'fluorescence', 1)"> 
                       {{trans('diamondSearch.Faint')}}
            <div class="border-2 border-gray-600 px-8" :class=" {'border-yellow-600' : query.search_conditions.fluorescence[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.fluorescence[2].clicked,'fluorescence', 2)" > 
                       {{trans('diamondSearch.Medium')}}
            <div class="border-2 border-gray-600 px-8" :class=" {'border-yellow-600' : query.search_conditions.fluorescence[2].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.fluorescence[3].clicked,'fluorescence', 3)"> 
                       {{trans('diamondSearch.Strong')}}
            <div class="border-2 border-gray-600 px-8" :class=" {'border-yellow-600' : query.search_conditions.fluorescence[3].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.fluorescence[4].clicked,'fluorescence', 4)"> 
                       {{trans('diamondSearch.Very Strong')}}
            <div class="border-2 border-gray-600 px-8" :class=" {'border-yellow-600' : query.search_conditions.fluorescence[4].clicked} "></div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="col-span-6">
    <div class="grid grid-cols-12 items-center">
      <div class="col-span-2 mx-8 font-light text-lg">
        <p>{{trans('diamondSearch.Symmetry')}}</p>
      </div>         
      <div class="col-span-10 mx-8">
        <div class="flex justify-between text-center flex-wrap">
          <div class="p-2" @click="toggleValue(query.search_conditions.symmetry[0].clicked,'symmetry', 0)" > 
                    Excellent
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.symmetry[0].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.symmetry[1].clicked,'symmetry', 1)" > 
                    Very Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.symmetry[1].clicked} "></div>
          </div>
          <div class="p-2" @click="toggleValue(query.search_conditions.symmetry[2].clicked,'symmetry', 2)" > 
                    Good
            <div class="border-2 border-gray-600 px-12" :class=" {'border-yellow-600' : query.search_conditions.symmetry[2].clicked} "></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<ul class="flex border-b justify-center mt-2">
   <li class="-mb-px mr-1">
    <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-gray-700 hover:text-gray-900 hover:bg-gray-200 font-semibold"  @click="showAdvance=!showAdvance" >{{ __('diamondSearch.More Advance') }}</a>
  </li>
</ul>


<div v-if="showAdvance">


  <div class="grid grid-cols-12 text-center p-2">
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.crownAngle = [0,0]">
          <p :class="{'btn btn-yellow ': fetchData.crownAngle[1] != 0}">{{trans('diamondSearch.Crown Angle')}}</p>
        </div>   
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('crownAngle')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.crownAngle[0] " @focus="$event.target.select()" placeholder="">            
            </div>
            <div class="col-span-6">
              {{trans('diamondSearch.Max')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.crownAngle[1] " @focus="$event.target.select()" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.parvilionAngle = [0,0]">
          <p :class="{'btn btn-yellow ': fetchData.parvilionAngle[1] != 0}">{{trans('diamondSearch.Parvilion Angle')}}</p>
        </div>
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('parvilionAngle')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[0] " @focus="$event.target.select()" placeholder=""> 
            </div>         
            <div class="col-span-6">
            {{trans('diamondSearch.Max')}}
            <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[1] " @focus="$event.target.select()" placeholder="">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="grid grid-cols-12 text-center p-2">
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.tablePercent = [0,0]">
          <p :class="{'btn btn-yellow ': fetchData.tablePercent[1] != 0}">{{trans('diamondSearch.Table Percent')}}</p>
        </div>   
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('tablePercent')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.tablePercent[0] " @focus="$event.target.select()" placeholder="">            
            </div>
            <div class="col-span-6">
              {{trans('diamondSearch.Max')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.tablePercent[1] " @focus="$event.target.select()" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.depthPercent = [0,0]">
          <p :class="{'btn btn-yellow ': fetchData.depthPercent[1] != 0}">{{trans('diamondSearch.Depth Percent')}}</p>
        </div>
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('depthPercent')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[0] " @focus="$event.target.select()" placeholder=""> 
            </div>         
            <div class="col-span-6">
            {{trans('diamondSearch.Max')}}
            <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[1] " @focus="$event.target.select()" placeholder="">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="grid grid-cols-12 text-center p-2">
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.length = [0,0]">
          <p class="px-2" :class="{'btn btn-yellow ': fetchData.length[1] != 0}">{{trans('diamondSearch.Length')}}</p>
        </div>   
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('length')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.length[0] " @focus="$event.target.select()" placeholder="">            
            </div>
            <div class="col-span-6">
              {{trans('diamondSearch.Max')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.length[1] " @focus="$event.target.select()" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.width = [0,0]">
          <p class="px-2" :class="{'btn btn-yellow ': fetchData.width[1] != 0}">{{trans('diamondSearch.Width')}}</p>
        </div>
        <div class="col-span-10 mx-8">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('width')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.width[0] " @focus="$event.target.select()" placeholder=""> 
            </div>         
            <div class="col-span-6">
            {{trans('diamondSearch.Max')}}
            <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.width[1] " @focus="$event.target.select()" placeholder="">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-12 text-center p-2">
    <div class="col-span-6 border border-gray-400 mx-1">
      <div class="grid grid-cols-12 items-center">
        <div class="col-span-2" @click="fetchData.depth = [0,0]">
          <p class="px-2" :class="{'btn btn-yellow ': fetchData.depth[1] != 0}">{{trans('diamondSearch.Depth')}}</p>
        </div>   
        <div class="col-span-10 mx-4">
          <div class="grid grid-cols-12 items-center"  @click="addAdvanceSearch('depth')">
            <div class="col-span-6">
              {{trans('diamondSearch.Min')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depth[0] " @focus="$event.target.select()" placeholder="">            
            </div>
            <div class="col-span-6">
              {{trans('diamondSearch.Max')}}
              <input class="input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depth[1] " @focus="$event.target.select()" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-span-6">
      
    </div>
  </div>

</div>






