
import Vue from 'vue'
import {get, post, put} from '../../../helpers/api'
import {toMulipartedForm} from '../../../helpers/form'  
import ImageUpload from '../../../components/ImageUpload.vue'
import VideoUpload from '../../../components/VideoUpload.vue'


export default {
    el:'#customerMomentForm',
    components: {
        ImageUpload,
        VideoUpload
    },
    data(){
        return {
            form: {
            },
            isProcessing: false,
            errors: {},
            option: {},
            title: 'Create',
            initialize: '/api/customerMoments/create',
            redirect: '/adm',
            storeURL: '/api/customerMoments',
            method: 'post',
        }
    },
    beforeMount(){
        if (window.location.pathname.includes('edit') ) {
            this.title = 'Edit'
            this.initialize = '/api/customerMoments/' + this.getIdReg() + '/edit'
            this.storeURL = `/api/customerMoments/${this.getIdReg()}?_method=PUT`
            this.method = 'put'
        }
        this.fetchData()
    },
    watch: {
        '$route' : 'fetchData'
    },
    methods: {
        fetchData(){
            get(this.initialize)
                .then((response)=>{
                    Vue.set(this.$data, 'form', response.data.form)
                    Vue.set(this.$data, 'option', response.data.option)
                })
                .catch(function(error){
                    console.log(error)
                })
        },
        save(){
                this.isProcessing = true
                const form = toMulipartedForm(this.form)
                post(this.storeURL, form)
                .then((response)=>{
                    if(response.data.saved){
                        window.open(this.redirect, '_self')
                    }
                    this.isProcessing = false

                })
                .catch(function(error){
                    Vue.set(this.$data, 'errors', error.response.data)
                    this.isProcessing = false

                })
                
        },
        getIdReg(){
            var txt = window.location.pathname.slice(22)
            var pattern = new RegExp('[0-9]*', 'i')
             return pattern.exec(txt);
        },
        addImage(){
            this.form.images.push({'image':'',
                                'type' : 'cover'})
        },
            
    }
}
