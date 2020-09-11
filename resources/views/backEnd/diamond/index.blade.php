@extends('backEnd.app')


  @section('content')

    <div id="diamondIndex">


	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>@{{props.item.id}}
					<button class="btn btn-primary" @click="editDiamond(props.item)">Edit
					</button>
				</td>
				<td  @click="saveToInvDiamond(props.item)"><button class="btn btn-primary">Invoice Diamond</button></td>
				<td>@{{props.item.price}}</td>
				<td>@{{props.item.stock}}</td>
				<td>@{{props.item.weight}}</td>
				<td>@{{props.item.certificate}}</td>
				<td>@{{props.item.color}}</td>
				<td>@{{props.item.clarity}}</td>
				<td>@{{props.item.cut}}</td>
				<td>@{{props.item.polish}}</td>
				<td>@{{props.item.symmetry}}</td>
				<td>@{{props.item.fluorescence}}</td>
				<td>@{{props.item.milky}}</td>
				<td>@{{props.item.brown}}</td>
				<td>@{{props.item.green}}</td>
				<td>@{{props.item.location}}</td>
				<td>
					<center>
					<button class="btn btn-primary" @click="setDue(props.item)">@{{props.item.available}}</button>
					<a class="btn btn-primary" :href=" '/hk/gia-loose-diamonds/' + props.item.id + '/ava' " target="_blank">Check</a>
					</center>
				</td>
				<td>
					<center>
					<button class="btn btn-primary" @click="toggleStarredDiamond(props.item)">@{{props.item.starred}}</button>
					</center>
				</td>
				<td><img width="256" :src="props.item.heart_image ? props.item.heart_image:'' "></td>
				<td><img width="256" :src="props.item.arrow_image ? props.item.arrow_image:'' "></td>
				<td><img width="256" :src="props.item.asset_image ? props.item.asset_image:'' "></td>
				<td>@{{props.item.has_video}}</td>
				<td>@{{props.item.lab}}</td>
				<td>@{{props.item.updated_at}}</td>
				<td>@{{props.item.created_at}}</td>
			</tr>
		</template>
	</data-viewer>


   @endSection
