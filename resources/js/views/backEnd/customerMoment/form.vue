<template>
    <div class="container"> 
    <h1 class="title is-3">{{title}}</h1>
    <h1 class="title is-3" v-if="option">Latest ID:{{option.id}}</h1>
        <form @submit.prevent="save">
        <div class="field" >

            <div class="columns">
               
                <div class="column is-4">
                            <select class="select" v-model="form.published">Published
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                </div>
                
            </div>
 
            <div class="columns">
                <div class="column is-4">
                    <div class="control ">
                        <div class="control" v-if="form.texts[0]">
                            <label class="label">title - en</label>
                                <input type="text" class="input" v-model="form.texts[0].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[1]">
                            <label class="label">title - hk</label>
                                <input type="text" class="input" v-model="form.texts[1].content" placeholder="title" required>
                                <small class="is-danger" v-if="errors.name">{{errors.name[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-3">
                    <div class="control ">
                        <div class="control" v-if="form.texts[2]">
                            <label class="label">title - cn</label>
                                <input type="description" class="input" v-model="form.texts[2].content" required placeholder="title">
                                <small class="is-danger" v-if="errors.description">{{errors.description[0]}}</small>
                        </div>
                    </div>
                </div>
                <div class="column is-2">
                    <div class="control has-icon-left">
                        <div class="control">
                        </div>
                    </div>
                </div>

            </div>
            
            <div class="columns is-centered">
                    <div class="column">
                        <p class="button is-primary" @click="addImage">Add Image</p>
                    </div>
                    
            </div>
            <div class="columns" >
                <div class="column is-2" v-for="(image,index) in form.images">
                        <div class="box">
                            <label> Image </label>
                            <image-upload :name="'images' + index" v-model="form.images[index].image" ></image-upload>
                            <small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
                        </div>
                </div>
            </div>  
            <div class="columns" >

                <div class="column is-4">
                        <div class="box" >
                            <label> video</label>
                            <video-upload name="video" v-model="form.video" ></video-upload>
                            <small class="error__control" v-if="errors.cover">{{errors.cover[0]}}</small>
                        </div>
                </div>


                
            </div>      


        <div class="columns is-centered">
                    <div class="column">
                        <button class="button is-primary" @submit="save" :disabled="isProcessing">Save</button>
                    </div>
                    
                </div>
        
    </div>
    </form>

</div>
</template>

<script type="text/javascript">
    
    import Vue from 'vue'
    import {get, post, put} from '../../../helpers/api'
    import {toMulipartedForm} from '../../../helpers/form'  
    import ImageUpload from '../../../components/ImageUpload.vue'
    import VideoUpload from '../../../components/VideoUpload.vue'


    export default {
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
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/customerMoments/' + this.$route.params.id + '/edit'
                this.storeURL = `/api/customerMoments/${this.$route.params.id}?_method=PUT`
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
                            this.$router.push(this.redirect)
                        }
                        this.isProcessing = false

                    })
                    .catch(function(error){
                        Vue.set(this.$data, 'errors', error.response.data)
                        this.isProcessing = false

                    })
                    
            },
            addImage(){
                this.form.images.push({'image':''})
            },
                
        }
    }
</script>