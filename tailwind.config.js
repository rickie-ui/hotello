/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                first: "#000000",
                second: "#F2F5F8",
                third: "#333333",
                fifth: "#FD4441",
                sixth: "#FFAD50",
            },
            backgroundImage: {
                hero: "url('/public/images/hero.jpg')",
            },
            fontFamily: {
                hero: ["Carter One", "system-ui"],
            },
        },
    },
    plugins: [],
};
