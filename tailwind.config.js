module.exports = {
    darkMode: 'class',
    mode: 'jit',

    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],

    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Http/Livewire/**/*.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.blade.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
    ],

    theme: {
        extend: {
            colors: {
                'dark-primary': '#18191A',
                'dark-secondary': '#242526',
                'dark-third': '#3A3B3C',
                'dark-typography': '#B8BBBF'
            },
            fontFamily: {
                sans: ['Netflix Sans Regular'],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'class',
        }),
        require('@tailwindcss/typography')
    ],
};
