<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.price}}</td>
				<td>{{props.item.weight}}</td>
				<td>{{props.item.color}}</td>
				<td>{{props.item.clarity}}</td>
				<td>{{props.item.cut}}</td>
				<td>{{props.item.polish}}</td>
				<td>{{props.item.symmetry}}</td>
				<td>{{props.item.fluorescence}}</td>
				<td>{{props.item.certificate}}</td>
				<td>{{props.item.due_date}}</td>
				<td>{{props.item.stock}}</td>
				<td>{{props.item.shape}}</td>
				<td>{{props.item.lab}}</td>
				<td>{{props.item.created_at}}</td>
				<td>{{  props.item.stock | regExp('-C[0-9]*' , props.item.price ) }}</td>
				<td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="button is-primary">Due Now</a></td>
			</tr>
		</template>
	</data-viewer>

</template>

<script>
	import DataViewer from '../../../components/DataViewer.vue'

	export default {
		name: 'InvDiamondsIndex',
		data(){
			return {
				title: 'Invoice Diamonds',
				source: '/api/invDiamonds',
				create:'/adm/invDiamonds/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'Price', key: 'price', sort: true},
				{ title: 'Weight', key: 'weight', sort: true},
				{ title: 'Color', key: 'color', sort: true},
				{ title: 'Clarity', key: 'clarity', sort: true},
				{ title: 'Cut', key: 'cut', sort: true},
				{ title: 'Polish', key: 'polish', sort: true},
				{ title: 'Symmetry', key: 'symmetry', sort: true},
				{ title: 'Fluorescence', key: 'fluorescence', sort: true},
				{ title: 'Certificate', key: 'certificate', sort: true},
				{ title: 'Due Date', key: 'due_date', sort: true},
				{ title: 'Stock', key: 'stock', sort: true},
				{ title: 'Shape', key: 'shape', sort: true},
				{ title: 'Lab', key: 'lab', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true},
				{ title: 'Extra', key: 'stock', sort: true},
				{ title: 'Due Status', key: 'due_date', sort: true},
				],
				filter: [
				'id', 'price', 'weight', 'color', 'clarity', 'fluorescence', 'certificate', 'stock', 'cut', 'polish', 'symmetry', 'shape', 'lab'
				]
			}
		},
		components: {
			DataViewer 
				},
		filters:{
			regExp(source, str, price){
				var pattern = new RegExp(str,'i')
				var result = pattern.exec(source)

					console.log(result)

				if(result != null){
					var oriPrice = result.toString().slice(2).split("").reverse().join("") * 7.85 *10
					var profit = Math.round( ((price - oriPrice) / oriPrice) * 100 )
					return profit
				}

			}
		},
		methods: {
			clickRow(row){
				window.open('/adm/inv-diamonds/'+ row.id )
				},
			setDue(row){
				window.open('/api/invDiamonds-update-due-date/'+ row.id )
				window.open('/adm/inv-diamonds/', '_self')
				},
			}
	}
</script>