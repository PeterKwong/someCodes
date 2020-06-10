
export default {

	el: '#invoiceExport',
	components: { },

	data(){

		return {
				form:{
					year: new Date().getFullYear(),
					 month: new Date().getMonth()
						},
				data:{stocks:'', invoices:''} ,
				labels:'',
				totalAmount:0,

		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		// this.fetchData()
	},
	computed:{
		
	},
	methods:{
		fetchData(){
			get(`/api/accounting/invoice-export` + '?year=' + this.form.year + '&month=' + this.form.month ,)
			.then((res)=>{
				this.data.invoices = res.data.model
				this.exportInvoiceToCSV()
			})
			get(`/api/accounting/stock-export` + '?year=' + this.form.year + '&month=' + this.form.month ,)
			.then((res)=>{
				this.data.stocks = res.data.model
				this.exportStockToCSV()
			})
		},
		exportInvoiceToCSV(){
			var title = 'invoice no,sub total,discount,balance,total' + ',diamond,stock,DC, jewellery,Engagement rings,wedding rings' + ',create at date,title' + "\n" 
			const rows = this.data.invoices.map((e)=>{
							e = e.invoice_no +',' + e.sub_total + ',' + e.discount +',' + e.balance + ','  + e.total + ','  +  
								( e.invoice_diamonds.length > 0 ? e.invoice_diamonds[0].price : '') + ','  +
								( e.invoice_diamonds.length > 0 ? e.invoice_diamonds[0].stock : '') + ','  +
								( e.invoice_diamonds.length > 0 ? this.regExp(e.invoice_diamonds[0].stock) : '') + ','  +
								( e.jewelleries.length > 0 ? e.jewelleries[0].unit_price : '') + ','  +
								( e.engagement_rings.length > 0 ? e.engagement_rings[0].unit_price : '') + ','  +
								( e.wedding_rings.length > 0 ? e.wedding_rings[0].unit_price : '') + ','  +
								e.created_at + ',' + e.title 
							return e
						}).join("\n");

			let csvContent = "data:text/csv;charset=utf-8," + title + rows;
			this.exportToCSV('Invoices', csvContent)
		},
		exportStockToCSV(){
			var title = 'id,price,weight,color,cut,clarity,polish,symmetry,fluorescence,certificate,stock,shape,created at,due date' +"\n" 
			const rows = this.data.stocks.map((e)=>{
							e = e.id +',' + e.price + ',' + e.weight +',' + e.color + ','  + e.cut + ','  +   e.clarity + ','  +
								e.polish +',' + e.symmetry + ',' + e.fluorescence +',' + e.certificate + ','  + e.stock + ','  + e.shape + ','  +
								e.created_at + ','  + e.due_date + ',' 


						return e
						}).join("\n");

			let csvContent = "data:text/csv;charset=utf-8," + title + rows;
			this.exportToCSV('Stocks', csvContent)
		},
		exportToCSV(filename,csvContent){

			var encodedUri = encodeURI(csvContent);

			var date = this.form.year + '-' + this.form.month

			var link = document.createElement("a");
			link.setAttribute("href", encodedUri);
			link.setAttribute("download", filename + "-" + date + ".csv");
			document.body.appendChild(link); // Required for FF

			link.click(); 
		},
		regExp(source){
			var pattern = new RegExp('-C[0-9]*','i')
			var result = pattern.exec(source)

			if(result != null){
				var oriPrice = result.toString().slice(2).split("").reverse().join("") *10
				return oriPrice
			}
		}

	}
}