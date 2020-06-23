<div class="section-3 d-none d-sm-block">
  <div class="row">

    <div class="col-12 gg-sec-2 margin-top-20">
      <div class="grad-block">
        <div class="row">
          
          <div class="col-1 text-center">
            <div class="grad-img-gg">
              <p>{{trans('diamondSearch.Price')}}</p>
            </div>
          </div>
          <div class="col-11">
            <div class="row">
              <div class="col-6">
                <div class="block">
                  <div class="grad-input">
                    <label>HKD$</label>
                    <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[0]" @focus="$event.target.select()">
                  </div>
                  <div class="grad-input pull-right">
                    <label>HKD$</label>
                    <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[1]" @focus="$event.target.select()" >
                  </div>
                </div>

<!--                 <div class="block-bar">
                  <div class="block-bar-line"></div>
                </div>
 -->
              </div>
              <div class="col-1 para-block">
                <p>{{trans('diamondSearch.Weight')}}</p>
              </div>
              <div class="col-5">
                <div class="block gg">
                  <div class="grad-input">
                    <label>ct</label>
                    <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[0]" @focus="$event.target.select()">
                  </div>
                  <div class="grad-input pull-right">
                    <label>ct</label>
                    <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[1]" @focus="$event.target.select()" >
                  </div>
                </div>

<!--                 <div class="block-bar gg">
                  <div class="block-bar-line"></div>  
                </div> -->
                     
  <!--               <div class="block-btn-bar">
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">0.3-0.49</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">0.5-0.79</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">0.8-0.99</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">1.0-1.19</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">1.2-1.49</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">1.5-1.99</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">2.0-2.99</a>
                  </div>
                  <div class="block-btn-item active">
                    <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
                    3.0 up</a>  
                  </div>
                </div> -->

              </div>
            </div>
          </div>

        <div class="col-1 margin-top-20 text-center">
          <div class="grad-img-gg">
            <p>{{trans('diamondSearch.Shape')}}</p>
          </div>
        </div>
        <div class="col-11 margin-top-20">
          <div class="row">
            <div class="col-6">
              <div class="block">
                <div class="block-3-item">
                  <div class="grad-img" v-for="(value, index) in query.search_conditions.shape" class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[index].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[index].clicked,'shape', index)">
                    <img class="img-fluid" :src="'/images/front-end/diamond_shapes/'+query.search_conditions.shape[index].description + '.png'" alt="">
                    <div class="grad-line"></div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-1 para-block">
                <p></p>
              </div>
              <div class="col-5">
                <div class="row">
                     <div class="block-btn-bar">
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight">0.3-0.49</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight">0.5-0.79</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight">0.8-0.99</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight">1.0-1.19</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight">1.2-1.49</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight">1.5-1.99</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight">2.0-2.99</a>
                      </div>
                      <div class="block-btn-item active">
                        <a class="text-white" href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight">
                        3.0 up</a>  
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-1 margin-top-20 text-center">
            <div class="grad-img-gg">
              <p>{{trans('diamondSearch.Color')}}</p>
            </div>
          </div>
          <div class="col-11 margin-top-20">
            <div class="row">
              <div class="col-6">
                <div class="block">
                  <div class="block-3-item">
                    <div  v-for="(value, index) in query.search_conditions.color" class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[index].clicked} "  @click="toggleValue(query.search_conditions.color[index].clicked,'color', index)" :value="query.search_conditions.color[index].description"> 
                    @{{query.search_conditions.color[index].description}}
                      <div class="block-3-item-bar"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-1 para-block">
                <p>{{trans('diamondSearch.Cut')}}</p>
              </div>
              <div class="col-5">
                <div class="row">
                  <div class="col-4 grade-box" v-for="(value, index) in query.search_conditions.cut " :class=" {' active' : query.search_conditions.cut[index].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[index].clicked,'cut', index)" :value="query.search_conditions.cut[index].description"> 
                    @{{query.search_conditions.cut[index].description}}
                    <div class="grade-line"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-1 margin-top-20 text-center">
            <div class="grad-img-gg">
              <p>{{trans('diamondSearch.Clarity')}}</p>
            </div>
          </div>
          <div class="col-11 margin-top-20">
            <div class="row">
              <div class="col-6">
                <div class="block">
                  <div class="block-3-item sec-3-div">

                    <div class="block-3-item-div p-6" v-for="(value, index) in query.search_conditions.clarity " :class=" {' active' : query.search_conditions.clarity[index].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[index].clicked,'clarity', index)" :value="query.search_conditions.clarity[index].description"> 
                    @{{query.search_conditions.clarity[index].description}}
                      <div class="block-3-item-bar"></div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-1 para-block">
                <p>{{trans('diamondSearch.Polish')}}</p>
              </div>
              <div class="col-5">
                <div class="row">
                  <div class="col-4 grade-box" v-for="(value, index) in query.search_conditions.polish"  :class=" {' active' : query.search_conditions.polish[index].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[index].clicked,'polish', index)" :value="query.search_conditions.polish[index].description"> 
                    @{{query.search_conditions.polish[index].description}}
                    <div class="grade-line"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-1 margin-top-20 text-center">
            <div class="grad-img-gg">
              <p>{{trans('diamondSearch.Fluorescence')}}</p>
            </div>
          </div>
          <div class="col-11 margin-top-20">
            <div class="row">
              <div class="col-6">
                <div class="block">
                  <div class="block-3-item sec-4-div">
                    <div class="block-3-item-div p-6" v-for="(value, index) in query.search_conditions.fluorescence ":class=" {' active' : query.search_conditions.fluorescence[index].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[index].clicked,'fluorescence', index)" :value="query.search_conditions.fluorescence[index].description |transJs(langs,locale)"> 
                        @{{query.search_conditions.fluorescence[index].description |transJs(langs,locale)}}
                      <div class="block-3-item-bar"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-1 para-block">
                <p>{{trans('diamondSearch.Symmetry')}}</p>
              </div>
              <div class="col-5">
                <div class="row">
                  <div class="col-4 grade-box" v-for="(value, index) in query.search_conditions.symmetry "  :class=" {' active' : query.search_conditions.symmetry[index].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[index].clicked,'symmetry', index)" :value="query.search_conditions.symmetry[index].description"> 
                    @{{query.search_conditions.symmetry[index].description}}
                    <div class="grade-line"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>  
      </div>
    </div>

  </div>
