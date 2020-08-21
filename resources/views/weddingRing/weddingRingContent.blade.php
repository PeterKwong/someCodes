<div class="hidden sm:block p-4">
    <div class="grid grid-cols-12">
        <div class="col-span-4">
            <div>{{trans('weddingRing.Style')}} </div>
                <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.style[index].clicked} " type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)" :value="query.search_conditions.style[index].display | transJs(langs,locale)"> 
                @{{query.search_conditions.style[index].display | transJs(langs,locale)}}
                </button>
        </div>
        <div class="col-span-4">
            <div>{{trans('weddingRing.Metal')}}</div>
                <button v-for="(value, index) in query.search_conditions.metal " class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.metal[index].clicked} " type="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" :value="query.search_conditions.metal[index].display | transJs(langs,locale)"> 
                @{{query.search_conditions.metal[index].display | transJs(langs,locale)}}
                </button>
        </div>
        <div class="col-span-2">
            <div>{{trans('weddingRing.Side stone')}}</div>
                <button v-for="(value, index) in query.search_conditions.sideStone " class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.sideStone[index].clicked} " type="button" @click="toggleValue(query.search_conditions.sideStone[index].clicked,'sideStone', index)" :value="query.search_conditions.sideStone[index].display | transJs(langs,locale)"> 
                @{{query.search_conditions.sideStone[index].display | transJs(langs,locale)}}
                </button>
        </div>
        <div class="col-span-2">
            <div>{{trans('weddingRing.Custom-make')}}</div>
                <button v-for="(value, index) in query.search_conditions.customized " class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display | transJs(langs,locale)"> 
                @{{query.search_conditions.customized[index].display | transJs(langs,locale)}}
                </button>
        </div>

    </div>
</div>

<div class="sm:hidden">
            
                
                    <div class="flex box justify-center p-2 mx-1 items-center" @click="selectDisplayColumn('style')">
                        <a class="is-primary">{{trans('weddingRing.Style')}}</a>
                        <a  @click="selectDisplayColumn('style')">
                         <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline" v-if="query.search_conditions.style[index].clicked" type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)" :value="query.search_conditions.style[index].display"> 
                        @{{query.search_conditions.style[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'style' ">
                        <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.style[index].clicked} " type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)" :value="query.search_conditions.style[index].display">
                        @{{query.search_conditions.style[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                
            

            
                
                    <div class="flex box justify-center p-2 mx-1 items-center" @click="selectDisplayColumn('metal')">
                        <a class="is-primary">{{trans('weddingRing.Metal')}}</a>
                        <a  @click="selectDisplayColumn('metal')">
                         <button v-for="(value, index) in query.search_conditions.metal" class="btn btn-outline" v-if="query.search_conditions.metal[index].clicked" type="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" :value="query.search_conditions.metal[index].display"> 
                        @{{query.search_conditions.metal[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'metal' ">
                        <button v-for="(value, index) in query.search_conditions.metal" class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.metal[index].clicked} " type="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" :value="query.search_conditions.metal[index].display">
                        @{{query.search_conditions.metal[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                
            

            
                
                    <div class="flex box justify-center p-2 mx-1 items-center" @click="selectDisplayColumn('sideStone')">
                        <a class="is-primary">{{trans('weddingRing.Side Stone')}}</a>
                        <a  @click="selectDisplayColumn('sideStone')">
                         <button v-for="(value, index) in query.search_conditions.sideStone" class="btn btn-outline" v-if="query.search_conditions.sideStone[index].clicked" type="button" @click="toggleValue(query.search_conditions.sideStone[index].clicked,'sideStone', index)" :value="query.search_conditions.sideStone[index].display"> 
                        @{{query.search_conditions.sideStone[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'sideStone' ">
                        <button v-for="(value, index) in query.search_conditions.sideStone" class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.sideStone[index].clicked} " type="button" @click="toggleValue(query.search_conditions.sideStone[index].clicked,'sideStone', index)" :value="query.search_conditions.sideStone[index].display">
                        @{{query.search_conditions.sideStone[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                
                       

            
                
                    <div class="flex box justify-center p-2 mx-1 items-center" @click="selectDisplayColumn('customized')">
                        <a class="is-primary">{{trans('weddingRing.Custom-make')}}</a>
                        <a  @click="selectDisplayColumn('customized')">
                         <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline" v-if="query.search_conditions.customized[index].clicked" type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display"> 
                        @{{query.search_conditions.customized[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'customized' ">
                        <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline" :class=" {' btn-active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display">
                        @{{query.search_conditions.customized[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                
              

        </tbody>
        
    </table>
</div>



<div class="grid grid-cols-12">
    <div class="sm:col-span-3 col-span-6" v-for="(ring,index) in model.data">
        <div @click="clickRow(ring)">
            <a @mouseover="loopImages(index)" @mouseleave="loopImages(index,0)">
                <img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${ring.wedding_rings[0].images[0].image}`" v-if="ring.wedding_rings[0].images[0]" width="100%">
                    <center>
                        <div class="grid grid-cols-12">
                            <div class="col-span-6"><p  class="color-blue" v-if="ring.wedding_rings[0].unit_price">$@{{ring.wedding_rings[0].unit_price}}</p></div>
                            <div class="col-span-6" v-if="ring.wedding_rings[1]"> <p  class="color-blue" v-if="ring.wedding_rings[1].unit_price">HK$@{{ring.wedding_rings[1].unit_price}}</p></div>
                        </div>
                        
                       
                        <p  v-if="ring.wedding_rings[0].style" class="text-blue-600">@{{ring.wedding_rings[0].style | transJs(langs)}} @{{ring.wedding_rings[0].metal | transJs(langs,locale)}} @{{ring.wedding_rings[0].sideStone? transJsMet(columns[2],langs,locale):''}} 
                                                    {{trans('weddingRing.Wedding Ring')}}</p>
                    </center>
            </a>
        </div>
    </div>
</div>
                

<div class="row justify-content-center">
    <div class="col">
        <center>
            <button class="btn btn-primary" @click="more()">{{trans('engagementRing.More')}}</button>
        </center>
    </div>
</div>



