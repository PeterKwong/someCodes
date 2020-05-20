import {curlGet} from '../api'

export function getGoldPrice(){
	var data = {'18K':440, 
				'PT':230}
		// var data 
		// curlGet('https://data-asg.goldprice.org/dbXRates/USD')
		// 	.then((res, data)=>{

		// 		data = res.data.items[0].xauClose
		// 		console.log(res.data.items[0].xauClose)
		// 	})

	return data
}