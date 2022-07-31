import "./bootstrap"

import Vue from 'vue'
import VueRouter from "vue-router"
import router from './router/routes'
import App from './App.vue'

window.Vue = Vue;

Vue.use(VueRouter)
Vue.config.productionTip = false

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
