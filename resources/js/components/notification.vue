
<template>
  <div class="z-10">

    <div v-if="notification.state.success || notification.state.error " @click="resetArray()">
      <transition name="modal">
        <div class="modal-mask">
          <button tabindex="-1" class="modal-button"></button>          
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-centered" role="document" @click="resetArray()">
              <div class="modal-content">
                <div class="modal-header border-b">

                  <h5 class="modal-title"></h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="resetArray()">&times;</span>
                  </button>
                </div>
                <div class="modal-body p-2">
                  <div v-if="notification.state.success">
                    <div class="notification is-info w-64" v-if="!Array.isArray(notification.state.success)">
                      <center>
                        {{notification.state.success}}
                      </center>
                    </div>

                    <div class="notification is-info w-64" v-if="Array.isArray(notification.state.success)">

                      <ol type="1">
                        <div v-for="message in notification.state.success">
                          <li>{{message}}</li>           
                        </div>
                      </ol>

                    </div>
                  </div>


                  <div v-if="notification.state.error">
                    <div class="notification is-info w-64" v-if="!Array.isArray(notification.state.error)">
                      <center>
                        {{notification.state.error}}
                      </center>
                    </div>

                    <div class="notification is-info w-64" v-if="Array.isArray(notification.state.error)">

                      <ol type="1">
                        <div v-for="message in notification.state.error">
                          <li>{{message}}</li>           
                        </div>
                      </ol>

                    </div>
                  </div>


                <!--   <div class="grid grid-cols-12" v-if="notification.contactMessage.active">
                    <div class="col-span-4">
                      <img width="128" src="/images/front-end/aboutUs/wechat.jpg">
                    </div>
                    
                    <div class="col-span-8">
                      <div class="content">
                          <div v-if="notification.contactMessage.trans">
                            <p class="text-2xl p-1">
                              <strong>{{notification.contactMessage.title |transJs(langs) }}</strong> <small>@Admin</small>
                              <br>
                            </p> 
                            <p :class="notification.contactMessage.type" v-for="dat in notification.contactMessage.data">
                              {{dat  |transJs(langs) }}
                            </p>
                            <a :href="notification.contactMessage.next.nextUrl" target="_blank">
                              <i class="fas fa-search-plus"></i>
                              {{notification.contactMessage.next.nextText |transJs(langs) }}
                            </a>
                          </div>

                          <div v-else>
                            <p>
                              <strong>{{notification.contactMessage.title }}</strong> <small>@Admin</small>
                              <br>
                            </p>

                            <span style="white-space: pre-line" class="text-lg p-1" :class="notification.contactMessage.type" v-for="dat in notification.contactMessage.data">
                              {{dat }}</span>


                            <a  class="text-lg p-1" :href="notification.contactMessage.next.nextUrl" target="_blank">
                              <i class="fas fa-search-plus"></i>
                              {{mutualVar.notification.contactMessage.next.nextText  }}
                            </a>
                          </div>
                        </div>

                        <div class="flex p-1">
                            <a class="text-blue-500" aria-label="reply" href="https://api.whatsapp.com/send?phone=85252376008" target="_blank">
                              Whatsapp
                            </a>
                            <a class="text-green-500" aria-label="reply" href="https://api.whatsapp.com/send?phone=85252376008" target="_blank">
                              <span class="icon is-large">
                                    <span class="fa-stack fa-lg">
                                          <i class="fab fa-whatsapp-square"></i>
                                    </span>
                              </span>
                            </a>
                            
                        </div>
                    </div>
                  </div> -->



                </div>




<!--                                                         <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" @click="resetArray()">Close</button>
                </div>
-->

              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>


    </div>
  </div>

</template>

<script>


  import Flash from '../helpers/flash'
  // import Auth from '../store/auth'
  // import Images from './helpers/images'
  // import Locale from './helpers/locale'
  // import {get} from './helpers/api'

export default {
    
    created(){
      // Auth.initialize()
    },
    data(){
      return {
        flash: Flash.state,
        mutualVar,
        langs,
        // auth: Auth.state,
        // images: Images
      }
    },
    computed:{
      notification(){
        return mutualVar.notification
      }
    },
    methods:{
      resetArray(){
        this.notification.state.success = null
        this.notification.state.error = null
      }
    },

  }
</script>


<style type="text/css">
  *{
    box-sizing: border-box;
  }
  
</style>