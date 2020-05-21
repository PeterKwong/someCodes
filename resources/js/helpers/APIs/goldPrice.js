import {curlGet} from '../api'

export function getGoldPrice(){
	var priceFactor = 1.9
	var K18 = 440 * priceFactor
	var PT = 230 * priceFactor
	var data = {metal18KW:K18,
				metal18KY:K18,
				metal18KR:K18,
				metalMixed:K18,
				metalPT:PT}

	return data
}