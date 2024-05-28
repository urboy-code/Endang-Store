/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#cbd5e1",
                secondary: "#df974a",
                dark: "#020617",
            },
            screens: {
                xl: "920px",
                "2xl": "1320px",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
