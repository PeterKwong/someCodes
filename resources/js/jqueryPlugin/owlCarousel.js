//owl.carousesl

import 'owl.carousel/dist/assets/owl.carousel.css';
import 'owl.carousel'

$(document).ready(function(){

	$('#carousel-loop-customer-jewellery').owlCarousel({
	    stagePadding: 50,
	    loop:true,
	    margin:30,
	    responsive:{
	        0:{
	            items:1
	        },
	        750:{
	            items:2
	        },
	        1100:{
	            items:3
	        },
	        1500:{
	            items:4
	        }
	    }
	});

	$('#carousel-loop-diamond-shape').owlCarousel({
	    stagePadding: 50,
	    loop:true,
	    margin:10,
	    responsive:{
	        0:{
	            items:2
	        },
	        600:{
	            items:3
	        },
	        850:{
	            items:5
	        },
	        1200:{
	            items:7
	        },
	        1400:{
	            items:9
	        }
	    }
	});

});