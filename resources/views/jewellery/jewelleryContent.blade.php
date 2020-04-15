<div class="d-none d-sm-block">
    <div class="row">
        <div class="col-6">
            <div>{{trans('jewellery.Type')}}</div>
            <button v-for="(value, index) in query.search_conditions.type" class="btn btn-outline-secondary " :class=" {'active' : query.search_conditions.type[index].clicked} " type="button" @click="toggleValue(query.search_conditions.type[index].clicked,'type', index)">
            <img :src="'/images/front-end/jewellery/'+query.search_conditions.type[index].description + '.png'" height="35" width="30">
            @{{query.search_conditions.type[index].display | transJs(langs)}}
            </button>        
        </div>
        <div class="col-6">
            <div>{{trans('jewellery.Gemstone')}}</div>
            <button v-for="(value, index) in query.search_conditions.gemstone " class="btn btn-outline-secondary " :class=" {'active' : query.search_conditions.gemstone[index].clicked} " type="button" @click="toggleValue(query.search_conditions.gemstone[index].clicked,'gemstone', index)" :value="query.search_conditions.gemstone[index].display | transJs(langs)"> 
            @{{query.search_conditions.gemstone[index].display | transJs(langs)}}
            </button>        
        </div>
    </div>
    
    <br>

    <div class="row">
        <div class="col-6">
            <div>{{trans('jewellery.Metal')}}</div>
            <button v-for="(value, index) in query.search_conditions.metal " class="btn btn-outline-secondary " :class=" {'active' : query.search_conditions.metal[index].clicked} " type="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" >
            @{{query.search_conditions.metal[index].display | transJs(langs)}}
            </button>
        </div>
        <div class="col-3">
            <div>{{trans('jewellery.Setting')}}</div>
            <button v-for="(value, index) in query.search_conditions.setting " class="btn btn-outline-secondary " :class=" {'active' : query.search_conditions.setting[index].clicked} " type="button" @click="toggleValue(query.search_conditions.setting[index].clicked,'setting', index)" :value="query.search_conditions.setting[index].display | transJs(langs)"> 
            @{{query.search_conditions.setting[index].display | transJs(langs)}}
            </button>
            
        </div>
        <div class="col-3">
            <div>{{trans('jewellery.Custom-make')}}</div>
            <button v-for="(value, index) in query.search_conditions.customized " class="btn btn-outline-secondary " :class=" {'active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display | transJs(langs)"> 
            @{{query.search_conditions.customized[index].display | transJs(langs)}}
            </button>
            
        </div>
    </div>

</div>


