@extends('backEnd.app')


  @section('content')

    <div id="orderIndex">

            <data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
              <template scope="props">
                <!-- <tr @click="$router.push('/adm/invoices/' + props.item.id)" v-if="userRole=='admin' || props.item.count"> -->
                <tr>
                  <td>@{{props.item.id}}</td>
					<td  @click="clickRow(props.item)">@{{props.item.invoice_id}} <button v-if="!props.item.invoice_id" class="btn btn-primary">Invoice</button></td>
					<td>@{{props.item.date}}</td>
					<td>@{{props.item.customer.name}}</td>
					<td>@{{props.item.title}}</td>
					<td>@{{props.item.discount}}</td>
					<td>@{{props.item.extra}}</td>
					<td>@{{props.item.sub_total}}</td>
					<td>@{{props.item.deposit}} <button class="btn btn-primary" v-if="props.item.deposit_method == 'VISA' && props.item.status != 'received money' " @click="chargeByStripe(props.item)">Charge</button></td>
					<td>@{{props.item.balance}}</td>
					<td>@{{props.item.balance_method}}</td>
					<td>@{{props.item.total}}</td>
					<td>@{{props.item.coupon_code}}</td>
					<td>
						<select class="form-control" v-model="props.item.status" class="select">
							<option value="ordering">ordering</option>
							<option value="received money">received money</option>
							<option value="shipping">shipping</option>
							<option value="arrived">arrived</option>
							<option value="mounting">mounting</option>
							<option value="ready to take">ready to take</option>
							<option value="taken">referral taken</option>
							<option value="cancelled">cancelled</option>
						</select> 
						<button @click="nextStatus(props.item)" class="btn btn-primary">Update</button> </td>
					<td>@{{props.item.verified}}</td>
					<td>@{{props.item.due_date}}</td>
					<td>@{{props.item.created_at}}</td>
                </tr>
              </template>
            </data-viewer>

    </div>


  @endSection

