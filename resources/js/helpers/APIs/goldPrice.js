import {curlGet} from '../api'

export function getGoldPrice(){
	var data = 1700
		// curlGet('https://data-asg.goldprice.org/dbXRates/USD')
		// 	.then((res, data)=>{
		// 		console.log(data)				
		// 		data = res.data.items[0].xauClose
		// 		console.log(res.data.items[0].xauClose)
		// 	})
	return data
}