</div>



<!--     <ul class="nav nav-tabs justify-content-center pt-10">
      <li class="nav-item">
        <a class="nav-link active" @click="showAdvance=!showAdvance" >{{ __('diamondSearch.More Advance') }}</a>
      </li>
    </ul>
    <hr>
    <button>sdf</button>
    <div v-if="showAdvance">
      hi
    </div>
 -->



<!-- 
<div class="d-none d-sm-block">
    <div class="row">
        <div class="col-4">
            <h4>{{trans('diamondSearch.Shape')}}</h4>
            <button v-for="(value, index) in query.search_conditions.shape" class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[index].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[index].clicked,'shape', index)"><img :src="'/images/front-end/diamond_shapes/'+query.search_conditions.shape[index].description + '.png'" height="20" width="20"></button>
        </div>
        <div class="col-4">
            <div><h4 class="subtitle is-6">{{trans('diamondSearch.Price')}}</h4></div>
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <input class="form-control" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[0]" @focus="$event.target.select()">
                </div>
                <div class="col-md-auto">
                    <input class="form-control" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[1]" @focus="$event.target.select()">
                </div>
            </div>  


        </div>
        <div class="col-4">
            <div><h4 class="subtitle is-6"> {{trans('diamondSearch.Weight')}} </h4></div>
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <input class="form-control" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[0]" @focus="$event.target.select()">
                </div>
                <div class="col-md-auto">
                    <input class="form-control" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[1]" @focus="$event.target.select()">    
                </div>
            </div>  
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-30-0-49-carat-weight" class="badge badge-primary">0.3-0.49</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-50-0-79-carat-weight" class="badge badge-primary">0.5-0.79</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/0-80-0-99-carat-weight" class="badge badge-primary">0.8-0.99</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-00-1-19-carat-weight" class="badge badge-primary">1.0-1.19</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-20-1-49-carat-weight" class="badge badge-primary">1.2-1.49</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/1-50-1-99-carat-weight" class="badge badge-primary">1.5-1.99</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/2-00-2-99-carat-weight" class="badge badge-primary">2.0-2.99</a>
            <a href="{{url(app()->getLocale())}}/gia-loose-diamonds/round-cut/3-00-up-carat-weight" class="badge badge-primary">3.0 up</a>   
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-4">
            <h4>{{trans('diamondSearch.Color')}}</h4>
            <button v-for="(value, index) in query.search_conditions.color" class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.color[index].clicked} " type="button" @click="toggleValue(query.search_conditions.color[index].clicked,'color', index)" :value="query.search_conditions.color[index].description"> 
            @{{query.search_conditions.color[index].description}}
            </button>
        </div>
        <div class="col-4">
            <h4>{{trans('diamondSearch.Clarity')}}</h4>
            <button v-for="(value, index) in query.search_conditions.clarity " class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.clarity[index].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[index].clicked,'clarity', index)" :value="query.search_conditions.clarity[index].description"> 
            @{{query.search_conditions.clarity[index].description}}
            </button>
        </div>
        <div class="col-4">
            <h4>{{trans('diamondSearch.Cut')}}</h4>
            <button v-for="(value, index) in query.search_conditions.cut " class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.cut[index].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[index].clicked,'cut', index)" :value="query.search_conditions.cut[index].description"> 
            @{{query.search_conditions.cut[index].description}}
            </button>        
        </div>
    </div>

    <br>

    <div class="row">
            <div class="col-4">
                <h4>{{trans('diamondSearch.Polish')}}</h4>
                <button v-for="(value, index) in query.search_conditions.polish" class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.polish[index].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[index].clicked,'polish', index)" :value="query.search_conditions.polish[index].description"> 
                @{{query.search_conditions.polish[index].description}}
                </button>
            </div>
            <div class="col-4">
                <h4>{{trans('diamondSearch.Symmetry')}}</h4>
                <button v-for="(value, index) in query.search_conditions.symmetry " class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.symmetry[index].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[index].clicked,'symmetry', index)" :value="query.search_conditions.symmetry[index].description"> 
                @{{query.search_conditions.symmetry[index].description}}
                </button>
            </div>
            <div class="col-4">
                <h4>{{trans('diamondSearch.Fluorescence')}}</h4>
                <button v-for="(value, index) in query.search_conditions.fluorescence " class="btn btn-outline-secondary " :class=" {' active' : query.search_conditions.fluorescence[index].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[index].clicked,'fluorescence', index)" :value="query.search_conditions.fluorescence[index].description |transJs(langs,locale)"> 
                @{{query.search_conditions.fluorescence[index].description |transJs(langs,locale)}}
                </button>
            </div>    
    </div> 

