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
            },
            colors:{
                'primary':'#007bff',
            },
            transitionTimingFunction: {
               'ease-in-expo': 'cubic-bezier(0.95, 0.05, 0.795, 0.035)',
               'ease-out-expo': 'cubic-bezier(0.19, 1, 0.22, 1)',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
        backgroundColor:['responsive', 'hover','focus','active'],
        fontSize:['responsive', 'hover','focus','active'],
        textColor:['responsive', 'hover','focus','active'],
        translate: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
        transitionTimingFunction: ['responsive', 'hover', 'focus'],
        scale: ['active', 'hover', 'group-hover'],
        zIndex: ['responsive', 'focus-within', 'focus', 'hover', 'group-hover']
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
