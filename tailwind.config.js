const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/**/*.blade.php',
        './resources/views/**/**/**/*.blade.php',

        "./resources/js/components/*.vue", 
        "./resources/js/components/**/*.vue", 
        "./resources/js/components/**/**/*.vue", 
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sans: ['Noto Sans TC', 'sans-serif'],
                'suranna': ['Suranna', 'serif']
            },

            transitionTimingFunction: {
               'ease-in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
               'ease-out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
            },
            colors: {
                'primary':'#007bff',
                'gold': '#B38E47',
                'ting-blue' : {
                    light: '#EBF4FB',
                    DEFAULT: '#68B4E9'
                },
                'grey': {
                  light: '#FCFBF8',
                  DEFAULT:'#C4C4C4',
                  dark:'#575757' 
                }
              },
              spacing:{
                '18': '4.5rem',
                '100': '26rem',
                '131': '31rem'
              },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            borderColor: ['active'],
            backgroundColor:['responsive', 'hover','focus','active'],
            fontSize:['responsive', 'hover','focus','active'],
            textColor:['responsive', 'hover','focus','active'],
            translate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
            transitionTimingFunction: ['responsive', 'hover', 'focus'],
            scale: ['active', 'hover', 'group-hover'],
            zIndex: ['responsive', 'focus-within', 'focus', 'hover', 'group-hover'],
        },
        
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
