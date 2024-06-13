/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
            },
        },
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("daisyui"),
        require("tailwind-scrollbar-hide"),
    ],
    daisyui: {
        themes: [
            "light",
            {
                dark: {
                    primary: "#00ADB5",
                    neutral: "#00ADB5",
                    "base-100": "#222831",
                    "base-200": "#2e3239",
                    "base-300": "#1E2123",
                },
            },
        ],
    },
};
