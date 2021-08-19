<template>

	<div v-if="selectingType=='diamonds' || selectingType=='engagementRings' || selectingType == 'review' ">
	 	<div v-if="mutualVar.cookiesInfo.shoppingCart.items.length">


			  <div class="flex flex-col space-y-7 md:mb-16" v-if="shortenName[0]">
		        <div class="flex md:items-center justify-between lg:justify-around px-5 md:px-0 font-suranna">
		            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
		                <div class="relative shopping-bar-box">
		                    <img class="" @click="directTo(0)" :src="shortenName[0].image"  alt="">
		                    <button class="absolute top-1 left-1">
		                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" @click="removeItem(0)">
		                            <g clip-path="url(#clip0)">
		                            <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"/>
		                            <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"/>
		                            </g>
		                            <defs>
		                            <clipPath id="clip0">
		                            <rect width="20" height="20" fill="white"/>
		                            </clipPath>
		                            </defs>
		                        </svg>    
		                    </button>
		                </div>
		                <span class="md:text-xl font-suranna text-center md:text-left">{{ shortenName[0].type=='engagementRings'?'Select Setting':'Select Diamond'| transJs()}} 
		                    <a class="block md:inline md:ml-3 text-brown underline" href="#" @click="directTo(0)" >{{'View'| transJs()}}</a>
		                </span>
		            </div>
		            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
		                <div class="shopping-bar-box"  v-if="!shortenName[1] && shortenName[0].type=='engagementRings'">
		                    <svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
		                        <path d="M41.781 12.0392L35.5895 0.950954C35.2765 0.391036 34.6102 0 33.969 0H8.0312C7.3897 0 6.72323 0.391161 6.41055 0.951203L0.219043 12.0391C-0.11214 12.6319 -0.0637101 13.429 0.336764 13.9773L15.7194 35.0456C16.0709 35.5271 16.7074 35.8503 17.3034 35.8503H24.6964C25.2924 35.8503 25.929 35.5269 26.2804 35.0456L41.6632 13.9772C42.0638 13.4289 42.1121 12.6318 41.781 12.0392ZM38.7172 11.7813C36.9088 11.7813 33.3452 11.7813 31.4821 11.7813C31.2463 11.7813 31.3156 11.6459 31.3156 11.6459L34.1228 3.40359C34.1228 3.40359 34.2152 3.33008 34.2637 3.41601C35.4555 5.53039 38.3234 10.6829 38.8508 11.6303C38.9054 11.7284 38.8646 11.7813 38.7172 11.7813ZM27.0781 11.7813C23.9498 11.7813 17.7548 11.7813 14.5644 11.7813C14.3383 11.7813 14.4547 11.635 14.4547 11.635L20.2666 2.42209C20.2666 2.42209 20.2806 2.35913 20.3986 2.35913C20.6444 2.35913 21.0768 2.35913 21.303 2.35913C21.4012 2.35913 21.4235 2.4242 21.4235 2.4242L27.2465 11.6543C27.2465 11.6545 27.3534 11.7813 27.0781 11.7813ZM24.321 2.35926C26.08 2.35926 31.0673 2.35926 31.8753 2.35926C32.008 2.35926 31.9395 2.49709 31.9395 2.49709C31.9395 2.49709 30.0175 8.14284 29.3234 10.1787C29.28 10.3055 29.1315 10.2205 29.1315 10.2205L24.2303 2.4514C24.2302 2.45152 24.1537 2.35926 24.321 2.35926ZM12.4286 10.0604C11.7924 8.19202 9.88878 2.58104 9.88878 2.58104C9.88878 2.58104 9.78956 2.35926 10.0033 2.35926C11.6917 2.35926 16.4156 2.35926 17.3537 2.35926C17.5134 2.35926 17.4143 2.52193 17.4143 2.52193L12.6453 10.0815C12.6454 10.0815 12.4908 10.2433 12.4286 10.0604ZM27.893 14.1406C27.9779 14.1406 27.9552 14.1956 27.9552 14.1956L21.3986 33.4446C21.3986 33.4446 21.3817 33.4913 21.335 33.4913C21.1107 33.4913 20.6741 33.4913 20.4379 33.4913C20.3765 33.4913 20.3665 33.4373 20.3665 33.4373L13.8406 14.2191C13.8406 14.2191 13.8185 14.1405 13.9181 14.1405C17.4321 14.1406 24.3992 14.1406 27.893 14.1406ZM7.76881 3.67517C8.4169 5.53325 10.1483 10.6731 10.4697 11.6276C10.5032 11.7272 10.5145 11.7813 10.3276 11.7813C8.56815 11.7813 5.09725 11.7813 3.28934 11.7813C3.06321 11.7813 3.15299 11.6234 3.15299 11.6234L7.63309 3.60066C7.63309 3.60066 7.70486 3.49176 7.76881 3.67517ZM3.51559 14.1406C5.46742 14.1406 9.33445 14.1406 11.2457 14.1406C11.3491 14.1406 11.3559 14.2387 11.3559 14.2387L17.8656 33.409C17.8656 33.409 17.8945 33.4913 17.8257 33.4913C17.7649 33.4913 17.6602 33.4913 17.5825 33.4913C17.5039 33.4913 17.4498 33.4147 17.4498 33.4147L3.44829 14.2379C3.44817 14.2379 3.36062 14.1406 3.51559 14.1406ZM24.4413 33.4913C24.3159 33.4913 24.0786 33.4913 23.94 33.4913C23.8614 33.4913 23.8979 33.4242 23.8979 33.4242L30.4468 14.1968C30.4468 14.1968 30.4597 14.1406 30.547 14.1406C32.566 14.1406 36.5513 14.1406 38.5524 14.1406C38.6237 14.1406 38.5894 14.1866 38.5894 14.1866L24.5214 33.454C24.5213 33.454 24.5028 33.4913 24.4413 33.4913Z" fill="#CCCCCC"/>
		                    </svg>                    
		                </div>
		                <div class="shopping-bar-box"  v-if="!shortenName[1] && shortenName[0].type=='diamonds'">
		                   <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M20 40C8.98758 40 0 31.0118 0 20C0 8.98758 8.9882 0 20 0C31.0124 0 40 8.9882 40 20C40 31.0124 31.0118 40 20 40ZM20 2.34375C10.2643 2.34375 2.34375 10.2643 2.34375 20C2.34375 29.7357 10.2643 37.6562 20 37.6562C29.7357 37.6562 37.6562 29.7357 37.6562 20C37.6562 10.2643 29.7357 2.34375 20 2.34375Z" fill="#CCCCCC"/>
	                            <path d="M20 35.3125C11.5896 35.3125 4.6875 28.4088 4.6875 20C4.6875 11.5896 11.5912 4.6875 20 4.6875C28.4104 4.6875 35.3125 11.5912 35.3125 20C35.3125 28.4104 28.4088 35.3125 20 35.3125ZM20 7.03125C12.849 7.03125 7.03125 12.849 7.03125 20C7.03125 27.151 12.849 32.9688 20 32.9688C27.151 32.9688 32.9688 27.151 32.9688 20C32.9688 12.849 27.151 7.03125 20 7.03125Z" fill="#CCCCCC"/>
	                        </svg>                  
		                </div>
		                <div class="relative shopping-bar-box" v-if="shortenName[1]">
		                    <img class="" @click="directTo(1)" :src="shortenName[1].image"  alt="">
		                    <button class="absolute top-1 left-1">
		                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" @click="removeItem(1)">
		                            <g clip-path="url(#clip0)">
		                            <path d="M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z" fill="#666666"/>
		                            <path d="M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z" fill="white"/>
		                            </g>
		                            <defs>
		                            <clipPath id="clip0">
		                            <rect width="20" height="20" fill="white"/>
		                            </clipPath>
		                            </defs>
		                        </svg>    
		                    </button>
		                </div>
		                <span class="md:text-xl font-suranna text-center md:text-left">{{shortenName[0].type=='engagementRings'?'Select Diamond':'Select Setting'| transJs()}}
		                	<a class="block md:inline md:ml-3 text-brown underline" href="#" @click="directTo(1)" >{{'View'| transJs()}}</a>
		                </span>
		            </div>
		            <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10">
		                <div class="shopping-bar-box">
		                    <svg class="w-10" height="38" viewBox="0 0 50 38" fill="none" xmlns="http://www.w3.org/2000/svg">
		                        <path d="M25 0.669556C11.215 0.669556 0 7.59202 0 16.1012C0 22.4404 6.05918 28.0029 15.4708 30.3628C16.7913 34.5124 20.6453 37.3305 25 37.3305C29.3547 37.3305 33.2087 34.5124 34.5292 30.3628C43.9408 28.0029 50 22.4404 50 16.1012C50 7.59202 38.785 0.669556 25 0.669556ZM17.035 24.8828L20 25.8729V28.7995L17.035 29.7896C16.5417 28.1911 16.5417 26.4812 17.035 24.8828ZM25 9.83616C33.0691 9.83616 40.0983 12.392 42 15.9562C40.8167 18.2604 37.57 20.2753 33.0417 21.4154C31.165 18.8509 28.1778 17.3353 25 17.3353C21.8223 17.3353 18.835 18.8509 16.9583 21.4154C12.43 20.2753 9.1833 18.2604 8 15.9562C9.90166 12.392 16.9309 9.83616 25 9.83616ZM7.52832 13.7645C7.8333 9.3511 15.6967 5.66946 25 5.66946C34.3033 5.66946 42.1667 9.3511 42.4717 13.7645C39.4642 10.3961 32.75 8.16946 25 8.16946C17.25 8.16946 10.5358 10.3962 7.52832 13.7645ZM21.6675 29.0196V25.6604C21.686 25.6304 21.7024 25.5992 21.7166 25.567C21.7166 25.562 21.7166 25.5562 21.7166 25.5512L23.2166 24.0512C23.2225 24.0512 23.2274 24.0512 23.2324 24.0512C23.2612 24.0366 23.2891 24.0201 23.3157 24.0021H26.6857C26.7125 24.0201 26.7403 24.0366 26.769 24.0512C26.774 24.0512 26.779 24.0512 26.7849 24.0512L28.2849 25.5512C28.2849 25.5562 28.2849 25.562 28.2849 25.567C28.2991 25.5992 28.3155 25.6304 28.334 25.6604V29.0203C28.3159 29.0471 28.2994 29.0749 28.2849 29.1036C28.2849 29.1086 28.2849 29.1145 28.2849 29.1195L26.7849 30.6187C26.7799 30.6187 26.7749 30.6187 26.7698 30.6187C26.741 30.6333 26.7132 30.6497 26.6865 30.6678H23.3148C23.2881 30.6497 23.2603 30.6332 23.2315 30.6187C23.2266 30.6187 23.2216 30.6187 23.2165 30.6187L21.7165 29.1187C21.7165 29.1137 21.7165 29.1078 21.7165 29.1029C21.7021 29.0741 21.6856 29.0462 21.6675 29.0196ZM21.0061 20.0253L21.9767 22.9337L20.5958 24.3146L17.6866 23.3429C18.4554 21.944 19.6068 20.7932 21.0061 20.0253ZM22.5458 19.3729C24.1447 18.8795 25.8552 18.8795 27.4541 19.3729L26.4641 22.3363H23.5357L22.5458 19.3729ZM28.02 22.9337L28.9908 20.0245C30.3907 20.7924 31.5427 21.9436 32.3116 23.3429H32.31L29.4008 24.3146L28.02 22.9337ZM21.0075 34.6479C19.6082 33.8797 18.4568 32.7286 17.6884 31.3295L20.5976 30.3578L21.9784 31.7387L21.0075 34.6479ZM22.5458 35.2995L23.5358 32.3362H26.4642L27.4542 35.2995C25.8553 35.7929 24.1447 35.7929 22.5458 35.2995ZM28.9925 34.6479L28.0217 31.7387L29.4025 30.3578L32.3117 31.3295C31.5432 32.7286 30.3918 33.8797 28.9925 34.6479ZM32.9634 29.7895L30 28.7995V25.8729L32.9634 24.8828C33.4566 26.4812 33.4566 28.1911 32.9634 29.7895ZM34.9208 28.5362C35.1691 26.6035 34.8309 24.6408 33.95 22.9029C40.28 21.1929 44.1667 17.8462 44.1667 14.0229C44.1667 8.40452 35.75 4.00286 25 4.00286C14.25 4.00286 5.8333 8.40452 5.8333 14.0229C5.8333 17.8462 9.71992 21.1896 16.05 22.9029C15.1705 24.6413 14.8338 26.6039 15.0833 28.5362C7.00664 26.2854 1.6667 21.3912 1.6667 16.1012C1.6667 8.51116 12.1342 2.33616 25 2.33616C37.8658 2.33616 48.3333 8.51116 48.3333 16.1012C48.3333 21.3912 42.9934 26.2854 34.9208 28.5362Z" fill="#CCCCCC"/>
		                    </svg>                    
		                </div>
		                <span class="md:text-xl font-suranna text-center md:text-left">{{'Finish'| transJs()}}</span>
		            </div>
		        </div>
		        <nav class="overflow-hidden" aria-label="Progress">
		            <ol class="flex items-center py-2">
		                <li class="relative pl-12 md:pl-28 lg:pl-44 xl:pl-52 2xl:pl-64">

		                    <div class="progress-bar-line" aria-hidden="true">
		                        <div class="line active"></div>
		                    </div>
		                    <a href="#" id="progress-bar-quare" class="active">
		                        <span class="active">1</span>
		                    </a>
		                </li>
		            
		                <li class="relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131">

		                    <div class="progress-bar-line" aria-hidden="true">
		                        <div class="line" :class="{'active':shortenName[0]}"></div>
		                    </div>
		                    <a href="#" id="progress-bar-quare" :class="{'active':shortenName[0]}">
		                        <span :class="{'active':shortenName[0]}">2</span>
		                    </a>
		                </li>
		            
		                <li class="relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131 pr-12 md:pr-20 lg:pr-36 2xl:pr-48">

		                    <div class="progress-bar-line" aria-hidden="true">
		                        <div class="line" :class="{'active':currentUrl.includes('diamond-ring-review')}"></div>
		                    </div>
		                    <a href="#" id="progress-bar-quare" :class="{'active':currentUrl.includes('diamond-ring-review')}">
		                        <span :class="{'active':currentUrl.includes('diamond-ring-review')}">3</span>
		                    </a>
		                </li>
		            </ol>
		        </nav>
		    </div>


        </div>
    </div>

