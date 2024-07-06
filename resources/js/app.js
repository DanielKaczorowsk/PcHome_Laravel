import './bootstrap';

import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';

import app from './components/app.vue';

import router from './router/index.js';

import { createStore } from 'vuex';

import auth from './store/auth.js';

import nav from './components/webapi/nav.vue';

const store = createStore({
    modules: {
        auth
    }
});

createApp(app).component('bootstrap', bootstrap).use(router,store).mount('#app');
createApp(nav).use(router, store).mount('#nv');
import.meta.glob([
    '../images/**',
    '../fonts/**',
]);
