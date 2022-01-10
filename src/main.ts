import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import i18n from './i18n'
import VueToast from 'vue-toast-notification'

import 'vue-toast-notification/dist/theme-sugar.css'
import './assets/styles/app.scss'

const app = createApp(App)

app.use(i18n).use(store).use(router).use(VueToast).mount('#app')

app.config.globalProperties.$mediaUrl = process.env.VUE_APP_MEDIA_URL
