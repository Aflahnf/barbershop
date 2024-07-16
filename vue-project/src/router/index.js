//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/login',
        name: 'login',
        component: () => import( /* webpackChunkName: "login" */ '@/views/auth/Login.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () => import( /* webpackChunkName: "register" */ '@/views/auth/Register.vue')
    },
    // {
    //     path: '/dashboard',
    //     name: 'dashboard',
    //     component: () => import( /* webpackChunkName: "dashboard" */ '@/views/dashboard/Index.vue')
    // },
    {
        path: '/order',
        name: 'order',
        component: () => import( /* webpackChunkName: "dashboard" */ '@/views/order/Order.vue')
    },
    {
        path: '/list',
        name: 'list',
        component: () => import( /* webpackChunkName: "dashboard" */ '@/views/order/List.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes  // config routes
})

export default router