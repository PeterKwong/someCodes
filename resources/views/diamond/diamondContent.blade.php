<div class="section-3 hidden sm:block">

  @include('diamond.searchDesktop')

</div>


<div class="sm:hidden">

   @include('diamond.searchMobile')

</div>



<div class="flex justify-center text-center items-center border border-gray-400 p-2 pt-4 m-4">
  <div class="flex-1">
    <center>
    <a href="{{ '/links/whatsapp/852' . config( 'global.company.staffs.0.number' ) }}" v-if="locale != 2">
        <p>{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} , <img class="h-4 " src="/images/front-end/diamond/search/whatsapp.png" alt="">    {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}</p>
    </a>

    <p v-if="locale == 2">{{trans('diamondSearch.If you could not find diamonds as your inquiry')}} ,   {{trans('diamondSearch.PLEASE（Whatsapp: Winnie－5484 4533， for the latest diamond Stock）')}}             
        <img width="100" src="/images/front-end/aboutUs/wechat.jpg">
    </p>
    </center>
  </div>
</div>

<div class="flex justify-between p-4">
  <div class="">
    <a class="text-blue-600"><strong>{{trans('diamondSearch.Total')}}: </strong>
            @{{model.total}} {{trans('diamondSearch.diamond')}}
        </a>
  </div>
  <div class="">
    <button v-for="(value, index) in query.search_conditions.location " class="btn btn-outline" :class=" {' btn-primary' : query.search_conditions.location[index].clicked} " type="button" @click="toggleValue(query.search_conditions.location[index].clicked,'location', index)" >@{{query.search_conditions.location[index].description |transJs(langs,locale)}}
    </button> 
    <button class="btn btn-primary" @click="resetCookies()">
        {{__('diamondSearch.reset')}} <i class="fas fa-undo"></i>
    </button>
  </div>
</div>


<div class=" sm:hidden">

    <div class="flex justify-between px-4">
        <div class="">
            <div class="flex items-center">
                <div class="inline-block relative w-24">
                      <select class="select hover:border-gray-500 focus:outline-none focus:shadow-outline">
                        <option v-for="column in columns" :value="column">
                        <a @click="toggleOrder(column)">@{{column | transJs(langs,locale)}}</a>
                      </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                </div>

                <div class="w-8">
                    <button class="btn btn-outline"  @click="query.direction = 'asc' " v-if="query.direction == 'desc' ">
                                <span >&#x25B2;</span>
                    </button>
                    <button class="btn btn-outline"  @click="query.direction = 'desc' " v-else>
                                <span >&#x25BC;</span>
                    </button>
                  </div>
            </div>

        </div>
        <div class="">
            <button class="btn btn-outline" :class=" { ' active' : !showInGrid }" @click="showInGrid = !showInGrid"><i class="fas fa-list-alt">{{ __('diamondSearch.List')}}</i></button>
            <button class="btn btn-outline" :class="{ ' active' : showInGrid }" @click="showInGrid = !showInGrid"><i class="fas fa-grip-vertical">{{ __('diamondSearch.Grid')}}</i></button>
        </div>
    </div>

</div>