</template>




<!-- 
<template>

	<div v-if="currentUrl != ''" >
		<div v-if="selectingType=='diamonds' || selectingType=='engagementRings' || selectingType == 'review' ">
		 	<div v-if="mutualVar.cookiesInfo.shoppingCart.items.length">

                 <div class="grid grid-cols-12 bg-gray-100 opacity-75">

				    <div class="col-span-4 relative" :class="{' border-blue-400 border-b-2': selectingType == shortenName[0].type }"  v-if="shortenName[0]"  @click="directTo(0)" >

				      <div class="flex justify-center items-center text-center"  :class="{'text-blue-400': selectingType == shortenName[0].type }" v-if="shortenName[0]">

				      	<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-400 rounded-full group-hover:bg-blue-800" v-if="selectingType != shortenName[0].type ">

				            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
				            </svg>
				          </span>	
			            <span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-400 rounded-full" v-else>
				          <span class="text-blue-400">01</span>
				        </span>


				        <p class="px-2" v-if="shortenName[0]"></p>
                     	<strong class="px-2" @click="directTo(0)" v-if="shortenName[0]">
			        		<img class="h-12" :src="shortenName[0].image">
				        	 ${{shortenName[0].unit_price}}				        		
			        	</strong>
		        		<strong class="hidden sm:block px-2"><strong @click="directTo(shortenName[0].type)" >
                     		<img class="h-12" :src=" '/images/front-end/shoppingCart/' + shortenName[0].type + '.png' ">
                     		{{shortenName[0].type == 'engagementRings'? 'Engagement Ring':'diamond' | transJs() }}
                     	</strong></strong>
                     	<i @click="removeItem(0)" class="fa fa-times-circle px-2 text-xl"></i>

					      <div class="absolute top-0 right-0 h-full w-5" aria-hidden="true">
					        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
					          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
					        </svg>
					      </div>

				      </div>

				    </div>
	    

				    <div class="col-span-4 relative" :class="{' border-blue-400 border-b-2': selectingType == shortenName[0].type?0:1 &&
				    		!currentUrl.includes('diamond-ring-review') }" v-if="shortenName[0]" @click="directTo(1)" >
				      <div class="flex justify-center items-center text-center" :class="{'text-blue-400': selectingType == shortenName[0].type?0:1 &&
				    		!currentUrl.includes('diamond-ring-review') }">

				      	<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-400 rounded-full group-hover:bg-blue-800" v-if="currentUrl.includes('diamond-ring-review')">

				            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				              <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
				            </svg>
				          </span>	
			            <span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-400 rounded-full" v-else>
				          <span class="text-blue-400">02</span>
				        </span>


						<strong class="px-2" @click="directTo(1)" v-if="shortenName[1]">
			      			<img class="h-12" :src="shortenName[1].image">
			        		 ${{shortenName[1].unit_price}}
			      		</strong>
			      		<strong class="px-2" :class="{ ' hidden sm:block' : shortenName[1]}" @click="directTo(shortenName[0].type == 'diamonds'?'engagementRings':'diamonds')"  ><strong >
			      			<img class="h-12" :src=" `/images/front-end/shoppingCart/${shortenName[0].type == 'diamonds'?'engagementRings':'diamonds'}.png` " >
			      			{{shortenName[0].type == 'engagementRings'? 'diamond' : 'Engagement Ring' | transJs()}} 
			      		</strong></strong>
			      		<i class="fa fa-times-circle px-1 text-xl" @click="removeItem(1)" v-if="shortenName[1]"></i>

					      <div class="absolute top-0 right-0 h-full w-5" aria-hidden="true">
					        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
					          <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
					        </svg>
					      </div>


				      </div>
				    </div>




				    <div class="col-span-4 flex items-center justify-center" :class=" {' border-blue-400 border-b-2': currentUrl.includes('diamond-ring-review') }" @click="directToUrl('/diamond-ring-review')" v-if="shortenName.filter((data)=>{return data.id}).length" >
				      <div class="flex justify-center items-center text-center" >
			      		<span class="hidden sm:flex flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-blue-400 rounded-full" >
				          <span class="text-blue-400">03</span>
				        </span>
				      	<p :class="{'text-blue-400': currentUrl.includes('diamond-ring-review') }" v-if="shortenName.filter((data)=>{return data.id}).length" >
				      		<img width="48" src="/images/front-end/shoppingCart/review.png">
					         {{'Review' | transJs()}}
				      	</p>

				      </div>
				    </div>
				  </div>


            </div>
        </div>
	</div>

