@extends('backEnd.app')


  @section('content')

    <div id="diamondIndex">


	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
		<template slot-scope="props">
			<tr>
				<td>@{{props.item.id}}
					<button class="btn btn-primary" @click.prevent="editDiamond(props.item)">Edit
					</button>
				</td>
				<td  @click.prevent="saveToInvDiamond(props.item)"><button class="btn btn-primary">Invoice Diamond</button></td>
				<td @click="clickRow(props.item)">@{{props.item.price}}</td>
				<td @click="clickRow(props.item)">@{{props.item.stock}}</td>
				<td @click="clickRow(props.item)">@{{props.item.weight}}</td>
				<td>@{{props.item.certificate}}
					<button class="btn btn-primary" @click.prevent="oncallHold(props.item.certificate)">Hold</button>
					<button class="btn btn-primary" @click.prevent="oncallConfirm(props.item.certificate)">confirm</button>
				</td>
				<td @click="clickRow(props.item)">@{{props.item.color}}</td>
				<td @click="clickRow(props.item)">@{{props.item.clarity}}</td>
				<td @click="clickRow(props.item)">@{{props.item.cut}}</td>
				<td @click="clickRow(props.item)">@{{props.item.polish}}</td>
				<td @click="clickRow(props.item)">@{{props.item.symmetry}}</td>
				<td @click="clickRow(props.item)">@{{props.item.fluorescence}}</td>
				<td @click="clickRow(props.item)">@{{props.item.milky}}</td>
				<td @click="clickRow(props.item)">@{{props.item.brown}}</td>
				<td @click="clickRow(props.item)">@{{props.item.green}}</td>
				<td @click="clickRow(props.item)">@{{props.item.location}}</td>
				<td>
					<center>
					<button class="btn btn-primary" @click.prevent="setDue(props.item)">@{{props.item.available}}</button>
					<a class="btn btn-primary" :href=" '/hk/gia-loose-diamonds/' + props.item.id + '/ava' " target="_blank">Check</a>
					</center>
				</td>
				<td>
					<center>
					<button class="btn btn-primary" @click.prevent="toggleStarredDiamond(props.item)">@{{props.item.starred}}</button>
					</center>
				</td>
				<td @click="clickRow(props.item)"><img width="256" :src="props.item.heart_image ? props.item.heart_image:'' "></td>
				<td @click="clickRow(props.item)"><img width="256" :src="props.item.arrow_image ? props.item.arrow_image:'' "></td>
				<td @click="clickRow(props.item)"><img width="256" :src="props.item.asset_image ? props.item.asset_image:'' "></td>
				<td @click="clickRow(props.item)">@{{props.item.has_video}}</td>
				<td @click="clickRow(props.item)">@{{props.item.lab}}</td>
				<td @click="clickRow(props.item)">@{{props.item.updated_at}}</td>
				<td @click="clickRow(props.item)">@{{props.item.created_at}}</td>
			</tr>
		</template>
	</data-viewer>


   @endSection
