export default{

        modalContent:{
        active: false,
        title:'message',
        next:'',
        type:'',
        data:[],
    },

 updateModal( type, data, next, title = 'message'){
        this.modalContent.active = true
        this.modalContent.title = title
        this.modalContent.type = type
        this.modalContent.next = next

        if (typeof data == 'string') {
	        this.modalContent.data.push(data)
        }
        if (data.length > 0) {
	        this.modalContent.data = data 
        }
   }

}