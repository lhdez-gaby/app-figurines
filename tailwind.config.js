const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans],
                
            },
            colors: {
                'my-pink':'#EA4B9B',
                'my-blue-soft':'#07A5E7',
                'my-blue-hard':'#2C61AC',
                'my-blue-light':'rgba(7,165,231,0.70)',
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
