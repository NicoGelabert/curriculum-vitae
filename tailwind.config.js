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
                'sans': ['Lexend Deca', 'sans-serif'],
              },
            colors: {
                white           : '#EEF0F2',
                gray_primary    : '#E7E5E5',
                gray_lighter    : '#7C7C7C',
                gray_light      : '#F1F5F9',
                gray_dark       : '#555555',
                primary_light   : '#454ADE',
                primary_dark    : '#A8EB12',
                black_light     : '#202124',
                black           : '#191919',
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
