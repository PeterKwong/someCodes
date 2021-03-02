@extends('backEnd.app')

	@section('content')

	   <div id="onStockDiamond">

            <br>
            
       @if(auth()->user()->roles()->first() == 'admin' )      


            <div class="columns is-mobiled" > 


                <div class="column">     
                    <p class="title is-4">
                      Diamond : <strong style="color: #0000ff">$ @{{dueDiamonds.totalAmount}} </strong>
                    </p>
                </div>


            </div>

      @endif

      @if(auth()->user()->roles()->first() == 'admin' || auth()->user()->roles()->first() == 'purchase' )      


            <div class="columns is-mobiled" > 


                <div class="column">     
                    <p class="title is-4">
                      Available Limits : <strong style="color: #0000ff">$ @{{ 900000 - dueDiamonds.totalAmount }} </strong>
                    </p>
                </div>


            </div>

      @endif

                <vue-chart v-if="computedData.length" :labels="labels" :data="computedData" ></vue-chart>

            <br>
            <br>
            <br>

            <data-viewer :source = "dataViewer.source" :thead="dataViewer.thead" :filter="dataViewer.filter" :create="dataViewer.create" :title="dataViewer.title" :column="column" :per_page="dataViewer.per_page" :url="url">
              <template scope="props">
                <!-- <tr @click="$router.push('/adm/invoices/' + props.item.id)" v-if="userRole=='admin' || props.item.count"> -->
                <tr @click="clickRow(props.item)">
                  <td>@{{props.item.id}}</td>
                  <td>@{{props.item.price}}</td>
                  <td>@{{props.item.weight}}</td>
                  <td>@{{props.item.color}}</td>
                  <td>@{{props.item.clarity}}</td>
                  <td>@{{props.item.cut}}</td>
                  <td>@{{props.item.polish}}</td>
                  <td>@{{props.item.symmetry}}</td>
                  <td>@{{props.item.fluorescence}}</td>
                  <td>@{{props.item.certificate}}</td>
                  <td>@{{props.item.due_date}}</td>
                  <td>@{{props.item.stock}}</td>
                  <td>@{{props.item.shape}}</td>
                  <td>@{{props.item.lab}}</td>
                  <td>@{{props.item.created_at}}</td>
                  <td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="btn btn-primary">Due Now</a></td>
                </tr>
              </template>
            </data-viewer>

            <br>
            <br>


        </div>


	@endsection