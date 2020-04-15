<template>

	<div v-if="currentUrl != ''">

		<br>

		 <div v-if="selectingType=='diamonds' || selectingType=='engagementRings' || selectingType == 'review' ">
		 	<div v-if="mutualVar.cookiesInfo.shoppingCart.items.length">
                 <div class="row justify-content-center">

					    <div class="col-4 border d-sm-block d-none" :class="{' background-primary': selectingType == shortenName[0].type }"  v-if="shortenName[0]"  >

					      <a class="nav-link " v-if="shortenName[0]">

					        <p :class="{'color-white': selectingType == shortenName[0].type }" v-if="shortenName[0]">
					        	<strong @click="directTo(0)" v-if="shortenName[0]">
					        		<img width="48" :src="shortenName[0].image" @click="directTo(0)">
						        	 ${{shortenName[0].unit_price}}				        		
					        	</strong>
				        		<strong><strong @click="directTo(shortenName[0].type)" >
	                         		<img width="48" :src=" '/images/front-end/shoppingCart/' + shortenName[0].type + '.png' ">
	                         		{{shortenName[0].type == 'engagementRings'? 'Engagement Ring':'diamond' | transJs(langs,locale) }}
	                         	</strong></strong>
	                         	<i @click="removeItem(0)" class="fa fa-times-circle"></i>

	                         </p>
	                         
					      </a>

					    </div>

					    <div class="col-4 border d-block d-sm-none" :class="{' background-primary': selectingType == shortenName[0].type }"  v-if="shortenName[0]"  >

					      <a class="nav-link " v-if="shortenName[0]">

					        <p :class="{'color-white': selectingType == shortenName[0].type }" v-if="shortenName[0]">
					        	<strong @click="directTo(0)" v-if="shortenName[0]">
					        		<img width="48" :src="shortenName[0].image" @click="directTo(0)">
						        	 ${{shortenName[0].unit_price}}				        		
					        	</strong>
	                         	<i @click="removeItem(0)" class="fa fa-times-circle"></i>

	                         </p>
	                         
					      </a>

					    </div>
					    
					    

					    <div :class="{[$style.arrow] : selectingType == shortenName[0].type }"></div>

					    <div class="col-4 border d-sm-block d-none" :class="{' background-primary': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }" v-if="shortenName[0]"  >

					      <a class="nav-link " >

					      	<p :class="{'color-white': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }" >
					      		<strong @click="directTo(1)" v-if="shortenName[1]">
					      			<img width="48" :src="shortenName[1].image">
					        		 ${{shortenName[1].unit_price}}
					      		</strong>
					      		<strong @click="directTo(shortenName[0].type == 'diamonds'?'engagementRings':'diamonds')"  ><strong >
					      			<img width="48" :src=" `/images/front-end/shoppingCart/${shortenName[0].type == 'diamonds'?'engagementRings':'diamonds'}.png` " >
					      			{{shortenName[0].type == 'engagementRings'? 'diamond' : 'Engagement Ring' | transJs(langs,locale)}} 
					      		</strong></strong>
					      		<i class="fa fa-times-circle" @click="removeItem(1)" v-if="shortenName[1]"></i>

					      	</p>

					      </a>

					    </div>



					    <div :class="{[$style.arrow] : selectingType == shortenName[0].type }"></div>

					    <div class="col-4 border d-block d-sm-none" :class="{' background-primary': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }" v-if="shortenName[0]"  >

					      <a class="nav-link " >

					      	<p :class="{'color-white': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }" >
					    		<strong @click="directTo(1)" v-if="shortenName[1]">
					      			<img width="48" :src="shortenName[1].image">
					        		 ${{shortenName[1].unit_price}}
					      		</strong>
					      		<strong  v-if="!shortenName[1]" @click="directTo(shortenName[0].type == 'diamonds'?'engagementRings':'diamonds')"  ><strong >
					      			<img width="48" :src=" `/images/front-end/shoppingCart/${shortenName[0].type == 'diamonds'?'engagementRings':'diamonds'}.png` " >
					      			{{shortenName[0].type == 'engagementRings'? 'diamond' : 'Engagement Ring' | transJs(langs,locale)}} 
					      		</strong></strong>
					      		<i class="fa fa-times-circle" @click="removeItem(1)" v-if="shortenName[1]"></i>

					      	</p>

					      </a>

					    </div>

					    


					    <div :class="{[$style.arrow] : selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }"></div>


					    <div class="col-4 border" :class=" {' background-primary': currentUrl.includes('diamond-ring-review') }" @click="directToUrl('/diamond-ring-review')">
					      <a class="nav-link " >
					      	<p :class="{'color-white': currentUrl.includes('diamond-ring-review') }"  v-if="shortenName.filter((data)=>{return data.id}).length" >
					      		<img width="48" src="/images/front-end/shoppingCart/review.png">
						         {{'Review' | transJs(langs,locale)}}
					      	</p>

					      </a>
					    </div>
					    <div :class="{[$style.arrow] : currentUrl.includes('diamond-ring-review') }"></div>

					  </div>
            


                </div>

        </div>
	</div>

