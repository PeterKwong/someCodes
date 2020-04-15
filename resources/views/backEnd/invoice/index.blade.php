@extends('backEnd.app')


  @section('content')

    <div id="invoiceIndex">


		<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">

				<tr @click="clickRow(props.item)">
					<td>@{{props.item.id}}</td>
					<td>@{{props.item.invoice_no}}</td>
	<!-- 				<td>@{{props.item.inv_posts[0].id}}</td>
	 -->				<td>@{{props.item.date}}</td>
					<td>@{{props.item.customer.name}}</td>
					<td>@{{props.item.title}}</td>
					<td>@{{props.item.deposit}}</td>
					<td>@{{props.item.balance}}</td>
					<td>@{{props.item.total}}</td>
					<td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="btn btn-primary text-white">Due Now</a></td>
					<td v-else>@{{props.item.due_date}}</td>
					<td><img v-if="props.item.inv_posts.length > 0" width="256" 
							:src=" props.item.inv_posts[0].images.length > 0 ? 
							globeVar.storage[globeVar.storage.live] + 'public/images/'+ props.item.inv_posts[0].images[0].image:'' "></td>
					<td>@{{props.item.created_at}}</td>
					<td>@{{props.item.count}}</td>
				</tr>
			</template>
		</data-viewer>

    </div>


  @endSection

