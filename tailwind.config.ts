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

                gray: {
                    1: "#fafafa",
                    2: "#e0e0e0",
                },
            },
        },
    },
    plugins: [require("@tailwindcss/forms"), require("preline/plugin")],
} satisfies Config;
