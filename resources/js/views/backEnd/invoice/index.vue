<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<!-- <tr @click="$router.push('/adm/invoices/' + props.item.id)" v-if="userRole=='admin' || props.item.count"> -->
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.invoice_no}}</td>
<!-- 				<td>{{props.item.inv_posts[0].id}}</td>
 -->				<td>{{props.item.date}}</td>
				<td>{{props.item.customer.name}}</td>
				<td>{{props.item.title}}</td>
				<td>{{props.item.deposit}}</td>
				<td>{{props.item.balance}}</td>
				<td>{{props.item.total}}</td>
				<td>{{props.item.due_date}}</td>
				<td>{{props.item.created_at}}</td>
				<td>{{props.item.count}}</td>
				<td @click="setDue(props.item)" v-if="!props.item.due_date"><a class="button is-primary">Due Now</a></td>
			</tr>
		</template>
	</data-viewer>

</template>

<script>
	import DataViewer from '../../../components/DataViewer.vue'
	import Auth from '../../../store/auth'

	export default {
		name: 'InvoiceIndex',
		data(){
			return {
				title: 'Invoices',
				source: '/api/invoices',
				create:'/adm/invoices/create',
				userRole: Auth.state.user_role,
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'Invoice No', key: 'invoice_no', sort: true},
				{ title: 'Date', key: 'date', sort: true},
				{ title: 'Customer', key: 'customer', sort: false},
				{ title: 'title', key: 'title', sort: true},
				{ title: 'deposit', key: 'deposit', sort: true},
				{ title: 'balance', key: 'balance', sort: true},
				{ title: 'Amount' , key: 'total', sort: true},
				{ title: 'Due At', key: 'due_date', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true},
				{ title: 'Account', key: 'count', sort: true},
				{ title: 'Due Status', key: 'due_date', sort: true},
				],
				filter: [
				      	'id', 'customer.phone','customer.name', 
            			'customer_id', 'title', 'date', 'due_date', 'discount',
        				'sub_total', 'deposit', 'balance','total',
        				
				]
			}
		},
		components: {
			DataViewer 
				},
		methods: {
			clickRow(row){
				window.open('/adm/invoices/'+ row.id, )
			},
			setDue(row){
				window.open('/api/invoices-update-due-date/'+ row.id,)
				window.open('/adm/invoices/', '_self')
				},
		}
	}
</script>