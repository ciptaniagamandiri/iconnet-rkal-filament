const colors = require('tailwindcss/colors') 
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.indigo,
                success: colors.green,
                warning: colors.yellow,
                'brands': {
                    'primary': '#172858',
                    'secondary': '#00BDDF'
                }
            },
        },
    },
    plugins: [
      require('@tailwindcss/forms'), 
        require('@tailwindcss/typography'), 
    ],
};
