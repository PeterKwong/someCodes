@extends('backEnd.app')


  @section('content')

    <div id="customerJewelleryIndex">

		<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">
				<tr @click="clickRow(props.item)">
					<td>@{{props.item.id}}</td>
					<td>@{{props.item.invoice_id}}</td>
					<td v-if="props.item.texts">@{{props.item.texts[0].content}}</td>
					<td><img width="256" :src="props.item.images.length > 0 ? 
						adminVar.storage[adminVar.storage.live] + 'public/images/'+ props.item.images[0].image:'' "></td>
					<td>@{{props.item.published}}</td>
					<td>@{{props.item.created_at}}</td>
				</tr>
			</template>
		</data-viewer>

    </div>


  @endSection

