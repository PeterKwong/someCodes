import axios from 'axios'


export function	readDiamond(){

		reqData = {
				  "request": {
				    "header": {
				      "username": "tingdiamond",
				      "password": "T92872482d"
				    },
				    "body": {
				      "search_type": "White",
				      "shapes": [
				        "Round"
				      ],
				      "labs": [
				        "GIA"
				      ],
				      "size_from": "0.3",
				      "size_to": "15",
				      "color_from": "D",
				      "color_to": "K",
				      "clarity_from": "IF",
				      "clarity_to": "I1",
				      "cut_from": "Excellent",
				      "cut_to": "Good",
				      "polish_from": "Excellent",
				      "polish_to": "Good",
				      "symmetry_from": "Excellent",
				      "symmetry_to": "Good",
				      "price_total_from": "300",
				      "price_total_to": "5000000",
				      "fancy_color_intensity_from": "",
				      "fancy_color_intensity_to": "",
				      "page_number": "1",
				      "page_size": "20"
				    }
				  }
				}

		URL = "https://technet.rapaport.com/HTTP/JSON/RetailFeed/GetDiamonds.aspx ";


		return axios({
		method: 'POST',
		url: URL,
		data:{ reqData }, 
		})

}