<div :class=" { 'sm:hidden' : !showInGrid}">
<div class="overflow-x-auto" :class=" { 'hidden sm:block' : showInGrid}" >

    <div class="relative overflow-hidden mb-8">    
        <div class="overflow-x-scroll p-2 ">
            <table class="table-auto w-full">
              <thead>
                <tr>
                  <th class="bg-yellow-600 text-white px-4 py-2" v-for="column in columns" @click="toggleOrder(column)">
                        <span>@{{ column | transJs(langs,locale) }}</span>
                        <span class="dv-table-column" v-if="column === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                  <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('crownAngle')" v-if="fetchData.crownAngle[1] != 0 ">
                        <span>{{trans('diamondSearch.Crown Angle')}}</span>
                        <span class="dv-table-column" v-if=" 'crownAngle' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('parvilionAngle')" v-if="fetchData.parvilionAngle[1] != 0 ">
                        <span>{{trans('diamondSearch.Parvilion Angle')}}</span>
                        <span class="dv-table-column" v-if=" 'parvilionAngle' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('tablePercent')" v-if="fetchData.tablePercent[1] != 0 ">
                        <span>{{trans('diamondSearch.Table Percent')}}</span>
                        <span class="dv-table-column" v-if=" 'tablePercent' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('depthPercent')" v-if="fetchData.depthPercent[1] != 0 ">
                        <span>{{trans('diamondSearch.Depth Percent')}}</span>
                        <span class="dv-table-column" v-if=" 'depthPercent' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('length')" v-if="fetchData.length[1] != 0 ">
                        <span>{{trans('diamondSearch.Length')}}</span>
                        <span class="dv-table-column" v-if=" 'length' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('width')" v-if="fetchData.width[1] != 0 ">
                        <span>{{trans('diamondSearch.Width')}}</span>
                        <span class="dv-table-column" v-if=" 'width' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>
                    <th class="bg-yellow-600 text-white px-4 py-2" @click="toggleOrder('depth')" v-if="fetchData.depth[1] != 0 ">
                        <span>{{trans('diamondSearch.Depth')}}</span>
                        <span class="dv-table-column" v-if=" 'depth' === query.column">
                            <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                            <span v-else >&#x25B2;</span>
                        </span>
                    </th>

                </tr>
              </thead>
              <tbody>
                <tr v-for="(row, index) in model.data" @click="clickRow(row,index)" :class="{ 'bg-gray-400 border': clickedRows.filter( (data)=>{ return data == row.id }).length > 0}">
                    <td class="border-b px-4 py-2" > 
                        <div v-if="row.image_cache" class="w-48">
                            <img :src="storageURL + 'images/thm-' + row.id + '.jpg' " class="object-contain w-full h-auto" ></img>
                        </div>
                        <div v-else></div>
                    </td>

                    <td class="border-b px-4 py-2" >
                        <div v-if="row.plot" class="w-48">
                                <img :src="storageURL + 'plots/' + row.id + '.jpg' " class="object-contain w-full h-auto" ></img>
                        </div>
                        <div v-else>
                          <center>
                            <img :src=" row.shape|diamondShapeUrl()" class="w-16">  
                            <p class="text-gray-800">sample</p>
                          </center>
                        </div>
                    </td> 
                    <td class="border-b px-4 py-2" >HK$@{{ row.price }}</td>
                    <td class="border-b px-4 py-2" > @{{ row.weight }}</td>
                    <td class="border-b px-4 py-2" > @{{ row.color }}</td>
                    <td class="border-b px-4 py-2" > @{{ row.clarity }}</td>
                    <td class="border-b px-4 py-2" > @{{ row.cut==0?'NoneCut':row.cut | transJs(langs,locale)}}</td>
                    <td class="border-b px-4 py-2" > @{{ row.polish | transJs(langs,locale)}}</td>
                    <td class="border-b px-4 py-2" > @{{ row.symmetry | transJs(langs,locale)}}</td>
                    <td class="border-b px-4 py-2" > @{{ row.fluorescence | transJs(langs,locale)}}</td>
                    <td class="border-b px-4 py-2" v-if="row.location=='1Hong Kong'">{{__('diamondSearch.1-2 Days')}}</td>
                    <td class="border-b px-4 py-2" v-else> {{__('diamondSearch.Order')}}</td>
                    <td class="border-b px-4 py-2" > @{{ row.certificate }}</td>
                    <td class="border-b px-4 py-2" > @{{ row.lab }}</td>
                    <td class="border-b px-4 py-2" ><i class="fa fa-star" aria-hidden="true" v-if="row.starred"></i></td>
                    <td class="border-b px-4 py-2" v-if="fetchData.tablePercent[1] != 0 "> @{{ row.table_percent }}%</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.depthPercent[1] != 0 "> @{{ row.depth_percent }}%</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.crownAngle[1] != 0 "> @{{ row.crown_angle }}°</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.parvilionAngle[1] != 0 "> @{{ row.parvilion_angle }}°</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.length[1] != 0 "> @{{ row.length }}mm</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.width[1] != 0 "> @{{ row.width }}mm</td>
                    <td class="border-b px-4 py-2" v-if="fetchData.depth[1] != 0 "> @{{ row.depth }}mm</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>

       
