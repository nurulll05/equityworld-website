
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                ewf: {
                    navy: "#0B1F3A",
                    orange: "#F58220",
                    white: "#FFFFFF",
                    light: "#F5F7FA",
                },
            },
        },
    },

    plugins: [],

    corePlugins: {
        preflight: false,
    },
}
