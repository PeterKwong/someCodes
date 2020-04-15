
export default{

	transJs(data){
			var temp = []
			 
			temp = langs.filter((da)=> da[data])

				if ( temp.hasOwnProperty(0) ) {
					return temp[0][data][mutualVar.langs.localeCode]
				}else{
					return '.' + data
				}
				
			
	}
}