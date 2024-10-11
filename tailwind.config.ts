import { type Config } from 'tailwindcss'

export default {
    content: [
        "./node_modules/preline/preline.js",
        "./resources/**/*.{js,ts,vue,blade.php}",
    ],
    theme: {
        extend: {
            backgroundImage: {
    'auth-l': "url('../svg/auth-portrait.svg')",
    'auth-p': "url('../svg/auth-landscape.svg')"
  }, screens: {
        'tall': {
          'raw': `only screen and (max-height: 960px) and (max-width: 480px)`
        },
        'wide': {
          'raw': `only screen and (max-height: 480px) and (max-width: 960px)`
        },
        'portrait': {
          'raw': '(orientation: portrait)'
        },
        'landscape': {
          'raw': '(orientation: landscape)'
        },
        'tallOrWideAndPortrait': {
          'raw': `only screen and ((max-height: 960px) and (max-width: 480px) or (max-height: 480px) and (max-width: 960px)) and (orientation: portrait)`
        },
        'tallOrWideAndLandscape': {
          'raw': `only screen and ((max-height: 960px) and (max-width: 480px) or (max-height: 480px) and (max-width: 960px)) and (orientation: landscape)`
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
            colors: {
                primary: {
                    dark: "#05486e",
                    twi: "#07689f",
                    light: "#0988d0",
                    50: "#e3f2f8", // Very light shade
                    100: "#c2e1ef", // Light shade
                    200: "#8bc1de", // Lighter shade
                    300: "#55a2cd", // Mid-light shade
                    400: "#2b82b8", // Slightly darker than base
                    500: "#07689f", // Base color
                    600: "#065c8f", // Darker shade
                    700: "#054e7b", // Even darker
                    800: "#044067", // Very dark
                    900: "#032f50", //  Deep dark shade
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
