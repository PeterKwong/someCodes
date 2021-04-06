<template>

	<div v-if="currentUrl != ''" class="bg-gray-100 opacity-75" >

		 <div v-if="selectingType=='diamonds' || selectingType=='engagementRings' || selectingType == 'review' ">
		 	<div v-if="mutualVar.cookiesInfo.shoppingCart.items.length">
                 <div class="grid grid-cols-12">

					    <div class="col-span-4 relative" :class="{' border-blue-600 border-b-2': selectingType == shortenName[0].type }"  v-if="shortenName[0]"  @click="directTo(0)" >

					      <div class="flex justify-center items-center text-center"  :class="{'text-blue-600': selectingType == shortenName[0].type }" v-if="shortenName[0]">

					      	<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full group-hover:bg-blue-800" v-if="selectingType != shortenName[0].type ">
					            <!-- Heroicon name: solid/check -->
					            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
					              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
					            </svg>
					          </span>	
				            <span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-600 rounded-full" v-else>
					          <span class="text-blue-600">01</span>
					        </span>


					        <p class="px-2" v-if="shortenName[0]"></p>
                         	<strong class="px-2" @click="directTo(0)" v-if="shortenName[0]">
				        		<img class="h-12" :src="shortenName[0].image">
					        	 ${{shortenName[0].unit_price}}				        		
				        	</strong>
			        		<strong class="hidden sm:block px-2"><strong @click="directTo(shortenName[0].type)" >
                         		<img class="h-12" :src=" '/images/front-end/shoppingCart/' + shortenName[0].type + '.png' ">
                         		{{shortenName[0].type == 'engagementRings'? 'Engagement Ring':'diamond' | transJs(langs,locale) }}
                         	</strong></strong>
                         	<i @click="removeItem(0)" class="fa fa-times-circle px-2 text-xl"></i>

                         		<!-- Arrow separator for lg screens and up -->
						      <div class="absolute top-0 right-0 h-full w-5" aria-hidden="true">
						        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
						          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
						        </svg>
						      </div>

					      </div>

					    </div>
		    

<!-- 					    <div :class="{[$style.arrow] : selectingType == shortenName[0].type }"></div>
 -->
					    <div class="col-span-4 relative" :class="{' border-blue-600 border-b-2': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }" v-if="shortenName[0]" @click="directTo(1)" >
					      <div class="flex justify-center items-center text-center" :class="{'text-blue-600': selectingType == shortenName[0].type?0:1 &&
					    		!currentUrl.includes('diamond-ring-review') }">

					      	<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-600 rounded-full group-hover:bg-blue-800" v-if="currentUrl.includes('diamond-ring-review')">
					            <!-- Heroicon name: solid/check -->
					            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
					              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
					            </svg>
					          </span>	
				            <span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-600 rounded-full" v-else>
					          <span class="text-blue-600">02</span>
					        </span>


							<strong class="px-2" @click="directTo(1)" v-if="shortenName[1]">
				      			<img class="h-12" :src="shortenName[1].image">
				        		 ${{shortenName[1].unit_price}}
				      		</strong>
				      		<strong class="px-2" :class="{ ' hidden sm:block' : shortenName[1]}" @click="directTo(shortenName[0].type == 'diamonds'?'engagementRings':'diamonds')"  ><strong >
				      			<img class="h-12" :src=" `/images/front-end/shoppingCart/${shortenName[0].type == 'diamonds'?'engagementRings':'diamonds'}.png` " >
				      			{{shortenName[0].type == 'engagementRings'? 'diamond' : 'Engagement Ring' | transJs(langs,locale)}} 
				      		</strong></strong>
				      		<i class="fa fa-times-circle px-1 text-xl" @click="removeItem(1)" v-if="shortenName[1]"></i>
				      		                         		<!-- Arrow separator for lg screens and up -->
						      <div class="absolute top-0 right-0 h-full w-5" aria-hidden="true">
						        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
						          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
						        </svg>
						      </div>


					      </div>
					    </div>



<!-- 					    <div :class="{[$style.arrow] : selectingType == shortenName[0].type }"></div>
 -->

					    <div class="col-span-4 flex items-center justify-center" :class=" {' border-blue-600 border-b-2': currentUrl.includes('diamond-ring-review') }" @click="directToUrl('/diamond-ring-review')" v-if="shortenName.filter((data)=>{return data.id}).length" >
					      <div class="flex justify-center items-center text-center" >
				      		<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-600 rounded-full" >
					          <span class="text-blue-600">03</span>
					        </span>
					      	<p :class="{'text-blue-600': currentUrl.includes('diamond-ring-review') }" v-if="shortenName.filter((data)=>{return data.id}).length" >
					      		<img width="48" src="/images/front-end/shoppingCart/review.png">
						         {{'Review' | transJs(langs,locale)}}
					      	</p>

					      </div>
					    </div>
<!-- 					    <div :class="{[$style.arrow] : currentUrl.includes('diamond-ring-review') }"></div>
 -->
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