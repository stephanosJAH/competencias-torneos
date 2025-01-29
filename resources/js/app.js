import '../css/app.css'
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import 'vuetify/dist/vuetify.min.css';
import 'vuetify/dist/vuetify.min.js';

import { createVuetify } from 'vuetify'
const vuetify = createVuetify()

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  title: title => title ? `${title} - Competencias y Torneos` : 'Competencias y Torneos',
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
    app.use(plugin)
    app.use(vuetify)
    app.mount(el)
  },
})
