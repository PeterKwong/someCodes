export function toMulipartedForm(form, mode){
	// if (mode === 'edit') {
	// 	if (typeof form.cover === 'string') {
	// 	const temp = JSON.parse(JSON.stringify(form))
	// 	delete temp.cover
	// 	}else{
	// 	objectToFormData(form.cover)
	// 	}

	// 	const temp = JSON.parse(JSON.stringify(form))		
	// 	if (typeof form.image1 === 'string') {
	// 	delete temp.image1
	// 	}else{
	// 	objectToFormData(form.image1)
	// 	}
	// 	console.log(temp)
	// 	return temp
	// }else{
		return objectToFormData(form)
	// }
}

export function objectToFormData(obj, form, namespace){
	let fd = form || new FormData()
	let formKey

	for (var property in obj) {
		if (obj.hasOwnProperty(property)) {
			if (namespace) {
				formKey = namespace + '[' + property + ']'
			}else{
				formKey = property
			}

			if (obj[property] instanceof Array) {
				for (var i = 0; i < obj[property].length ; i++) {

					if (obj[property][i] instanceof Array){
						for (var j = 0; j < obj[property][i].length ; j++){

							if (obj[property][i][j] instanceof Array){
									for (var k = 0; k < obj[property][i][j].length ; k++){

											if (obj[property][i][j][k] instanceof Array){
												for (var l = 0; l < obj[property][i][j][k].length ; l++){
													objectToFormData(obj[property][i][j][k][l], fd, `${property}[${i}][${j}][${k}][${l}]`)
													
													}
												}

											else if (typeof obj[property][i][j][k] === 'object' && !(obj[property][i][j][k] instanceof File )) {
												objectToFormData(obj[property][i][j][k], fd, `${property}[${i}][${j}][${k}]`)
											}else{
												fd.append(`${property}[${i}][${j}][${k}]`, obj[property][i][j][k])
											}
										}
									}

								else if (typeof obj[property][i][j] === 'object' && !(obj[property][i][j] instanceof File )) {
									objectToFormData(obj[property][i][j], fd, `${property}[${i}][${j}]`)
								}else{
									fd.append(`${property}[${i}][${j}]`, obj[property][i][j])
								}

							}
						}

					else if (typeof obj[property][i] === 'object' && !(obj[property][i] instanceof File )) {
						objectToFormData(obj[property][i], fd, `${property}[${i}]`)
					}else{
						fd.append(`${property}[${i}]`, obj[property][i])
					}

				}
			}else if (typeof obj[property] === 'object' && !(obj[property] instanceof File )) {
				objectToFormData(obj[property], fd, property)
			}else{
				fd.append(formKey, obj[property])
			}
			console.log(formKey)
		}
	}

	return fd
}