import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import routes from './services/routes'

const router = createRouter({
    routes,
    history: createWebHistory()
})



createApp(App)
.use(router)
.mount('#app')
