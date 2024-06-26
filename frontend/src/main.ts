import 'bootstrap/dist/css/bootstrap.min.css' // Import Bootstrap CSS
import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import axios from './plugins/axios'
import 'uno.css'
import { configure } from 'vee-validate'
const app = createApp(App)

configure({
  validateOnInput: true
})

app.use(createPinia()).use(router.router).use(ElementPlus).use(router.simpleAcl)

app.config.globalProperties.$axios = axios
app.mount('#app')
