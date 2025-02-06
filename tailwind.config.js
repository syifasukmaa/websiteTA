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
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                hijau1: "#1A5319",
                hijau2: "#508D4E",
                hijau3: "#80AF81",
                hijau4: "#D6EFD8",
                orange: "#FF9100",
                orange2: "#FDA403",
                blue: "#40A2E3",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};