</template>
 -->


<script type="text/javascript">

import { get,post, } from '../../helpers/api'
import { setCookie, getCookie, } from '../../helpers/cookie'


	
export default {
	data(){
		return {
            mutualVar,
            locale: mutualVar.langs.locale,
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
        	if(mutualVar.cookiesInfo.shoppingCart.items.length >0 ){
	        	return mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems
        	}
        },
        currentUrl(){
        	return window.location.pathname.slice(3)
        },

	},
	methods:{
        fetchCookies(){
        	var data = window.mutualVar.cookiesInfo
        	data.shoppingCart = data.fetchCookies('shoppingCart',data.shoppingCart)

        },
        sendCookies(){
        	var data = window.mutualVar.cookiesInfo
        	data.shoppingCart =data.sendCookies('shoppingCart',data.shoppingCart)
        },
        directTo(item){
        	var urlId =0
        	console.log(item)
        	if (Number.isInteger(item)) {
        		urlId = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].url + mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id 

        	}else{
        		if (item == 'engagementRings') {
        			urlId  = '/engagement-rings'
        		}
        		if (item == 'diamonds') {
        			urlId  = '/gia-loose-diamonds'
        		}

        		urlId = '/' +  this.locale + urlId
        	}

        	window.open(urlId,'_self')
        },
        directToUrl(url){
        	window.open( this.locale + url,'_self')
        },
        removeItem(item){
        	var pairItems = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems
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