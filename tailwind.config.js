const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'purple':'#5C548A' ,
                'pink':'#B897C1' ,
                'blue':"#464070",
                'indigo':"#f0c5fc",
                'fuchsia':"#6f3396",
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    "./resources/**/*.vue",
      ],
      important: true,
};