</div> -->


    <div class="d-sm-none d-block">

        <ul class="list-group">
          <li class="list-group-item">
             <div  @click="selectDisplayColumn('shape')">
                <a class="is-primary">{{trans('diamondSearch.Shape')}}</a>
                <a  @click="selectDisplayColumn('shape')">
                    <button v-for="(value, index) in query.search_conditions.shape" class="btn btn-outline-secondary is-small" v-if=" query.search_conditions.shape[index].clicked" type="button" @click="toggleValue(query.search_conditions.shape[index].clicked,'shape', index)">
                            <img :src="'/images/front-end/diamond_shapes/'+query.search_conditions.shape[index].description + '.png'" height="20" width="20">
                    </button>
                </a>
                <i class="fas fa-chevron-down"></i>
            </div>

            <div v-if="displayColumn == 'shape' ">
                <button v-for="(value, index) in query.search_conditions.shape" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.shape[index].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[index].clicked,'shape', index)"><img :src="'/images/front-end/diamond_shapes/'+query.search_conditions.shape[index].description + '.png'" height="20" width="20"></button>
            </div>
          </li>
          <li class="list-group-item">
            <div @click="selectDisplayColumn('price')">
                <a class="is-primary">{{trans('diamondSearch.Price')}} </a>
                 <button class="btn btn-outline-secondary is-small"> @{{fetchData.priceRange[0]}} - @{{fetchData.priceRange[1]}} </button> 
                <i class="fas fa-chevron-down"></i> 
            </div>

            <div class="level"  v-if="displayColumn == 'price' ">
                <input class="form-control is-small" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[0]" @focus="$event.target.select()">

                <input class="form-control is-small" type="text" @keyup="fetchIndexData()" v-model="fetchData.priceRange[1]" @focus="$event.target.select()">
            </div> 
          </li>
          <li class="list-group-item">
            <div @click="selectDisplayColumn('weight')">
                <a class="is-primary">{{trans('diamondSearch.Weight')}}</a>
                 <button class="btn btn-outline-secondary is-small"> @{{fetchData.weight[0]}} - @{{fetchData.weight[1]}} </button>
                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="level"  v-if="displayColumn == 'weight' ">
                <input class="form-control is-small" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[0]" @focus="$event.target.select()">

                <input class="form-control is-small" type="text" @keyup="fetchIndexData()" v-model="fetchData.weight[1]" @focus="$event.target.select()">       
            </div> 
          </li>
          <li class="list-group-item">
            <div @click="selectDisplayColumn('color')">
                            <a class="is-primary">{{trans('diamondSearch.Color')}}</a>
                            <a  @click="selectDisplayColumn('color')">
                             <button v-for="(value, index) in query.search_conditions.color" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.color[index].clicked" type="button" @click="toggleValue(query.search_conditions.color[index].clicked,'color', index)" :value="query.search_conditions.color[index].description"> 
                            @{{query.search_conditions.color[index].description}}
                            </button>
                            </a>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'color' ">
                            <button v-for="(value, index) in query.search_conditions.color" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.color[index].clicked} " type="button" @click="toggleValue(query.search_conditions.color[index].clicked,'color', index)" :value="query.search_conditions.color[index].description"> 
                            @{{query.search_conditions.color[index].description}}
                            </button>
     
                        </div>  
          </li>
          <li class="list-group-item">
            <div @click="selectDisplayColumn('clarity')">
                            <a class="is-primary">{{trans('diamondSearch.Clarity')}}</a>
                             <button v-for="(value, index) in query.search_conditions.clarity" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.clarity[index].clicked" type="button" @click="toggleValue(query.search_conditions.clarity[index].clicked,'clarity', index)" :value="query.search_conditions.clarity[index].description"> 
                            @{{query.search_conditions.clarity[index].description}}
                            </button>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'clarity' ">
                            <button v-for="(value, index) in query.search_conditions.clarity " class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.clarity[index].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[index].clicked,'clarity', index)" :value="query.search_conditions.clarity[index].description"> 
                            @{{query.search_conditions.clarity[index].description}}
                            </button>
     
                        </div>
          </li>
          <li class="list-group-item">
            <div @click="selectDisplayColumn('cut')">
                            <a class="is-primary">{{trans('diamondSearch.Cut')}}</a>
                             <button v-for="(value, index) in query.search_conditions.cut" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.cut[index].clicked" type="button" @click="toggleValue(query.search_conditions.cut[index].clicked,'cut', index)" :value="query.search_conditions.cut[index].description"> 
                            @{{query.search_conditions.cut[index].description}}
                            </button>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'cut' ">
                            <button v-for="(value, index) in query.search_conditions.cut " class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.cut[index].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[index].clicked,'cut', index)" :value="query.search_conditions.cut[index].description"> 
                            @{{query.search_conditions.cut[index].description}}
                            </button>
     
                        </div>    
          </li>
          <li class="list-group-item">
             <div @click="selectDisplayColumn('polish')">
                            <a class="is-primary">{{trans('diamondSearch.Polish')}}</a>
                             <button v-for="(value, index) in query.search_conditions.polish" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.polish[index].clicked" type="button" @click="toggleValue(query.search_conditions.polish[index].clicked,'polish', index)" :value="query.search_conditions.polish[index].description"> 
                            @{{query.search_conditions.polish[index].description}}
                            </button>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'polish' ">
                            <button v-for="(value, index) in query.search_conditions.polish" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.polish[index].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[index].clicked,'polish', index)" :value="query.search_conditions.polish[index].description"> 
                            @{{query.search_conditions.polish[index].description}}
                            </button>
     
                        </div>   
          </li>
          <li class="list-group-item">
             <div @click="selectDisplayColumn('symmetry')">
                            <a class="is-primary">{{trans('diamondSearch.Symmetry')}}</a>
                             <button v-for="(value, index) in query.search_conditions.symmetry" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.symmetry[index].clicked" type="button" @click="toggleValue(query.search_conditions.symmetry[index].clicked,'symmetry', index)" :value="query.search_conditions.symmetry[index].description"> 
                            @{{query.search_conditions.symmetry[index].description}}
                            </button>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'symmetry' ">
                            <button v-for="(value, index) in query.search_conditions.symmetry" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.symmetry[index].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[index].clicked,'symmetry', index)" :value="query.search_conditions.symmetry[index].description"> 
                            @{{query.search_conditions.symmetry[index].description}}
                            </button>
     
                        </div>     
          </li>
          <li class="list-group-item">
             <div @click="selectDisplayColumn('fluorescence')">
                            <a class="is-primary">{{trans('diamondSearch.Fluorescence')}}</a>
                             <button v-for="(value, index) in query.search_conditions.fluorescence" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.fluorescence[index].clicked" type="button" @click="toggleValue(query.search_conditions.fluorescence[index].clicked,'fluorescence', index)" :value="query.search_conditions.fluorescence[index].description"> 
                            @{{query.search_conditions.fluorescence[index].description}}
                            </button>

                            <i class="fas fa-chevron-down"></i>
                        </div>

                        <div class="level"  v-if="displayColumn == 'fluorescence' ">
                            <button v-for="(value, index) in query.search_conditions.fluorescence" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.fluorescence[index].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[index].clicked,'fluorescence', index)" :value="query.search_conditions.fluorescence[index].description"> 
                            @{{query.search_conditions.fluorescence[index].description}}
                            </button>
                        </div>  
          </li>
        </ul>            
    </div>



    <div class="section-4">
      <div class="block-sec-4">
        <a href="{{ '/links/whatsapp/852' . config( 'global.company.staffs.0.number' ) }}" v-if="locale != 2">
            <p>{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} , <img class="whatsapp-img" src="/images/front-end/diamond/search/whatsapp.png" alt="">    {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}</p>
        </a>

        <p v-if="locale == 2">{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} ,   {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}             
            <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
        </p>

      </div>
    </div>

    <ul class="nav justify-content-between pt-10">
      <li class="nav-item">
        <a class="nav-link color-blue"><strong>{{trans('diamondSearch.Total')}}: </strong>
                @{{model.total}} {{trans('diamondSearch.diamond')}}
            </a>
      </li>
      <li class="nav-item">
        <input v-for="(value, index) in query.search_conditions.location " class="btn btn-outline-secondary is-success" :class=" {' active' : query.search_conditions.location[index].clicked} " type="button" @click="toggleValue(query.search_conditions.location[index].clicked,'location', index)" :value="query.search_conditions.location[index].description |transJs(langs,locale)">
        <button class="btn btn-outline-secondary is-primary" @click="resetCookies()">{{__('diamondSearch.reset')}} <i class="fas fa-undo"></i></button>
      </li>
    </ul>


    <div class="d-sm-none d-block">

        <ul class="nav justify-content-between">
            <li class="nav-item">
                <div class="input-group mb-3">
                  <select class="custom-select" id="inputGroupSelect02" v-model="query.column">
                    <option v-for="column in columnsToggle" :value="column.value">
                        <a @click="toggleOrder(column.value)">@{{column.value | transJs(langs,locale)}}</a>
                    </option>
                  </select>
                  <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02" @click="query.direction = 'asc' " v-if="query.direction == 'desc' ">
                                <span >&#x25B2;</span>
                    </label>
                    <label class="input-group-text" for="inputGroupSelect02" @click="query.direction = 'desc' " v-else>
                                <span >&#x25BC;</span>
                    </label>
                  </div>
                </div>

            </li>
            <li class="nav-item">
                <button class="btn btn-outline-secondary" :class=" { ' active' : !showInGrid }" @click="showInGrid = !showInGrid"><i class="fas fa-list-alt">{{ __('diamondSearch.List')}}</i></button>
                <button class="btn btn-outline-secondary" :class="{ ' active' : showInGrid }" @click="showInGrid = !showInGrid"><i class="fas fa-grip-vertical">{{ __('diamondSearch.Grid')}}</i></button>
            </li>
        </ul>

    </div>
    

    <div :class=" {'d-sm-none d-block' : !showInGrid}">
    <div :class=" {'d-sm-block d-none' : showInGrid}" style="overflow-x: scroll;">

        <table class="table" >
                    <thead>
                        <tr class="is-selected ">
                            <th v-for="column in columnsToggle" @click="toggleOrder(column.value)">
                                <span>@{{ column.display | transJs(langs,locale) }}</span>
                                <span class="dv-table-column" v-if="column.value === query.column">
                                    <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                                    <span v-else >&#x25B2;</span>
                                </span>
                            </th>
                        </tr>
                    </thead>

                    <tbody align="justify">
                        
                        <tr v-for="(row, index) in model.data" @click="clickRow(row,index)" :class="{ 'table-secondary': clickedRows.filter( (data)=>{ return data == row.id }).length > 0}">
                            <td > 
                                <div v-if="row.image_cache">
                                    <figure class="image is-128x128">
                                        <img :src="storageURL + 'images/thm-' + row.id + '.jpg' "></img>
                                    </figure>
                                </div>
                                <div v-else></div>
                            </td>

                            <td >
                                <div v-if="row.plot">
                                        <img :src="storageURL + 'plots/' + row.id + '.jpg' " width="200"></img>
                                </div>
                                <div v-else>
                                    <img :src=" row.shape|diamondShapeUrl()" width="20">  
                                </div>
                            </td> 
                            <td >HK$@{{ row.price }}</td>
                            <td > @{{ row.weight }}</td>
                            <td > @{{ row.color }}</td>
                            <td > @{{ row.clarity }}</td>
                            <td > @{{ row.cut==0?'NoneCut':row.cut | transJs(langs,locale)}}</td>
                            <td > @{{ row.polish | transJs(langs,locale)}}</td>
                            <td > @{{ row.symmetry | transJs(langs,locale)}}</td>
                            <td > @{{ row.fluorescence | transJs(langs,locale)}}</td>
                            <td v-if="row.location=='1Hong Kong'">{{__('diamondSearch.1-2 Days')}}</td>
                            <td v-else> {{__('diamondSearch.Order')}}</td>
                            <td > @{{ row.certificate }}</td>
                            <td > @{{ row.lab }}</td>
                            <td ><i class="fa fa-star" aria-hidden="true" v-if="row.starred"></i></td>
                        </tr>
                        

                    </tbody>
            

        </table>
    </div>
    </div>




    <div :class=" {'d-sm-none d-block' : showInGrid}">
    <div :class=" {'d-sm-block d-none' : !showInGrid}">

        <div class="card" v-for="(row, index) in model.data" @click="clickRow(row,index)" :class="{ ' bg-secondary text-white': clickedRows.filter( (data)=>{ return data == row.id }).length > 0}">

            <div class="row">
                <div class="col" v-if="row.image_cache">
                    <img :src="storageURL + 'images/thm-' + row.id + '.jpg' "></img>    
                </div>
                <div class="col"  v-else>
                    <img :src=" row.shape|diamondSampleShapeUrl() " width="100%" ></img>
                </div>
                <div class="col" v-if="row.plot">
                    <img :src="storageURL + 'plots/' + row.id + '.jpg' " width="100%"></img>
                </div>
                <div class="col"  v-else>
                    <img :src=" row.shape|diamondShapeUrl()" width="20"> 
                </div>
            </div>

          <div class="card-body" >
            <h5 class="color-blue">
              <i class="fa fa-star" aria-hidden="true" v-if="row.starred"></i>
              HK$ @{{ row.price }}
            </h5>
            <p class="card-text">
                    @{{ row.weight }}
                     <strong> | </strong>
                    @{{ row.color }}
                     <strong> | </strong>                                        
                    @{{ row.clarity }} 
                     <strong> | </strong>                                        

                    @{{ row.cut==0?'NoneCut':row.cut | transJs(langs,locale)}}
                     <strong> | </strong>
                    @{{ row.polish | transJs(langs,locale)}} 
                     <strong> | </strong>
                    @{{ row.symmetry | transJs(langs,locale)}}
                     <strong> | </strong>

                    @{{ row.fluorescence | transJs(langs,locale)}}
                    <div v-if="row.location=='1Hong Kong'">{{__('diamondSearch.1-2 Days')}}</div>
                    <div v-else> {{__('diamondSearch.Order')}}</div>
                    @{{ row.lab }} 
                    @{{ row.certificate }}
            </p>

          </div>
        </div>

    </div>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ 'disabled' : model.current_page == 1 }">
          <a class="page-link"  :aria-disabled="model.current_page" @click="moveTo(-1)">{{trans('diamondSearch.Previous')}}</a>
        </li>
        <li class="page-item" :class="{ 'disabled' : model.current_page == 1 }"><a class="page-link"  @click="moveTo(-1)">@{{model.current_page-1}}</a></li>
        <li class="page-item active"><a class="page-link" >@{{model.current_page}}</a></li>
        <li class="page-item "><a class="page-link" :aria-disable="model.current_page>model.last_page" @click="moveTo(1)">@{{model.current_page+1}}</a></li>
        <li class="page-item">
          <a class="page-link" @click="moveTo(1)">{{trans('diamondSearch.Next')}}</a>
        </li>
      </ul>
    </nav>


