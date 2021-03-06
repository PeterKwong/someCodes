
export function getMeta(meta){

	return document.head.querySelector(`meta[name="${meta}"]`)?document.head.querySelector(`meta[name="${meta}"]`).content:null;

}