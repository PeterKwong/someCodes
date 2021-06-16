export function transJs(data,ori,locale){

			var temp = []
			 
			temp = ori.filter((da)=> da[data])

				if ( temp.hasOwnProperty(0) ) {
					return temp[0][data][locale]
				}else{
					return '.' + data
				}
				
			
}