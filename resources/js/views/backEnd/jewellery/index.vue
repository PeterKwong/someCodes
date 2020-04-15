<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.stock}}</td>
				<td>{{props.item.type}}</td>
				<td>{{props.item.gemstone}}</td>
				<td>{{props.item.setting}}</td>
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
		name: 'JewelleryIndex',
		data(){
			return {
				title: 'Jewellery',
				source: '/api/jewelleryInd',
				create:'/adm/jewellery/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'Stock', key: 'stock', sort: true},
				{ title: 'type', key: 'type', sort: true},
				{ title: 'gemstone', key: 'gemstone', sort: true},
				{ title: 'setting', key: 'setting', sort: true},
				{ title: 'side stone', key: 'ct', sort: true},
				{ title: 'Unit Price', key: 'unit_price', sort: true},
				{ title: 'texts', key: 'texts', sort: true},
				{ title: 'published', key: 'published', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true}
				],
				filter: [
				'stock' ,'id','type' ,'ct' , 'published','unit_price',
				]
			}
		},
		components: {
			DataViewer 
				},
		methods: {
			clickRow(row){
				window.open('/adm/jewellery/'+ row.id )
			 },
		 }
	}
</script>