<div class="d-block d-sm-none">

    <table class="table is-bordered is-narrow is-hoverable is-fullwidth">
        <tbody>
            <tr>
                <td>
                    <div @click="selectDisplayColumn('type')">
                        <a class="is-primary">{{trans('jewellery.Type')}}</a>
                        <a  @click="selectDisplayColumn('type')">
                         <button v-for="(value, index) in query.search_conditions.type" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.type[index].clicked" type="button" @click="toggleValue(query.search_conditions.type[index].clicked,'type', index)" :value="query.search_conditions.type[index].display"> 
                            <img :src="'/images/front-end/jewellery/'+query.search_conditions.type[index].display + '.png'" height="35" width="30">
                        @{{query.search_conditions.type[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="level"  v-if="displayColumn == 'type' ">
                        <button v-for="(value, index) in query.search_conditions.type" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.type[index].clicked} " type="button" @click="toggleValue(query.search_conditions.type[index].clicked,'type', index)" :value="query.search_conditions.type[index].display"> 
                            <img :src="'/images/front-end/jewellery/'+query.search_conditions.type[index].display + '.png'" height="35" width="30">
                        @{{query.search_conditions.type[index].display  | transJs(langs)}}
                        </button>

                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div @click="selectDisplayColumn('gemstone')">
                        <a class="is-primary">{{trans('jewellery.Gemstone')}}</a>
                        <a  @click="selectDisplayColumn('gemstone')">
                         <button v-for="(value, index) in query.search_conditions.gemstone" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.gemstone[index].clicked" gemstone="button" @click="toggleValue(query.search_conditions.gemstone[index].clicked,'gemstone', index)" :value="query.search_conditions.gemstone[index].display"> 

                        @{{query.search_conditions.gemstone[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="level"  v-if="displayColumn == 'gemstone' ">
                        <button v-for="(value, index) in query.search_conditions.gemstone" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.gemstone[index].clicked} " gemstone="button" @click="toggleValue(query.search_conditions.gemstone[index].clicked,'gemstone', index)" :value="query.search_conditions.gemstone[index].display"> 
  
                        @{{query.search_conditions.gemstone[index].display  | transJs(langs)}}
                        </button>

                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div @click="selectDisplayColumn('metal')">
                        <a class="is-primary">{{trans('jewellery.Metal')}}</a>
                        <a  @click="selectDisplayColumn('metal')">
                         <button v-for="(value, index) in query.search_conditions.metal" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.metal[index].clicked" metal="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" :value="query.search_conditions.metal[index].display"> 

                        @{{query.search_conditions.metal[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="level"  v-if="displayColumn == 'metal' ">
                        <button v-for="(value, index) in query.search_conditions.metal" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.metal[index].clicked} " metal="button" @click="toggleValue(query.search_conditions.metal[index].clicked,'metal', index)" :value="query.search_conditions.metal[index].display"> 
  
                        @{{query.search_conditions.metal[index].display  | transJs(langs)}}
                        </button>

                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div @click="selectDisplayColumn('sideStone')">
                        <a class="is-primary">{{trans('jewellery.Side Stone')}}</a>
                        <a  @click="selectDisplayColumn('sideStone')">
                         <button v-for="(value, index) in query.search_conditions.sideStone" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.sideStone[index].clicked" type="button" @click="toggleValue(query.search_conditions.sideStone[index].clicked,'sideStone', index)" :value="query.search_conditions.sideStone[index].display"> 
                        @{{query.search_conditions.sideStone[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="level"  v-if="displayColumn == 'sideStone' ">
                        <button v-for="(value, index) in query.search_conditions.sideStone" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.sideStone[index].clicked} " type="button" @click="toggleValue(query.search_conditions.sideStone[index].clicked,'sideStone', index)" :value="query.search_conditions.sideStone[index].display">
                        @{{query.search_conditions.sideStone[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                </td>
            </tr>           

            <tr>
                <td>
                    <div @click="selectDisplayColumn('customized')">
                        <a class="is-primary">{{trans('jewellery.Custom-make')}}</a>
                        <a  @click="selectDisplayColumn('customized')">
                         <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline-secondary is-small" v-if="query.search_conditions.customized[index].clicked" type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display"> 
                        @{{query.search_conditions.customized[index].display  | transJs(langs)}}
                        </button>
                        </a>

                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="level"  v-if="displayColumn == 'customized' ">
                        <button v-for="(value, index) in query.search_conditions.customized" class="btn btn-outline-secondary is-small" :class=" {' active' : query.search_conditions.customized[index].clicked} " type="button" @click="toggleValue(query.search_conditions.customized[index].clicked,'customized', index)" :value="query.search_conditions.customized[index].display">
                        @{{query.search_conditions.customized[index].display  | transJs(langs)}}
                        </button>
                        
                    </div>
                </td>
            </tr>  

        </tbody>
        
    </table>
   
</div>



<div class="row">
    <div class="col-sm-3 col-6" v-for="(ring,index) in model.data">
        <div @click="clickRow(ring)">
            <a @mouseover="loopImages(index)" @mouseleave="loopImages(index,0)">
                <img :src="mutualVar.storage[mutualVar.storage.live] + 'public' +`/images/${ring.images[0].image}`" v-if="ring.images[0]" width="100%">
                    <center>
                        <p  class="subtitle" v-if="ring.unit_price">$@{{ring.unit_price}}</p>
                        <p >@{{ring.metal | transJs(langs)}} @{{ring.gemstone==0?'':ring.gemstone | transJs(langs)}} @{{ring.type | transJs(langs)}}  @{{ring.setting?'setting':'' | transJs(langs)}}</p>
                    </center>
            </a>
        </div>
    </div>
</div>
                

<div class="row justify-content-center">
    <div class="col">
        <center>
            <button class="btn btn-primary" @click="more()">{{trans('jewellery.More')}}</button>
        </center>
    </div>
</div>


