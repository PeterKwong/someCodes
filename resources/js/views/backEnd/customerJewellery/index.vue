<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.invoice_id}}</td>
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
		name: 'JewellryIndex',
		data(){
			return {
				title: 'Invoice Posts',
				source: '/api/invPostsInd',
				create:'/adm/invPosts/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'invoice_id', key: 'invoice_id', sort: true},
				{ title: 'texts', key: 'texts', sort: true},
				{ title: 'published', key: 'published', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true}
				],
				filter: [
				'id','texts' , 'invoice_id' , 'published',
				]
			}
		},
		components: {
			DataViewer 
				},
		methods: {
			clickRow(row){
				window.open('/adm/customer-jewelleries/'+ row.id )
			 },
		 }
	}
</script>