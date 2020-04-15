import Vue from 'vue'
import VueRouter from 'vue-router'


//admin layouts
import AdmHeader from '../views/backEnd/adm/header.vue'
import AdmFooter from '../views/backEnd/adm/footer.vue'
import Admin from '../views/backEnd/adm/index.vue'
import AdmMain from '../views/backEnd/adm/main.vue'

//admin dashboard


//Customer
// import CusomterIndex from '../views/backEnd/customer/index.vue'
// import CustomerShow from '../views/backEnd/customer/show.vue'
// import CustomerForm from '../views/backEnd/customer/form.vue'

//invoice
// import InvoiceIndex from '../views/backEnd/invoice/index.vue'
// import InvoiceShow from '../views/backEnd/invoice/show.vue'
// import InvoiceForm from '../views/backEnd/invoice/form.vue'
// import InvoiceTotalSale from '../views/backEnd/invoice/totalSale.vue'


//invoice diamonds
// import InvDiamondIndex from '../views/backEnd/invDiamond/index.vue'
// import InvDiamondShow from '../views/backEnd/invDiamond/show.vue'
// import InvDiamondForm from '../views/backEnd/invDiamond/form.vue'

//invoice diamonds
// import JewelleryIndex from '../views/backEnd/jewellery/index.vue'
// import JewelleryShow from '../views/backEnd/jewellery/show.vue'
// import JewelleryForm from '../views/backEnd/jewellery/form.vue'

//Engagement Rings
// import EngagementRingIndex from '../views/backEnd/engagementRing/index.vue'
// import EngagementRingShow from '../views/backEnd/engagementRing/show.vue'
// import EngagementRingForm from '../views/backEnd/engagementRing/form.vue'

//wedding Rings
// import WeddingRingIndex from '../views/backEnd/weddingRing/index.vue'
// import WeddingRingShow from '../views/backEnd/weddingRing/show.vue'
// import WeddingRingForm from '../views/backEnd/weddingRing/form.vue'


//customer Jewelleries
// import CustomerJewIndex from '../views/backEnd/customerJewellery/index.vue'
// import CustomerJewShow from '../views/backEnd/customerJewellery/show.vue'
// import CustomerJewForm from '../views/backEnd/customerJewellery/form.vue'

//customer Moments
// import CustomerMomentIndex from '../views/backEnd/customerMoment/index.vue'
// import CustomerMomentShow from '../views/backEnd/customerMoment/show.vue'
// import CustomerMomentForm from '../views/backEnd/customerMoment/form.vue'

//Post
// import PostIndex from '../views/backEnd/post/index.vue'
// import PostShow from '../views/backEnd/post/show.vue'
// import PostForm from '../views/backEnd/post/form.vue'

//diamonds
// import DiamondForm from '../views/backEnd/diamondViewer/form.vue'
// import DiamondInd from '../views/backEnd/diamondViewer/index.vue'


//Auth
// import AdmLogin from '../views/backEnd/Auth/adm_login.vue'

//home
import Home from '../views/home.vue'


Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
	{path: '/', components: {} },

	// {path: '/td-login', component: AdmLogin},
	{path: '/adm', components: { default: Admin, header:AdmHeader, footer:AdmFooter},

		children:[
		{path:'', component: AdmMain},

		// {path: 'customers', component: CusomterIndex},
		// {path: 'customers/create', component: CustomerForm},
		// {path: 'customers/:id', component: CustomerShow},
		// {path: 'customers/:id/edit', component: CustomerForm, meta:{mode:'edit'}},

		// {path: 'invoices', component: InvoiceIndex},
		// {path: 'invoices/create', component: InvoiceForm},
		// {path: 'invoices/totalsale', component: InvoiceTotalSale},
		// {path: 'invoices/:id', component: InvoiceShow},
		// {path: 'invoices/:id/edit', component: InvoiceForm, meta:{mode:'edit'}},
		// {path: 'invoices/pdf/:id', component: InvoiceShow},

		// {path: 'items', component: ItemIndex},
		// {path: 'items/create', component: ItemForm},
		// {path: 'items/:id', component: ItemShow},
		// {path: 'items/:id/edit', component: ItemForm, meta:{mode:'edit'}},

		// {path: 'diamonds/create', component: DiamondForm},
		// {path: 'diamonds', component: DiamondInd},

		// {path: 'inv-diamonds', component: InvDiamondIndex},
		// {path: 'inv-diamonds/create', component: InvDiamondForm},
		// {path: 'inv-diamonds/:id', component: InvDiamondShow},
		// {path: 'inv-diamonds/:id/edit', component: InvDiamondForm, meta:{mode:'edit'}},

		// {path: 'jewellery', component: JewelleryIndex},
		// {path: 'jewellery/create', component: JewelleryForm, meta: {mode: 'create'}},
		// {path: 'jewellery/:id', component: JewelleryShow},
		// {path: 'jewellery/:id/edit', component: JewelleryForm, meta:{mode:'edit'}},

		// {path: 'engagement-rings', component: EngagementRingIndex},
		// {path: 'engagement-rings/create', component: EngagementRingForm, meta: {mode: 'create'}},
		// {path: 'engagement-rings/:id', component: EngagementRingShow},
		// {path: 'engagement-rings/:id/edit', component: EngagementRingForm, meta:{mode:'edit'}},

		// {path: 'wedding-rings', component: WeddingRingIndex},
		// {path: 'wedding-rings/create', component: WeddingRingForm, meta: {mode: 'create'}},
		// {path: 'wedding-rings/:id', component: WeddingRingShow},
		// {path: 'wedding-rings/:id/edit', component: WeddingRingForm, meta:{mode:'edit'}},


		// {path: 'posts', component: PostIndex},
		// {path: 'posts/create', component: PostForm, meta: {mode: 'create'}},
		// {path: 'posts/:id/edit', component: PostForm, meta: {mode: 'edit'}},
		// {path: 'posts/:id', component: PostShow},

		
		// {path: 'customer-jewelleries', component: CustomerJewIndex},
		// {path: 'customer-jewelleries/create', component: CustomerJewForm, meta: {mode: 'create'}},
		// {path: 'customer-jewelleries/:id/create', component: CustomerJewForm, meta: {mode: 'create'}},
		// {path: 'customer-jewelleries/:id/edit', component: CustomerJewForm, meta: {mode: 'edit'}},
		// {path: 'customer-jewelleries/:id', component: CustomerJewShow},

		// {path: 'customer-moments/create', component: CustomerMomentForm, meta: {mode: 'create'}},
		// {path: 'customer-moments/:id/edit', component: CustomerMomentForm, meta: {mode: 'edit'}},
		// {path: 'customer-moments/:id', component: CustomerMomentShow},
		// {path: 'customer-moments', component: CustomerMomentIndex},

		

		]},



	]
	
})
export default router