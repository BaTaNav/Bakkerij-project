import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#faf8f5',
                    100: '#f5f0e8',
                    200: '#e8dcc9',
                    300: '#d9c4a1',
                    400: '#c9a876',
                    500: '#b8905a',
                    600: '#a67c4e',
                    700: '#8a6542',
                    800: '#70533a',
                    900: '#5c4531',
                },
                secondary: {
                    50: '#f0f4f8',
                    100: '#dae4ed',
                    200: '#b8cde0',
                    300: '#8eafce',
                    400: '#648db8',
                    500: '#4a72a3',
                    600: '#3a5a87',
                    700: '#30496d',
                    800: '#2b3f5c',
                    900: '#27374d',
                },
                accent: {
                    50: '#f0f7f4',
                    100: '#dcece3',
                    200: '#bad9c8',
                    300: '#8fbfa5',
                    400: '#629f7f',
                    500: '#438463',
                    600: '#316a4e',
                    700: '#285540',
                    800: '#224534',
                    900: '#1e392d',
                },
                background: {
                    DEFAULT: '#ffffff',
                    light: '#fdfcfb',
                    warm: '#faf8f5',
                    cream: '#f5f0e8',
                },
                text: {
                    main: '#2d2a26',
                    secondary: '#5c5854',
                    light: '#8a8682',
                    muted: '#b8b4b0',
                },
            },
        },
    },

    plugins: [forms],
};
