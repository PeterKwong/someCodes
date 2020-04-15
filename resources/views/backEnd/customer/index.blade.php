@extends('backEnd.app')


  @section('content')

    <div id="customerIndex">

		<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title" :url="url">
			<template slot-scope="props">
				<tr @click="clickRow(props.item)">
					<td>@{{props.item.id}}</td>
					<td>@{{props.item.name}}</td>
					<td>@{{props.item.phone}}</td>
					<td>@{{props.item.email}}</td>
					<td>@{{props.item.created_at}}</td>
				</tr>
			</template>
		</data-viewer>

	</div>
	
   @endsection