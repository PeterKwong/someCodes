import Vue from 'vue'
import VueRouter from 'vue-router'

//layouts
import Header from '../views/layouts/header.vue'
import Footer from '../views/layouts/footer.vue'



//Auth
import AdmLogin from '../views/backEnd/Auth/adm_login.vue'

//home
import Home from '../views/home.vue'


Vue.use(VueRouter)

const router = new VueRouter({
	mode: 'history',
	routes: [
	{path: '/', components: {header:Header, default: Home, footer:Footer}, 

		children:[
		{path:'',  },

	
		]},

	{path: '/en', components: {header:Header, default: Home, footer:Footer}, 
		children:[
		{path:'',  },
	

		]},


	{path: '/hk', components: {header:Header, default: Home, footer:Footer}, 
		children:[
		{path:'',  },

	
		]},


	{path: '/cn', components: {header:Header, default: Home, footer:Footer}, 
		children:[
		{path:'', },

	
		]},

	]
	
})
export default router