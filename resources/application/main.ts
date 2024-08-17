import { initializeHybridly } from 'virtual:hybridly/config'
import { createHead, useHead } from '@unhead/vue'
import i18n from './i18n'
import './tailwind.css'

initializeHybridly({
	enhanceVue: (vue) => {
		const head = createHead();
		head.push({
			titleTemplate: (title) => title ? `${title} — Hybridly` : 'Hybridly',
		});
		vue.use(i18n)
		vue.use(head);
	},
})
