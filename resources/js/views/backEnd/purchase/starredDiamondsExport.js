
export default {

	el: '#starredDiamondsExport',
	components: { },

	data(){

		return {
				form:{ year: new Date().getFullYear(),
					   month: new Date().getMonth()
						},
				data:{ diamonds:''} ,
				labels:'',
				totalAmount:0,
				isLoading: false,

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
			this.isLoading = true
			get(`/api/purchase/starred-diamonds-export`,)
			.then((res)=>{
				console.log(res.data)
				this.data.diamonds = res.data.model
				this.exportDiamondsToCSV()
				this.isLoading = false

			})
		},
		exportDiamondsToCSV(){
			var title = 'id,price,weight,color,cut,clarity,polish,symmetry,fluorescence,certificate,stock,supplier,shape,created at,due date' +"\n" 
			const rows = this.data.diamonds.map((e)=>{
							e = e.id +',' + e.price + ',' + e.weight +',' + e.color + ','  + e.cut + ','  +   e.clarity + ','  +
								e.polish +',' + e.symmetry + ',' + e.fluorescence +',' + e.certificate + ','  + e.stock + ','  + e.supplier.id+ ','  + e.shape + ','  +
								e.created_at + ','  + e.due_date + ',' 


						return e
						}).join("\n");

			let csvContent = "data:text/csv;charset=utf-8," + title + rows;
			this.exportToCSV('diamonds', csvContent)
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