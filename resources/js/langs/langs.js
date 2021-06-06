import langsHeader from './header'
import langsShoppingCart from './shoppingCart'

import langsJew from './jewelleries'
import langsDia from './diamondViewer'
import langsEnga from './engagementRings'
import langsWedd from './weddingRings'

import { get } from '../helpers/api'

window.langs = langsShoppingCart.concat(
					langsHeader, 
					langsDia,
					langsEnga, 
					langsWedd, 
					langsJew,
					// langsShoppingCart,
					)

// function fetchTranslate(){
// 	get(`/api/langs`)
// 	.then((res)=>{
// 		console.log(res.data)
// 	})
// }

// fetchTranslate()