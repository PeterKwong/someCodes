<template>

    <div v-if="mutualVar.notification.contactMessage.active" @click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-centered" role="document" @click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active">
              <div class="modal-content">


                <div class="modal-header">
                  <h5 class="modal-title"> </h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
    				<div class="row justify-content-center">
    					<div class="col-3">
					    	<img src="/images/front-end/aboutUs/wechat.jpg" width="128">
    					</div>
    					<div class="col">
    						<div class="content">
						      	<div v-if="mutualVar.notification.contactMessage.trans">
							        <p class="text-justify" >
							          <strong>{{mutualVar.notification.contactMessage.title |transJs(langs, mutualVar.langs.localeCode) }}</strong> <small>@Admin</small>
							          <br>
							        </p> 
							        <p class="text-justify" :class="mutualVar.notification.contactMessage.type" v-for="dat in mutualVar.notification.contactMessage.data">
							       		{{dat  |transJs(langs, mutualVar.langs.localeCode) }}
							        </p>
							        <a :href="mutualVar.notification.contactMessage.next.nextUrl" target="_blank">
							        	<i class="fas fa-search-plus"></i>
							        	{{mutualVar.notification.contactMessage.next.nextText |transJs(langs, mutualVar.langs.localeCode) }}
							        </a>
						        </div>

						        <div v-else>
							        <p class="text-justify">
							          <strong>{{mutualVar.notification.contactMessage.title }}</strong> <small>@Admin</small>
							          <br>
							        </p>


							        <p class="text-justify" :class="mutualVar.notification.contactMessage.type" v-for="dat in mutualVar.notification.contactMessage.data">
							       		{{dat }}
							        </p>


							        <a :href="mutualVar.notification.contactMessage.next.nextUrl" target="_blank">
							        	<i class="fas fa-search-plus"></i>
							        	{{mutualVar.notification.contactMessage.next.nextText  }}
							        </a>
						        </div>
						      </div>

						      <nav class="level is-mobile">
						        <div class="level-left">
						          <a class="level-item" aria-label="reply" href="https://api.whatsapp.com/send?phone=85252376008" target="_blank">

						            <span class="icon is-large">
									  <span class="fa-stack fa-lg">
						            	<i class="fab fa-whatsapp-square"></i>
									  </span>
									</span>
									Whatsapp
						          </a>
						          
						        </div>
						      </nav>
    					</div>

    			  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>


 
</template>


<script>
	import { transJs } from '../helpers/transJs'
	import langsShoppingCart from '../langs/shoppingCart'

	export default{
		data(){
			return {
				    mutualVar,
                	langs: langsShoppingCart,
			}
		},
	    filters:{
	            transJs,        
	    },
	}

</script>

<style type="text/css">
	  *.is-danger{
    color:red;
  }
</style>