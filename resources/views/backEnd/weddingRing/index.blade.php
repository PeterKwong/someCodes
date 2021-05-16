@extends('backEnd.app')


  @section('content')

    <div id="weddingRingIndex">

		<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">
				<tr @click="clickRow(props.item)">
					<td v-if="props.item.id">@{{props.item.id}}</td>
					<td>@{{props.item.stock}}</td>
					<td>@{{props.item.shape}}</td>
					<td>@{{props.item.finish}}</td>
					<td>@{{props.item.metal}}</td>
					<td>@{{props.item.origin}}</td>
					<td>@{{props.item.style}}</td>
					<td>@{{props.item.brand}}</td>
					<td>@{{props.item.ct}}</td>
					<td><p class="truncate">@{{props.item.metal_weight}}</p></td>
					<td>@{{props.item.unit_price}}</td>
					<td v-if="props.item.texts[0]">@{{props.item.texts[0].content}}</td>
					<td><img width="256" :src="props.item.wedding_ring_pair.images.length > 0 ? 
							adminVar.storage[adminVar.storage.live] + 'public/images/'+ props.item.wedding_ring_pair.images[0].image:'' "></td>
					<td>@{{props.item.published}}</td>
					<td>@{{props.item.created_at}}</td>
				</tr>
			</template>
		</data-viewer>

    </div>


  @endSection

