@extends('backEnd.app')


  @section('content')

    <div id="invoiceDiamondIndex">

    	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">
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
					<td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="btn btn-primary text-white">Due Now</a></td>
					<td>@{{  props.item.stock | regExp('-C[0-9]*' , props.item.price ) }}</td>
					<td>@{{props.item.created_at}}</td>
				</tr>
			</template>
		</data-viewer>

    </div>


  @endSection

