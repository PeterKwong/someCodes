<div class="hidden sm:block p-4">
    <div class="grid grid-cols-12">
        <div class="col-span-4">
            <div>{{trans('engagementRing.Style')}}</div>
            <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.style[index].clicked} " type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)">
            <img :src="'/images/front-end/engagementRing/'+query.search_conditions.style[index].description + '.png'" height="30" width="55">
            @{{query.search_conditions.style[index].display | transJs(langs)}}
            </button>        
        </div>
        <div class="col-span-4">
            <div>{{trans('engagementRing.Shoulder')}}</div>
            <button v-for="(value, index) in query.search_conditions.shoulder " class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.shoulder[index].clicked} " type="button" @click="toggleValue(query.search_conditions.shoulder[index].clicked,'shoulder', index)" >
            <img :src="'/images/front-end/engagementRing/'+query.search_conditions.shoulder[index].description + '.png'" height="30" width="55">
            @{{query.search_conditions.shoulder[index].display | transJs(langs)}}
            </button>        
        </div> 
        <div class="col-span-2">
            <div>{{trans('engagementRing.Claw Prong')}}</div>
            <button v-for="(value, index) in query.search_conditions.prong " class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.prong[index].clicked} " type="button" @click="toggleValue(query.search_conditions.prong[index].clicked,'prong', index)" :value="query.search_conditions.prong[index].display | transJs(langs)"> 
            @{{query.search_conditions.prong[index].display| transJs(langs)}}
           </button>        
        </div> 
         <div class="col-span-2">
            <div>{{trans('engagementRing.Custom-make')}}</div>
            <button v-for="(value, index) in query.search_conditions.customized " class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display | transJs(langs)"> 
            @{{query.search_conditions.customized[index].display| transJs(langs)}}
            </button>        
        </div> 

    </div>    
</div>



<div class="block sm:hidden">

 
                
                    <div class="flex box p-2 mx-1 text-center justify-center items-center" @click="selectDisplayColumn('style')">
                        <a class="is-primary">{{trans('engagementRing.Style')}}</a>
                        <a  @click="selectDisplayColumn('style')">
                         <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline inline-flex items-center" v-if="query.search_conditions.style[index].clicked" type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)" :value="query.search_conditions.style[index].description"> 
                            <img :src="'/images/front-end/engagementRing/'+query.search_conditions.style[index].description + '.png'" height="30" width="55">
                        @{{query.search_conditions.style[index].description  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'style' ">
                        <button v-for="(value, index) in query.search_conditions.style" class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.style[index].clicked} " type="button" @click="toggleValue(query.search_conditions.style[index].clicked,'style', index)" :value="query.search_conditions.style[index].description"> 
                            <img :src="'/images/front-end/engagementRing/'+query.search_conditions.style[index].description + '.png'" height="30" width="55">
                        @{{query.search_conditions.style[index].description  | transJs(langs)}}
                        </button>

                    </div>
                
            

           
                
                    <div class="flex box p-2 mx-1 text-center justify-center items-center" @click="selectDisplayColumn('prong')">
                        <a class="is-primary">{{trans('engagementRing.Claw Prong')}}</a>
                        <a  @click="selectDisplayColumn('prong')">
                         <button v-for="(value, index) in query.search_conditions.prong" class="btn btn-outline inline-flex items-center" v-if="query.search_conditions.prong[index].clicked" type="button" @click="toggleValue(query.search_conditions.prong[index].clicked,'prong', index)" :value="query.search_conditions.prong[index].description"> 
                        @{{query.search_conditions.prong[index].description  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'prong' ">
                        <button v-for="(value, index) in query.search_conditions.prong" class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.prong[index].clicked} " type="button" @click="toggleValue(query.search_conditions.prong[index].clicked,'prong', index)" :value="query.search_conditions.prong[index].description"> 
                        @{{query.search_conditions.prong[index].description  | transJs(langs)}}
                        </button>

                    </div>
                
            

           
                
                    <div class="flex box p-2 mx-1 text-center justify-center items-center" @click="selectDisplayColumn('shoulder')">
                        <a class="is-primary">{{trans('engagementRing.Shoulder')}}</a>
                        <a  @click="selectDisplayColumn('shoulder')">
                         <button v-for="(value, index) in query.search_conditions.shoulder" class="btn btn-outline inline-flex items-center" v-if="query.search_conditions.shoulder[index].clicked" type="button" @click="toggleValue(query.search_conditions.shoulder[index].clicked,'shoulder', index)" :value="query.search_conditions.shoulder[index].description"> 
                            <img :src="'/images/front-end/engagementRing/'+query.search_conditions.shoulder[index].description + '.png'" height="30" width="55">                            
                        @{{query.search_conditions.shoulder[index].description  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'shoulder' ">
                        <button v-for="(value, index) in query.search_conditions.shoulder" class="btn btn-outline inline-flex items-center" :class=" {'btn-active' : query.search_conditions.shoulder[index].clicked} " type="button" @click="toggleValue(query.search_conditions.shoulder[index].clicked,'shoulder', index)" :value="query.search_conditions.shoulder[index].description">    <img :src="'/images/front-end/engagementRing/'+query.search_conditions.shoulder[index].description + '.png'" height="30" width="55">

                        @{{query.search_conditions.shoulder[index].description  | transJs(langs)}}
                        </button>

                    </div>
                
            

           
                
                    <div class="flex box p-2 mx-1 text-center justify-center items-center" @click="selectDisplayColumn('customized')">
                        <a class="is-primary">{{trans('engagementRing.Custom-make')}}</a>
                        <a  @click="selectDisplayColumn('customized')">
                         <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline inline-flex items-center" v-if="query.search_conditions.customized[index].clicked" type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].description"> 
                        @{{query.search_conditions.customized[index].description  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="flex justify-center"  v-if="displayColumn == 'customized' ">
                        <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline " :class=" {'btn-active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].description"> 
                        @{{query.search_conditions.customized[index].description  | transJs(langs)}}
                        </button>

                    </div>
                
            


        </tbody>
        
    </table>
   
         
</div>


<br>


<div class="grid grid-cols-12">
    <div class="col-span-6 sm:col-span-3" v-for="(ring,index) in model.data">
        <div @click="clickRow(ring)">
            <a @mouseover="loopImages(index)" @mouseleave="loopImages(index,0)">
                <img :src="mutualVar.storage[mutualVar.storage.live] + 'public' + `/images/${ring.images[0].image}`" v-if="ring.images[0]" class="w-half">
                    <center>
                        <p  class="subtitle" v-if="ring.unit_price">HK$@{{ring.unit_price}}</p>
                        <p class="text-blue-600">@{{ring.style | transJs(langs)}} @{{ring.prong | transJs(langs)}} @{{ring.shoulder | transJs(langs)}} {{trans('engagementRing.setting')}}</p>
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








