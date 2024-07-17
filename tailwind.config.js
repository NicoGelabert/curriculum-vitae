import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                
            },
            colors: {
                white: '#FAFDFF',
                primary: '#FCFF04',
                blue: '#011627',
                secondary_blue: '#04508D',
            },
            fontSize: {
                xxs: '0.6rem',
            }
        },
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
