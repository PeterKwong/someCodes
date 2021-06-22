<template>
<div>
    <center>
      <h1 style="title is-3">Total : {{index}}</h1>
      <h1 style="title is-3">Total Size : {{totalSize}} Kb</h1>
      <div id="my-strictly-unique-vue-upload-multiple-image" style="display: flex; justify-content: center;">
        <vue-upload-multiple-image
          @upload-success="uploadImageSuccess"
          @before-remove="beforeRemove"
          @edit-image="editImage"
          :data-images="images"
          idUpload="myIdUpload"
          editUpload="myIdEdit"
          dragText="drag on it"
          browseText="browseText"
          primaryText="primaryText"
          markIsPrimaryText="markIsPrimaryText"
          popupText="popupText"
          dropText="dropText"
          :maxImage="maxImage"
          ></vue-upload-multiple-image>
      </div>
    </center>
</div>

</template>
 
<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
import axios from 'axios'
export default {
  props:{type:''},
  data(){
    return {
      images: [],
      index:'',
      formData:'',
      fileList:'',
      maxImage:130,
      totalSize:0
    }
  },
  components: {
    VueUploadMultipleImage
  },
  computed:{
  },
  methods: {
    uploadImageSuccess(formData, index, fileList) {
      // console.log('data', formData, index, fileList)
      this.fileList = fileList
      adminVar.form.video360 = this.fileList
      
      if (this.type == 'weddingRingForm') {
        adminVar.form[0].video360 = this.fileList          
      }

      this.index = index +1
      // Upload image api
      // axios.post('http://your-url-upload', formData).then(response => {
      //   console.log(response)
      // })
      this.calculateTotalSize()
    },
    calculateTotalSize(){
      var d = adminVar.form.video360
      for (var i = 0 ; d.length > i ; i++) {
        var leng = d[i].path.search('base64,')+7;
        var base64str = d[i].path.substr(leng);
        var decoded = atob(base64str);
        this.totalSize = this.totalSize + decoded.length 
      }
       this.totalSize =  Math.round(this.totalSize /1000)
    },
    beforeRemove (index, done, fileList) {
      console.log('index', index, fileList)
      var r = confirm("remove image")
      if (r == true) {
        done()
      } else {
      }
    },
    editImage (formData, index, fileList) {
      console.log('edit data', formData, index, fileList)
    }
  }
}
</script> 
 
<style>
#my-strictly-unique-vue-upload-multiple-image {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
 
h1, h2 {
  font-weight: normal;
}
 
ul {
  list-style-type: none;
  padding: 0;
}
 
li {
  display: inline-block;
  margin: 0 10px;
}
 
a {
  color: #42b983;
}
</style> 
 