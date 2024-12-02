import { type Config } from "tailwindcss";

export default {
    content: [
        "./node_modules/preline/preline.js",
        "./resources/**/*.{js,ts,vue,blade.php}",
    ],

    theme: {
        extend: {
            backgroundImage: {
                "gradient-to-45":
                    "linear-gradient(45deg, var(--tw-gradient-stops))",
            },
            aspectRation: {
                card: "3.374/2.125",
            },
            boxShadow: {
                card: "0 1px 6.3px -1px #6b728070",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
            backgroundImage: {
                logo: "url('../svg/icon/logo.svg')",
                "auth-p": "url('../images/layout/auth.webp')",
                "about-sm": "url('../svg/welcome/about_bg_sm.svg')",
                "about-lg": "url('../svg/welcome/about_bg_lg.svg')",
                "menu-br": "url('../svg/welcome/menu/background.svg')",
                "chat": "url('https://www.transparenttextures.com/patterns/asfalt-dark.png')",
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
                _xs: {
                    raw: `only screen and (max-width: 500px)`,
                },
                mobile: {
                    raw: `only screen and (max-width: 380px)`,
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
                    DEFAULT: "#06537F", // Main color
                    dark: "#05486e",
                    logo: "#07689f",
                    light: "#0988d0",
                    50: "#e6f0f5",
                    100: "#dae8f1",
                    200: "#b2d0e1",
                    300: "#66ABCF",
                    400: "#3390BF",
                    500: "#07689F", // Base color
                    600: "#05496F",
                    700: "#043E5F",
                    800: "#03324F",
                    900: "#02273F",
                    950: "#011A2B",
                },
                secondary: {
                    50: "#e6f3fa",
                    100: "#daedf8",
                    200: "#b3daf0",
                    300: "#0988d0",
                    400: "#087abb",
                    500: "#076da6", // Base color
                    600: "#07669c",
                    700: "#05527d",
                    800: "#043d5e",
                    900: "#033049",
                    950: "#021C34",
                },
                crimson: {
                    DEFAULT: "#c41409", // Main bright red color
                    50: "#ffe8e7",
                    100: "#fee8e7",
                    200: "#feddda",
                    300: "#fcb8b3",
                    400: "#f5190b",
                    500: "#dd170a", // base color
                    535: "#c41409", // base color
                    600: "#b81308",
                    700: "#930f07",
                    800: "#6e0b05",
                    900: "#560904",
                },
                forest: {
                    DEFAULT: "#00980F", // Main color
                    50: "#e6f5e7", // Very light green
                    100: "#b0dfb5", // Light green
                    200: "#80D690", // Soft green
                    300: "#00980f", // Bright green
                    400: "#00890e", // Fresh green
                    500: "#007a0c", // Forest (default)
                    535: "#01D11659", // Forest (default)
                    600: "#00720b", // Slightly darker
                    700: "#005b09", // Dark forest
                    800: "#004407", // Very dark green
                    900: "#003505", // Almost black green
                },

                gray: {
                    DEFAULT: "cacaca",
                    1: "#fcfcfc",
                    2: "#fafafa",
                    3: "#f5f5f5",
                    4: "#e0e0e0",
                    5: "#cacaca",
                    6: "#b3b3b3",
                    7: "#a8a8a8",
                    8: "#868686",
                    9: "#656565",
                    10: "#4e4e4e",
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
