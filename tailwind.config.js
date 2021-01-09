const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            gray: colors.trueGray,
            red: colors.rose,
            yellow: colors.amber,
            blue: colors.blue,
            indigo: colors.indigo,
            purple: colors.violet,
            pink: colors.pink,
            black: colors.black,
            white: colors.white,
            green: {
                50: '#8dd06e',
                100: '#7fb166',
                200: '#729B5A',
                300: '#7D8777',
                400: '#4E544A',
                500: '#3f433d',
                600: '#333531',
            },
            beige: {
                100: '#fff4e7',
                200: '#FFF3DD',
                300: '#C9C7B3',
                400: '#a7a691',
                500: '#858473',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
        },
        screens: {
            'xs': '475px',
            ...defaultTheme.screens,
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
