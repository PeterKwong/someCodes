<template>



</template>

<script type="text/javascript">


  import Auth from '../../../store/auth.js'
  import getAuthUser from '../../../helpers/getAuthUser'


  export default{
    props: ['images'],
    data(){
      return {
            navBurger: true,
            apiToken: getAuthUser.api_token,
      }
    },
    methods:{
      toggleNav(){
          this.navBurger = !this.navBurger
        }

    },
    created(){
      if ( this.api_token != null ) {
        this.$router.push('/td-login')
      }
    }
  }


</script>