import { initializeHybridly } from 'virtual:hybridly/config';
import { createHead, useHead } from '@unhead/vue';
import i18n from './i18n';
import './tailwind.css';
import "preline/preline";
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

//#region Echo Setup
declare global {
    interface Window { Pusher: any; Echo: any; }
}

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

//#endregion

initializeHybridly({
    enhanceVue: (vue) => {
        const head = createHead();
        head.push({
            titleTemplate: (title) => title ? `${title} — Phalco` : 'Phalco',
        });
        vue.use(i18n);
        vue.use(head);
    },
});
