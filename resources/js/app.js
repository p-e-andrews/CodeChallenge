

import { createApp } from 'vue';
//window.Vue = Vue;
import './bootstrap';
import App from './components/App.vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
 
//Vue.use(VueRouter);
//Vue.use(VueAxios, axios);
 
const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHashHistory(),
  routes, // short for `routes: routes`
})
 
const app = createApp(App)
app.use(router)
app.use(axios)
app.mount('#app')
//{
//    el: '#app',
//    router: router,
//    render: h => h(App),
//});