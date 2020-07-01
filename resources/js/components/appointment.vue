<template>
  <div v-if="active" @click="$emit('active',null)">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog modal-dialog-centered" role="document" @click="$emit('active',null)">
              <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title">{{title}}</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="$emit('active',null)">&times;</span>
                  </button>
                </div>
                <div class="modal-body">


                  <h1 class="title is-6">{{text.title | transJs(langs,locale) | capitalize}}</h1>
                  <table class="table table-responsive">
                    <tr >
                      <td v-for="column in columns">{{column | transJs(langs,locale) | capitalize }}</td>
                    </tr>
                    <tr >
                      <td v-for="column in columns">{{ value[column] }}</td>
                    </tr>
                  </table>
                  <form @submit.prevent="save">
                  <input type="text" name="name" class="form-control" v-model="form.name" :placeholder="text.placeholderName | transJs(langs,locale)" required>
                  <input type="number" name="tel" class="form-control" v-model="form.phone" :placeholder="text.placeholderNo  | transJs(langs,locale)" required> 
                  <textarea class="form-control" v-model="form.remark" rows="5" cols="50"></textarea>
                  <div>
                    <a class="btn btn-primary" :href="hrefLangs + '/about-us'">{{ text.button  | transJs(langs,locale)}}</a>
                  <button class="btn btn-success " :class="{'is-loading': processing}" @submit.stop="save" >{{text.button1 | transJs(langs,locale)}}</button>
                  </div>
                  </form>

                </div>



            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>    



<!-- 


	<div class="modal" :class="{'is-active': active} ">
  <div class="modal-background" @click="$emit('active',null)"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">{{title}}</p>
      <button class="delete" aria-label="close" @click="$emit('active', null)"></button>
    </header>
    <section class="modal-card-body">
      <h1 class="title is-6">{{text.title | transJs(langs,locale) | capitalize}}</h1>
      <table class="table">
        <tr >
          <td v-for="column in columns">{{column | transJs(langs,locale) | capitalize }}</td>
        </tr>
        <tr >
          <td v-for="column in columns">{{ value[column] }}</td>
        </tr>
      </table>
      <form @submit.prevent="save">
      <input type="text" name="name" class="input" v-model="form.name" :placeholder="text.placeholderName | transJs(langs,locale)" required>
      <input type="number" name="tel" class="input" v-model="form.phone" :placeholder="text.placeholderNo  | transJs(langs,locale)" required> 
      <textarea  v-model="form.remark" rows="5" cols="80"></textarea>
      <div>
        <a class="button" :href="hrefLangs + '/about-us'">{{ text.button  | transJs(langs,locale)}}</a>
      <button class="button is-success " :class="{'is-loading': processing}" @submit.stop="save" >{{text.button1 | transJs(langs,locale)}}</button>
      </div>
      </form>
    </section>

    </div>
  </div>
 -->
          <!-- <div>
                <div class="modal" :class="{'is-active': flash.success}">
                  <div class="modal-background" @click="flash.success=null"></div>
                  <div class="modal-content">
                    <div class="notification is-info" v-if="flash.success">
                      {{flash.success}}
                    </div>
                  </div>
                  
                </div>

                <div class="modal" :class="{'is-active': flash.error}">
                  <div class="modal-background" @click="flash.error=null"></div>
                  <div class="modal-content">
                    <div class="notification is-danger" v-if="flash.error">
                      {{flash.error}}
                    </div>
                  </div>
                  
                </div>
            
            <div class="notification is-info" v-if="flash.error">
              <button class="delete"></button>
              {{flash.error}}
            </div>

          </div> -->

</template>


<script type="text/javascript">

	import {post} from '../helpers/api'
  import { transJs } from '../helpers/transJs'

	export default{
		props:{
			value: {
			
				default: null
			},
      active: false,
      title: '',
      columns:'',
      processing: '',
      langs: '',
      locale: '',

		},
    data(){
      return {
          mutualVar,          
          form: {
            name: '',
            phone: '',
            remark: 'Remark:',
            storeURL:'tingdiamond.com'+window.location.pathname,
          
          },
          hrefLangs: window.location.pathname.slice(0,3),
          text: {
          title:'Details fo Appointment',
          button: 'Contact Us',   
          button1: 'Appointment', 
          placeholderName: 'your name',
          placeholderNo: 'your Phone No.',
          },


      }
    },
    filters: {
    capitalize: function (value) {
      if (!value) return ''
      value = value.toString()
      return value.charAt(0).toUpperCase() + value.slice(1)
      },
      transJs,
    },
    // computed: {
    //   formData(){
    //     return this.form + this.value
    //   }
    // },
    methods: {
      save(){
        this.value.images = 0;
        this.value.texts = 0;
        var form = Object.assign({},this.form,this.value,this.storeURL)
        post('/api/appointment', form)
          .then((res)=>{
            if (res.data.saved) {
              this.mutualVar.notification.state.success = res.data.message
              this.$emit('active', null)
            }
          })
          .catch((err)=>{
            if (err.response.status === 422) {
              this.mutualVar.notification.state.error = err.response.data
            }
          })
          this.active = false

      },
      
      
    }
	}
</script>