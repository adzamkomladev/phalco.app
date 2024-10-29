import { initializeHybridly } from 'virtual:hybridly/config';
import { createHead, useHead } from '@unhead/vue';
import i18n from './i18n';
import './tailwind.css';
import "preline/preline";
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import {MotionPlugin} from '@vueuse/motion'

//#region Preline Setup

import { type IStaticMethods } from "preline/preline";
import HSFileUpload from '@preline/file-upload';

declare global {
    interface Window {
        HSStaticMethods: IStaticMethods;
    }
}

// HSFileUpload.
//#endregion

//#region Echo Setup
declare global {
    interface Window { Pusher: any; EchoHub: Echo; }
}

window.Pusher = Pusher;

window.EchoHub = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

//#endregion

//#region Assets setup
import.meta.glob([
    '../svg/**',
    '../img/**',
    '../fonts/**',
    '../sample-files/**'
]);
//#endregion

initializeHybridly({
    enhanceVue: (vue) => {
        const head = createHead();
        head.push({
            titleTemplate: (title) => (title ? `${title} — Phalco` : "Phalco"),
        });
        vue.use(i18n);
        vue.use(head);
        vue.use(MotionPlugin);
    },
    progress: {
        // The default options are as follow:
        color: "#07689f",
        delay: 300,
        includeCSS: true,
        spinner: false,
    },
});
