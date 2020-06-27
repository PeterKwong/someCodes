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

                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[0].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[0].clicked,'shape', 0)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Round.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[1].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[1].clicked,'shape', 1)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Pear.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[2].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[2].clicked,'shape', 2)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Emerald.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[3].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[3].clicked,'shape', 3)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Princess.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[4].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[4].clicked,'shape', 4)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Marquise.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[5].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[5].clicked,'shape', 5)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Cushion.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[6].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[6].clicked,'shape', 6)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Asscher.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[7].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[7].clicked,'shape', 7)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Oval.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[8].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[8].clicked,'shape', 8)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Heart.png" alt="">
                    <div class="grad-line"></div>
                  </div>
                  <div class="grad-img"  class="btn btn-outline-secondary" :class=" {' active' : query.search_conditions.shape[9].clicked} " type="button" @click="toggleValue(query.search_conditions.shape[9].clicked,'shape', 9)">
                    <img class="img-fluid" src="/images/front-end/diamond_shapes/Radiant.png" alt="">
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

                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[0].clicked} "  @click="toggleValue(query.search_conditions.color[0].clicked,'color', 0)" > 
                    D
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[1].clicked} "  @click="toggleValue(query.search_conditions.color[1].clicked,'color', 1)"> 
                    E
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[2].clicked} "  @click="toggleValue(query.search_conditions.color[2].clicked,'color', 2)" > 
                    F
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[3].clicked} "  @click="toggleValue(query.search_conditions.color[3].clicked,'color', 3)" > 
                    G
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[4].clicked} "  @click="toggleValue(query.search_conditions.color[4].clicked,'color', 4)" > 
                    H
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[5].clicked} "  @click="toggleValue(query.search_conditions.color[5].clicked,'color', 5)" > 
                    I
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[6].clicked} "  @click="toggleValue(query.search_conditions.color[6].clicked,'color', 6)" > 
                    J
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[7].clicked} "  @click="toggleValue(query.search_conditions.color[7].clicked,'color', 7)" > 
                    K
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[8].clicked} "  @click="toggleValue(query.search_conditions.color[8].clicked,'color', 8)" > 
                    L
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {'active' : query.search_conditions.color[9].clicked} "  @click="toggleValue(query.search_conditions.color[9].clicked,'color', 9)" > 
                    M
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

                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.cut[0].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[0].clicked,'cut', 0)" > 
                    Excellent
                    <div class="grade-line"></div>
                  </div>

                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.cut[1].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[1].clicked,'cut', 1)" > 
                    Very Good
                    <div class="grade-line"></div>
                  </div>

                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.cut[2].clicked} " type="button" @click="toggleValue(query.search_conditions.cut[2].clicked,'cut', 2)" > 
                    Good
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

                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[0].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[0].clicked,'clarity', 0)" > 
                      FL
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[1].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[1].clicked,'clarity', 1)"> 
                      IF
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[2].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[2].clicked,'clarity', 2)" > 
                      VVS1
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[3].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[3].clicked,'clarity', 3)" > 
                      VVS2
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[4].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[4].clicked,'clarity', 4)" > 
                      VS1
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[5].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[5].clicked,'clarity', 5)" > 
                      VS2
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[6].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[6].clicked,'clarity', 6)" > 
                      SI1
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[7].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[7].clicked,'clarity', 7)" > 
                      SI2
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6"  :class=" {' active' : query.search_conditions.clarity[8].clicked} " type="button" @click="toggleValue(query.search_conditions.clarity[8].clicked,'clarity', 8)" > 
                      I1
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

                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.polish[0].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[0].clicked,'polish', 0)" > 
                    Excellent
                    <div class="grade-line"></div>
                  </div>
                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.polish[1].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[1].clicked,'polish', 1)" > 
                    Very Good
                    <div class="grade-line"></div>
                  </div>
                  <div class="col-4 grade-box"  :class=" {' active' : query.search_conditions.polish[2].clicked} " type="button" @click="toggleValue(query.search_conditions.polish[2].clicked,'polish', 2)" > 
                    Good
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

                    <div class="block-3-item-div p-6" :class=" {' active' : query.search_conditions.fluorescence[0].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[0].clicked,'fluorescence', 0)" > 
                       {{trans('diamondSearch.None')}}
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {' active' : query.search_conditions.fluorescence[1].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[1].clicked,'fluorescence', 1)" > 
                       {{trans('diamondSearch.Faint')}}
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {' active' : query.search_conditions.fluorescence[2].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[2].clicked,'fluorescence', 2)" > 
                       {{trans('diamondSearch.Medium')}}
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {' active' : query.search_conditions.fluorescence[3].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[3].clicked,'fluorescence', 3)" > 
                       {{trans('diamondSearch.Strong')}}
                      <div class="block-3-item-bar"></div>
                    </div>
                    <div class="block-3-item-div p-6" :class=" {' active' : query.search_conditions.fluorescence[4].clicked} " type="button" @click="toggleValue(query.search_conditions.fluorescence[4].clicked,'fluorescence', 4)" > 
                       {{trans('diamondSearch.Very Strong')}}
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

                  <div class="col-4 grade-box" :class=" {' active' : query.search_conditions.symmetry[0].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[0].clicked,'symmetry', 0)" > 
                    Excellent
                    <div class="grade-line"></div>
                  </div>
                  <div class="col-4 grade-box" :class=" {' active' : query.search_conditions.symmetry[1].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[1].clicked,'symmetry', 1)" > 
                    Very Good
                    <div class="grade-line"></div>
                  </div>
                  <div class="col-4 grade-box" :class=" {' active' : query.search_conditions.symmetry[2].clicked} " type="button" @click="toggleValue(query.search_conditions.symmetry[2].clicked,'symmetry', 2)" > 
                    Good
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



    <ul class="nav nav-tabs justify-content-center pt-10">
      <li class="nav-item">
        <a class="nav-link active " @click="showAdvance=!showAdvance" >{{ __('diamondSearch.More Advance') }}</a>
      </li>
    </ul>



    <div v-if="showAdvance">

      <div class="row">
        <div class="col-12 gg-sec-2 margin-top-20">
          <div class="grad-block">
            <div class="row">

              <div class="col-1 text-center">
                <div class="grad-img-gg">
                  <p  class="btn " :class="{'btn-outline-secondary ': fetchData.crownAngle[1] != 0}" @click="fetchData.crownAngle = [0,0]">{{trans('diamondSearch.Crown Angle')}}</p>
                </div>
              </div>

              <div class="col-11">
                <div class="row">

                  <div class="col-6">
                    <div class="block" @click="addAdvanceSearch('crownAngle')">
                      <div class="grad-input">
                        <label>{{trans('diamondSearch.Min')}}</label>
                        <input class="w3-input" type="text"  @keyup="fetchIndexData()" v-model="fetchData.crownAngle[0]" @focus="$event.target.select()">
                      </div>
                      <div class="grad-input pull-right">
                        <label>{{trans('diamondSearch.Max')}}</label>
                        <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.crownAngle[1]" @focus="$event.target.select()" >
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-1 para-block">
                    <p class="btn " :class="{'btn-outline-secondary ': fetchData.parvilionAngle[1] != 0}" @click="fetchData.parvilionAngle = [0,0]">{{trans('diamondSearch.Parvilion Angle')}}</p>
                  </div>

                  <div class="col-5">
                    <div class="block gg" @click="addAdvanceSearch('parvilionAngle')">
                      <div class="grad-input">
                        <label>{{trans('diamondSearch.Min')}}</label>
                        <input class="w3-input" type="text"  @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[0]" @focus="$event.target.select()">
                      </div>
                      <div class="grad-input pull-right">
                        <label>{{trans('diamondSearch.Max')}}</label>
                        <input class="w3-input" type="text"   @keyup="fetchIndexData()" v-model="fetchData.parvilionAngle[1]" @focus="$event.target.select()" >
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 gg-sec-2 margin-top-20">
          <div class="grad-block">
            <div class="row">

              <div class="col-1 text-center">
                <div class="grad-img-gg">
                  <p class="btn " :class="{'btn-outline-secondary ': fetchData.tablePercent[1] != 0}" @click="fetchData.tablePercent = [0,0]">{{trans('diamondSearch.Table Percent')}}</p>
                </div>
              </div>

              <div class="col-11">
                <div class="row">

                  <div class="col-6">
                    <div class="block" @click="addAdvanceSearch('tablePercent')">
                      <div class="grad-input">
                        <label>{{trans('diamondSearch.Min')}}</label>
                        <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.tablePercent[0]" @focus="$event.target.select()">
                      </div>
                      <div class="grad-input pull-right">
                        <label>{{trans('diamondSearch.Max')}}</label>
                        <input class="w3-input" type="text"  @keyup="fetchIndexData()" v-model="fetchData.tablePercent[1]" @focus="$event.target.select()" >
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-1 para-block">
                    <p class="btn " :class="{'btn-outline-secondary ': fetchData.depthPercent[1] != 0}" @click="fetchData.depthPercent = [0,0]">{{trans('diamondSearch.Depth Percent')}}</p>
                  </div>

                  <div class="col-5">
                    <div class="block gg" @click="addAdvanceSearch('depthPercent')">
                      <div class="grad-input">
                        <label>{{trans('diamondSearch.Min')}}</label>
                        <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[0]" @focus="$event.target.select()">
                      </div>
                      <div class="grad-input pull-right">
                        <label>{{trans('diamondSearch.Max')}}</label>
                        <input class="w3-input" type="text" @keyup="fetchIndexData()" v-model="fetchData.depthPercent[1]" @focus="$event.target.select()" >
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

