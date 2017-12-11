import Vue from 'vue'
import Router from 'vue-router'
import Login from '../components/Login.vue'
import lianxi from '../components/lianxi.vue';
import denglu from '../components/denglu.vue';
import Home from '../components/Home.vue';
import guite from '../components/guite.vue';
import admin from '../components/admin.vue';
import store from '../components/store.vue';
import shoping from '../components/shoping.vue';
Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            redirect:Login
        },
        {
            path: '/Login',
            name: 'Login',
            component: Login
        },
        {
            path: '/lianxi',
            name: 'lianxi',
            component: lianxi
        },
        {
            path: '/denglu',
            name: 'denglu',
            component: denglu
        },
        {
            path: '/Home',
            name: 'Home',
            component: Home
        },
        {
            path: '/guite',
            name: 'guite',
            component: guite
        },
        {
            path: '/admin',
            name: 'admin',
            component: admin
        },
        {
            path: '/store',
            name: 'store',
            component: store
        },
        {
            path: '/shoping',
            name: 'shoping',
            component: shoping
        }
    ]
})
