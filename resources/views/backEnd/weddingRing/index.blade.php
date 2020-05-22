@extends('backEnd.app')


  @section('content')

    <div id="weddingRingIndex">

		<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">
				<tr @click="clickRow(props.item)">
					<td v-if="props.item.id">@{{props.item.id}}</td>
					<td>@{{props.item.stock}}</td>
					<td>@{{props.item.metal}}</td>
					<td>@{{props.item.style}}</td>
					<td>@{{props.item.ct}}</td>
					<td>@{{props.item.metal_weight}}</td>
					<td>@{{props.item.unit_price}}</td>
					<td v-if="props.item.texts[0]">@{{props.item.texts[0].content}}</td>
					<td><img width="256" :src="props.item.images.length > 0 ? 
							adminVar.storage[adminVar.storage.live] + 'public/images/'+ props.item.images[0].image:'' "></td>
					<td>@{{props.item.published}}</td>
					<td>@{{props.item.created_at}}</td>
				</tr>
			</template>
		</data-viewer>

    </div>


  @endSection

