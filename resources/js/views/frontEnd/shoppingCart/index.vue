
<script type="text/javascript">




import Carousel from '../../../components/carousel.vue'
import shoppingCartItem from '../../../components/shoppingCart/item.vue'

import { get,post, } from '../../../helpers/api'
import { getLocale , getLocaleCode} from '../../../helpers/locale'
import { setCookie, getCookie, } from '../../../helpers/cookie'
import { extraWorkingDates } from '../../../helpers/helperFunctions'
import getAuthUser from '../../../helpers/getAuthUser'

import stripeCheckoutForm from '../../../components/shoppingCart/stripeCheckoutForm.vue'

	
export default {
    el:'#shoppingCart',
    components:{stripeCheckoutForm, shoppingCartItem},
	data(){
        return {

        }
    }
}
</script>

