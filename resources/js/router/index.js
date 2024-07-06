import {  createRouter, createWebHistory  } from "vue-router"

import  Index from '../components/webapi/index.vue'

import Uslugi from '../components/webapi/uslugi.vue'

import Cennik from '../components/webapi/cennik.vue'

import Aktualnosci from '../components/webapi/aktualnosci.vue'

import Posty from '../components/webapi/posty.vue'

import Login from '../components/webapi/login.vue'

import Register from '../components/webapi/rejestracja.vue'

import navdashboard from '../components/webapi/dashboard/dashboard.vue'

import dashboard from '../components/webapi/dashboard/index.vue'

import posts from '../components/webapi/dashboard/Admin/posty.vue'

import users from '../components/webapi/dashboard/Admin/uzytkownicy.vue'


const routes = [
    {
        path: '/',
        name: 'Index',
        component: Index
    },
    {
        path: '/uslugi',
        name: 'Uslugi',
        component: Uslugi
    },
    {
        path: '/cennik',
        name: 'Cennik',
        component: Cennik
    },
    {
        path: '/aktualnosci',
        name: 'Aktualnosci',
        component: Aktualnosci
    },
    {
        path: '/aktualnosci/:id',
        name: 'posty',
        component: Posty
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: navdashboard,
        children: [
            { path: '', name: 'me', component: dashboard },
            { path: 'posts', name: 'posts', component: posts },
            { path: 'users', name: 'users', component: users },
        ]
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;
