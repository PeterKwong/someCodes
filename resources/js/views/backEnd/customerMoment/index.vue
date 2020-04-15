<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.texts[0].content}}</td>
				<td>{{props.item.published}}</td>
				<td>{{props.item.created_at}}</td>
			</tr>
		</template>
	</data-viewer>

</template>

<script>
	import DataViewer from '../../../components/DataViewer.vue'

	export default {
		name: 'customerMoments',
		data(){
			return {
				title: 'Customer Moments',
				source: '/api/customerMomentsInd',
				create:'/adm/customerMoments/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'texts', key: 'texts', sort: true},
				{ title: 'published', key: 'published', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true}
				],
				filter: [
				'id','texts' , 'published',
				]
			}
		},
		components: {
			DataViewer 
				},
		methods: {
			clickRow(row){
				window.open('/adm/customer-moments/'+ row.id )
				},
			}
	}
</script>