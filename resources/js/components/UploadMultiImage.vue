<template>
<div>
    <center>
      <h1 style="title is-3">Total : {{index}}</h1>
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

  data () {
    return {
      images: [],
      index:'',
      maxImage:60,
    }
  },
  components: {
    VueUploadMultipleImage
  },
  methods: {
    uploadImageSuccess(formData, index, fileList) {
      console.log('data', formData, index, fileList)
      this.index = index +1
      // Upload image api
      // axios.post('http://your-url-upload', formData).then(response => {
      //   console.log(response)
      // })
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
 