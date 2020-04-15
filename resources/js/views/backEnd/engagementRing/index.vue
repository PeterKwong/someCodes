<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.stock}}</td>
				<td>{{props.item.prong}}</td>
				<td>{{props.item.shoulder}}</td>
				<td>{{props.item.style}}</td>
				<td>{{props.item.ct}}</td>
				<td>{{props.item.unit_price}}</td>
				<td v-if="props.item.texts[0]">{{props.item.texts[0].content}}</td>
				<td>{{props.item.published}}</td>
				<td>{{props.item.created_at}}</td>
			</tr>
		</template>
	</data-viewer>

</template>

<script>
	import DataViewer from '../../../components/DataViewer.vue'

	export default {
		name: 'JewellryIndex',
		data(){
			return {
				title: 'Engagement Rings',
				source: '/api/engagementRingsInd',
				create:'/adm/engagement-rings/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'Stock', key: 'stock', sort: true},
				{ title: 'prong', key: 'prong', sort: true},
				{ title: 'shoulder', key: 'shoulder', sort: true},
				{ title: 'style', key: 'style', sort: true},
				{ title: 'side stone', key: 'ct', sort: true},
				{ title: 'Unit Price', key: 'unit_price', sort: true},
				{ title: 'texts', key: 'texts', sort: true},
				{ title: 'published', key: 'published', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true}
				],
				filter: [
				'stock' ,'id','texts' , 'prong','style' ,'ct' , 'published','unit_price',
				]
			}
		},
		components: {
			DataViewer 
				},
		methods: {
			clickRow(row){
				window.open('/adm/engagement-rings/'+ row.id )
			 },
		 }
	}
</script>