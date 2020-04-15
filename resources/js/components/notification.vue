<template>
  <div>

    <div v-if="notification.state.success || notification.state.error || notification.contactMessage.active" @click="resetArray()">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-centered" role="document" @click="resetArray()">
              <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title"></h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="resetArray()">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div v-if="notification.state.success">
                    <div class="notification is-info" v-if="!Array.isArray(notification.state.success)">
                      <center>
                        {{notification.state.success}}
                      </center>
                    </div>

                    <div class="notification is-info" v-if="Array.isArray(notification.state.success)">

                      <ol type="1">
                        <div v-for="message in notification.state.success">
                          <li>{{message}}</li>           
                        </div>
                      </ol>

                    </div>
                  </div>


                  <div v-if="notification.state.error">
                    <div class="notification is-info" v-if="!Array.isArray(notification.state.error)">
                      <center>
                        {{notification.state.error}}
                      </center>
                    </div>

                    <div class="notification is-info" v-if="Array.isArray(notification.state.error)">

                      <ol type="1">
                        <div v-for="message in notification.state.error">
                          <li>{{message}}</li>           
                        </div>
                      </ol>

                    </div>
                  </div>


                  <div class="row" v-if="notification.contactMessage.active">
                    <div class="col-3">
                      <img width="128" src="/images/front-end/aboutUs/wechat.jpg">
                    </div>
                    <div class="col">
                      <div class="content">
                          <div v-if="notification.contactMessage.trans">
                            <p >
                              <strong>{{notification.contactMessage.title |transJs(langs) }}</strong> <small>@Admin</small>
                              <br>
                            </p> 
                            <p class="subtitle is-5" :class="notification.contactMessage.type" v-for="dat in notification.contactMessage.data">
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


                            <p class="subtitle is-5" :class="notification.contactMessage.type" v-for="dat in notification.contactMessage.data">
                              {{dat }}
                            </p>


                            <a :href="notification.contactMessage.next.nextUrl" target="_blank">
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
        this.notification.contactMessage.active = false
      }
    },

  }
</script>


<style type="text/css">
  *{
    box-sizing: border-box;
  }
  
</style>