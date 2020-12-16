import langsJew from './jewelleries'
import langsDia from './diamondViewer'
import langsEnga from './engagementRings'
import langsWedd from './weddingRings'
import langsShoppingCart from './shoppingCart'
import { get } from '../helpers/api'

window.langs = langsDia.concat(langsEnga,langsWedd, langsJew,langsShoppingCart)

// function fetchTranslate(){
// 	get(`/api/langs`)
// 	.then((res)=>{
// 		console.log(res.data)
// 	})
// }

// fetchTranslate()