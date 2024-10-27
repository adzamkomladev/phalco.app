import { type Config } from "tailwindcss";

export default {
    content: [
        "./node_modules/preline/preline.js",
        "./resources/**/*.{js,ts,vue,blade.php}",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            backgroundImage: {
                logo: "url('../svg/icon/logo.svg')",
                "auth-p": "url('../svg/auth/layout.svg')",
                "about-sm": "url('../svg/welcome/about_bg_sm.svg')",
                "about-lg": "url('../svg/welcome/about_bg_lg.svg')",
                "menu-br": "url('../svg/welcome/menu/background.svg')",
                organization: "url('../svg/organization/layout.svg')",
            },
            screens: {
                tall: {
                    raw: `only screen and (min-height: 640px)`,
                },
                xtall: {
                    raw: `only screen and (min-height: 960px)`,
                },
                "2xtall": {
                    raw: `only screen and (min-height: 1024px)`,
                },
                _sm: {
                    raw: `only screen and (max-width: 639px)`,
                },
                _md: {
                    raw: `only screen and (max-width: 767px)`,
                },
                _lg: {
                    raw: `only screen and (max-width: 1023px)`,
                },
                _xl: {
                    raw: `only screen and (max-width: 1279px)`,
                },
                portrait: {
                    raw: "(orientation: portrait)",
                },
                landscape: {
                    raw: "(orientation: landscape)",
                },
                tallOrWideAndPortrait: {
                    raw: `only screen and ((max-height: 960px) and (max-width: 480px) or (max-height: 480px) and (max-width: 960px)) and (orientation: portrait)`,
                },
                tallOrWideAndLandscape: {
                    raw: `only screen and ((max-height: 960px) and (max-width: 480px) or (max-height: 480px) and (max-width: 960px)) and (orientation: landscape)`,
                },
            },
            flexBasis: {
                "1/7": "14.2857143%",
                "2/7": "28.5714286%",
                "3/7": "42.8571429%",
                "4/7": "57.1428571%",
                "5/7": "71.4285714%",
                "6/7": "85.7142857%",
            },
            gridTemplateColumns: {
                "13": "repeat(13, minmax(0, 1fr))",
                "14": "repeat(14, minmax(0, 1fr))",
            },
            colors: {
                primary: {
                    dark: "#05486e",
                    twi: "#07689f",
                    light: "#0988d0",
                    50: "#ebf8ff",
                    100: "#bee3f8",
                    200: "#90cdf4",
                    300: "#63b3ed",
                    400: "#4299e1",
                    500: "#3182ce",
                    600: "#2b6cb0",
                    700: "#2c5282",
                    800: "#2a4365",
                    900: "#1A365D",
                },
                forest: {
                    DEFAULT: "#00980F", // Main color
                    50: "#E6F7E9", // Very light green
                    100: "#C3ECC7", // Light green
                    200: "#80D690", // Soft green
                    300: "#3ECF5B", // Bright green
                    400: "#1CB840", // Fresh green
                    500: "#00980F", // Forest (default)
                    600: "#00850D", // Slightly darker
                    700: "#00690B", // Dark forest
                    800: "#004F08", // Very dark green
                    900: "#003505", // Almost black green
                },
                crimson: {
                    DEFAULT: "#F5190B", // Main bright red color
                    50: "#FEE6E5", // Very light red
                    100: "#FDC6C4", // Light red
                    200: "#FA8D89", // Soft red
                    300: "#F7544D", // Bright red
                    400: "#F52E27", // Intense red
                    500: "#F5190B", // Crimson (default)
                    600: "#DA150A", // Slightly darker
                    700: "#AF1008", // Dark crimson
                    800: "#850C06", // Very dark red
                    900: "#5B0804", // Almost black red
                },

                gray: {
                    1: "#fafafa",
                    2: "#e0e0e0",
                },
            },

            keyframes: {
                expand: {
                    "0%": { maxHeight: "0px", opacity: "0" },
                    "100%": { maxHeight: "1000px", opacity: "1" }, // Adjust max-height as needed
                },
                collapse: {
                    "0%": { maxHeight: "1000px", opacity: "1" },
                    "100%": { maxHeight: "0px", opacity: "0" },
                },
            },
            animation: {
                expand: "expand 0.3s ease-out forwards",
                collapse: "collapse 0.3s ease-out forwards",
            },
        },
    },
    plugins: [require("@tailwindcss/forms"), require("preline/plugin")],
} satisfies Config;
