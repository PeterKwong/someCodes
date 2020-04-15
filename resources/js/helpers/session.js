export default{
	cart:{
		diamond:[],
		engagementRing:[],
		jewellery:[],

	},

	setCartSession(type,arrayObj){
		this.cart[type] = arrayObj
	},

}