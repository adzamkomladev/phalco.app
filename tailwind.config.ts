import { type Config } from 'tailwindcss'

export default {
    content: [
        './node_modules/preline/preline.js',
        './resources/**/*.{js,ts,vue,blade.php}',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
} satisfies Config
