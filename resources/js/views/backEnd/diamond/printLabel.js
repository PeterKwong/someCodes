
export default {
	el:'#printLabel',
	data(){
		return {
			adminVar,
			query: adminVar.queryString.queryArray,
			string: '?gia=12412&color=g&weight=1.01&clarity=si2&stock=s14erw-2313-2&price=21141',
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
				width: 85,
				height: 85,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});

			return qrcode
		},
	}
}

