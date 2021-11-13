const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Netflix Sans Regular'],
            },
            colors: {
                'coolGray' : colors.coolGray,
                'trueGray' : colors.trueGray,
                'dark' : '#242526',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