</div>
</div>




    <div :class=" {'sm:hidden' : showInGrid}">
    <div :class=" {'hidden sm:block' : !showInGrid}">

        <div class="border border-gray-400" v-for="(row, index) in model.data" @click="clickRow(row,index)" :class="{ ' bg-secondary text-white': clickedRows.filter( (data)=>{ return data == row.id }).length > 0}">

            <div class="flex items-center">
                <div class="flex-auto" v-if="row.image_cache">
                    <img :src="storageURL + 'images/thm-' + row.id + '.jpg' " class="w-48 h-auto"></img>    
                </div>
                <div class="flex-auto relative"  v-else>
                  <center>
                    <img :src=" row.shape|diamondSampleShapeUrl() " class="w-48 h-auto"  >
                  </center>
                </div>
                <div class="flex-auto" v-if="row.plot">
                    <img :src="storageURL + 'plots/' + row.id + '.jpg' " class="w-48 h-auto" ></img>
                </div>
                <div class="flex-auto relative"  v-else>
                  <center>
                    <img :src=" row.shape|diamondShapeUrl()"  class="h-24 w-auto"> 
                    <p class="text-gray-800">sample</p>
                  </center>
                </div>
            </div>

          <div class="row justify-content-center text-center" >
            <div class="col">
              <h5 class="text-blue-500">
                <i class="fa fa-star" aria-hidden="true" v-if="row.starred"></i>
                HK$ @{{ row.price }}
                <strong style="opacity: 0.3"> | </strong>                                        

                <span v-if="row.location=='1Hong Kong'">{{__('diamondSearch.1-2 Days')}}</span>
                <span v-else> {{__('diamondSearch.Order')}}</span>
              </h5>

              <p class="card-text">
                      @{{ row.weight }}
                       <strong style="opacity: 0.3"> | </strong>
                      @{{ row.color }}
                       <strong style="opacity: 0.3"> | </strong>                                        
                      @{{ row.clarity }} 
                       <strong style="opacity: 0.3"> | </strong>                                        

                      @{{ row.cut==0?'NoneCut':row.cut | transJs(langs,locale)}}
                       <strong style="opacity: 0.3"> | </strong>
                      @{{ row.polish | transJs(langs,locale)}} 
                       <strong style="opacity: 0.3"> | </strong>
                      @{{ row.symmetry | transJs(langs,locale)}}
                       <strong style="opacity: 0.3"> | </strong>
                      @{{ row.fluorescence | transJs(langs,locale)}}
                       <strong style="opacity: 0.3"> | </strong>

                      @{{ row.lab }} 
                      @{{ row.certificate }}
              </p>
              <p>
                <span >
                  <i class="fa fa-star" aria-hidden="true" v-if="row.starred">
                  <strong style="opacity: 0.3"> | </strong>
                  </i>
                </span>
                <span v-if="fetchData.tablePercent[1] != 0 "> @{{ row.table_percent }}%
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.depthPercent[1] != 0 "> @{{ row.depth_percent }}%
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.crownAngle[1] != 0 "> @{{ row.crown_angle }}°
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.parvilionAngle[1] != 0 "> @{{ row.parvilion_angle }}°
                </span>
                <span v-if="fetchData.length[1] != 0 "> @{{ row.length }}mm
                </span>
                <span v-if="fetchData.width[1] != 0 "> @{{ row.width }}mm
                </span>
                <span v-if="fetchData.depth[1] != 0 "> @{{ row.depth }}mm
                </span>
              </p>

            </div>
          </div>
        </div>

    </div>
    </div>

    <div class="flex justify-center">
        <a class="border border-gray-400 px-4 "  :aria-disabled="model.current_page" @click="moveTo(-1)">{{trans('diamondSearch.Previous')}}</a>
        <a class="border border-gray-400 px-4 "  @click="moveTo(-1)">@{{model.current_page-1}}</a></li>
        <a class="border border-gray-400 px-4 text-white bg-blue-600" >@{{model.current_page}}</a>
        <a class="border border-gray-400 px-4 " :aria-disable="model.current_page>model.last_page" @click="moveTo(1)">@{{model.current_page+1}}</a>
        <a class="border border-gray-400 px-4 " @click="moveTo(1)">{{trans('diamondSearch.Next')}}</a>

    </div>



