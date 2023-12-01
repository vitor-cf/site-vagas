// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  css: [
		"~/assets/css/main.css",
		"primevue/resources/themes/tailwind-light/theme.css",
		"primevue/resources/primevue.css",
		"primeicons/primeicons.css",
	],
  build: {
		transpile: ["primevue", "primeicons"],
	},
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  plugins: [
    // Outros plugins
    { src: '~/plugins/laravel-echo.js', ssr: false },
  ],
})
