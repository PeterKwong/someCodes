
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#invoiceDiamondIndex',
	name: 'InvoiceDiamondsIndex',
	data(){
		return {
			title: 'Invoice Diamonds',
			source: '/api/invoiceDiamonds',
			url:'/adm/invoice-diamonds',
			create:'/adm/invoiceDiamonds/create',
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
			{ title: 'Due Status', key: 'due_date', sort: true},
			{ title: 'Extra', key: 'stock', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true},
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

			if(result != null){
				var oriPrice = result.toString().slice(2).split("").reverse().join("") * 7.85 *10
				var profit = Math.round( ((price - oriPrice) / oriPrice) * 100 )
				return profit
			}

		}
	},
	methods: {
		clickRow(row){
			window.open('/adm/invoice-diamonds/'+ row.id )
			},
		setDue(row){
			window.open('/api/invoice-diamonds-update-due-date/'+ row.id )
			window.open('/adm/invoice-diamonds?p=' + globeVar.queryString.page, '_self')
			},
		}
}
