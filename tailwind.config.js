const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                'primary': {
                    '50': '#3ea5d7',
                    '100': '#349bcd',
                    '200': '#2a91c3',
                    '300': '#2087b9',
                    '400': '#167daf',
                    '500': '#0c73a5',
                    '600': '#02699b',
                    '700': '#005f91',
                    '800': '#005587',
                    '900': '#004b7d'
                }
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
