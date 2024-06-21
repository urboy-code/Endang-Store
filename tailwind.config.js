import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "#4B3832",
                bg: "#8D6E63",
                secondary: "#D7CCC8",
                hitamCoklat: "#3E2723",
                btn: "#A1887F",
                hover: "#8D6E63",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
