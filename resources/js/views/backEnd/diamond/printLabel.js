
export default {
	el:'#printLabel',
	data(){
		return {
			adminVar,
			query: adminVar.queryString.queryArray,
			string: '?gia=12412&color=g&weight=1.01&clarity=si2&stock=s14erw-2313-2&price=21141',
			code: JsBarcode("#barcode1", adminVar.queryString.queryArray(['gia']).gia , {
			  // fontSize: 40,
			  background: "#ffffff",
 			  displayValue: false,
			  // margin: 40,
			  margin:1,
			  height: 10,
  			  width: 1
			}),
		}
	},
	mounted(){
		this.QRcode()
	},
	computed:{
		data(){
			var data = ['gia','price','color','weight','clarity','stock']
			return this.query(data) 
		},

	},
	methods: {
		QRcode(){
			var qrcode = new QRCode(document.getElementById("qrcode"), {
				text: this.data.gia ,
				width: 80,
				height: 80,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});

			return qrcode
		},

	}
}

