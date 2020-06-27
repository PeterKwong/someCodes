<div class="section-3 d-none d-sm-block">

  @include('diamond.searchDesktop')

</div>









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

       @include('diamond.searchMobile')

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
                    <option v-for="column in columns" :value="column">
                        <a @click="toggleOrder(column)">@{{column | transJs(langs,locale)}}</a>
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
                            <th v-for="column in columns" @click="toggleOrder(column)">
                                <span>@{{ column | transJs(langs,locale) }}</span>
                                <span class="dv-table-column" v-if="column === query.column">
                                    <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                                    <span v-else >&#x25B2;</span>
                                </span>
                            </th>
                            <th @click="toggleOrder('crownAngle')" v-if="fetchData.crownAngle[1] != 0 ">
                                <span>{{trans('diamondSearch.Crown Angle')}}</span>
                                <span class="dv-table-column" v-if=" 'crownAngle' === query.column">
                                    <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                                    <span v-else >&#x25B2;</span>
                                </span>
                            </th>
                            <th @click="toggleOrder('parvilionAngle')" v-if="fetchData.parvilionAngle[1] != 0 ">
                                <span>{{trans('diamondSearch.Parvilion Angle')}}</span>
                                <span class="dv-table-column" v-if=" 'parvilionAngle' === query.column">
                                    <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                                    <span v-else >&#x25B2;</span>
                                </span>
                            </th>
                            <th @click="toggleOrder('tablePercent')" v-if="fetchData.tablePercent[1] != 0 ">
                                <span>{{trans('diamondSearch.Table Percent')}}</span>
                                <span class="dv-table-column" v-if=" 'tablePercent' === query.column">
                                    <span v-if="query.direction === 'desc' ">&#x25BC;</span>
                                    <span v-else >&#x25B2;</span>
                                </span>
                            </th>
                            <th @click="toggleOrder('depthPercent')" v-if="fetchData.depthPercent[1] != 0 ">
                                <span>{{trans('diamondSearch.Depth Percent')}}</span>
                                <span class="dv-table-column" v-if=" 'depthPercent' === query.column">
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
                            <td v-if="fetchData.tablePercent[1] != 0 "> @{{ row.table_percent }}</td>
                            <td v-if="fetchData.depthPercent[1] != 0 "> @{{ row.depth_percent }}</td>
                            <td v-if="fetchData.crownAngle[1] != 0 "> @{{ row.crown_angle }}</td>
                            <td v-if="fetchData.parvilionAngle[1] != 0 "> @{{ row.parvilion_angle }}</td>

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

          <div class="row justify-content-center text-center" >
            <div class="col">
              <h5 class="color-blue">
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
                <span v-if="fetchData.tablePercent[1] != 0 "> @{{ row.table_percent }}
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.depthPercent[1] != 0 "> @{{ row.depth_percent }}
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.crownAngle[1] != 0 "> @{{ row.crown_angle }}
                  <strong style="opacity: 0.3"> | </strong>
                </span>
                <span v-if="fetchData.parvilionAngle[1] != 0 "> @{{ row.parvilion_angle }}
                </span>
              </p>

            </div>
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


