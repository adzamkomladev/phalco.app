import { defineConfig } from 'vite'
import hybridly from 'hybridly/vite'
import svgLoader from 'vite-svg-loader'


export default defineConfig({
	plugins: [
		hybridly(),
        svgLoader()
	]
})
