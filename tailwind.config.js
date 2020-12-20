
module.exports = {
  purge: [   
    "./resources/views/**/*.blade.php", 
    "./resources/views/**/**/*.blade.php", 
    "./resources/views/**/**/**/*.blade.php", 
    "./resources/js/components/*.vue", 
    "./resources/js/components/**/*.vue", 
    ],
  theme: {
    extend: {
    	colors:{
    		'primary':'#007bff',
    	},
      transitionTimingFunction: {
       'ease-in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
       'ease-out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
      }
    },
  },
  variants: {
    backgroundColor:['responsive', 'hover','focus','active'],
    fontSize:['responsive', 'hover','focus','active'],
    textColor:['responsive', 'hover','focus','active'],
    translate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    transitionTimingFunction: ['responsive', 'hover', 'focus'],
  },
  plugins: [],
}