</template>



<script type="text/javascript">

import { get,post, } from '../../helpers/api'
import { setCookie, getCookie, } from '../../helpers/cookie'

import { getLocale, getLocaleCode } from '../../helpers/locale'


	
export default {
	data(){
		return {
            mutualVar,
			langs,

		}
	},
	watch:{
		
	},
	created(){
		this.fetchCookies()
	},
	computed:{
		orderProcedures(){
            var procedures = {
                            engagementRings:
                            ['engagementRings','diamonds','review'],
                            diamonds:
                            ['diamonds','engagementRings','review']


                        }
            return procedures[this.selectingType]
        },
        selectingType(){
	        var type = ''
	        var urls = [ {url:'/gia-loose-diamonds',
	    				  type: 'diamonds'},
	    				  {url:'/engagement-rings',
	    				  type: 'engagementRings'},
	    				  {url:'/diamond-ring-review',
	    				  type: 'review'},
	    				  ]

			for (var i = 0 ; urls.length > i; i++) {
	        	if (window.location.pathname.includes(urls[i].url)) {
	        		type = urls[i].type
				}
				
			}

        	return type
        },
        shortenName(){
        	return this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems
        },
   		locale(){
				return getLocaleCode()
			},
        currentUrl(){
        	return window.location.pathname.slice(3)
        },

	},
	methods:{
        fetchCookies(){
            if (localStorage.getItem('shoppingCart')) {
                this.mutualVar.cookiesInfo.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')))
            }

        },
        sendCookies(){
            var cookies = this.mutualVar.cookiesInfo.shoppingCart
            localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080)

        },
        directTo(item){
        	var urlId =0
        	console.log(item)
        	if (Number.isInteger(item)) {
        		urlId = this.mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].url + this.mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id 

        	}else{
        		if (item == 'engagementRings') {
        			urlId  = '/engagement-rings'
        		}
        		if (item == 'diamonds') {
        			urlId  = '/gia-loose-diamonds'
        		}

        		urlId = getLocale() + urlId
        	}

        	window.open(urlId,'_self')
        },
        directToUrl(url){
        	window.open(getLocale() + url,'_self')
        },
        removeItem(item){
        	var pairItems = this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems
        	var url = pairItems[item].url

        	if (pairItems.length > 1 ) {
        		pairItems.splice(2,1)
        	}
        	pairItems.splice(item,1)
        	this.sendCookies()
        	window.open( url,'_self')
        },

    }
}
</script>

<style module>
	.arrow {
	  width: 0; 
	  height: 0; 
	  border-top: 30px solid transparent ;
	  border-bottom: 30px solid transparent;	  
	  border-left: 30px solid ;
	  border-left-color: #81cdf3;

	}

</style>