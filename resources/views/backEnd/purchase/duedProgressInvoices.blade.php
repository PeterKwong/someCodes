@extends('backEnd.app')


  @section('content')

        <div id="duedProgressInvoice">
            <div class="level"> 
                <p class="title is-4">
                  Total Amount <strong style="color: #0000ff">$ @{{totalAmount}} </strong>
                </p>
            </div>

            <vue-chart v-if="computedData.length" :labels="labels" :data="computedData" ></vue-chart>

            <br>
            <br>
            <br>


            <data-viewer :source = "dataViewer.source" :thead="dataViewer.thead" :filter="dataViewer.filter" :create="dataViewer.create" :title="dataViewer.title">
              <template scope="props">
                <!-- <tr @click="$router.push('/adm/invoices/' + props.item.id)" v-if="userRole=='admin' || props.item.count"> -->
                <tr @click="clickRow(props.item)">
                  <td>@{{props.item.id}}</td>
                  <td>@{{props.item.invoice_no}}</td>
                  <td>@{{props.item.date}}</td>
                  <td>@{{props.item.customer.name}}</td>
                  <td>@{{props.item.title}}</td>
                  <td>@{{props.item.deposit}}</td>
                  <td>@{{props.item.balance}}</td>
                  <td>@{{props.item.total}}</td>
                  <td>@{{props.item.due_date}}</td>
                  <td>@{{props.item.created_at}}</td>
                  <td>@{{props.item.count}}</td>
                  <td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="btn btn-primary">Due Now</a></td>
                </tr>
              </template>
            </data-viewer>

    </div>


  @endSection
