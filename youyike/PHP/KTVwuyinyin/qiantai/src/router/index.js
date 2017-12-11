import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home';
import song from '@/components/song';
import game from '@/components/youxi';
import store from '@/components/store';
import me from '@/components/me';
import gequxiangqing from '../components/song/song-xiangqing.vue';
import gequlist from '../components/song/song-list.vue';
import yidian from '../components/song/yidiangequ.vue';
import bofang from '../components/song/song-bofang.vue';
import zhenxinhua from '../components/game/zhenxinhua.vue';
import mv from '../components/song/mv.vue';
import rank from '../components/song/rank.vue';
import index from '../components/song/song-index.vue';
import popular from '../components/song/popular.vue';
import recommend from '../components/song/recommend.vue';
import tjlist from '../components/song/tj-list.vue';
import shoping from '../components/store/shoping.vue';
import success from '../components/store/success.vue';
import fans from '../components/me/fans.vue';
import orders from '../components/me/orders.vue';
import login from '../components/Login.vue';
import zhuce from '../components/zhuce.vue';
import yuyue from '../components/yuyue.vue';
Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: login
        },
        {
            path:'/zhuce',
            name:'zhuece',
            component:zhuce
        },
        {
            path: '/song',
            name: 'song',
            component: song,
            children: [
                {
                  path:'/',
                  name:'/',
                  component:index
                },
                {
                    path: '/index',
                    name: 'index',
                    component: index
                },
                {
                    path: '/rank',
                    name: 'rank',
                    component: rank
                },
                {
                   path:'/popular',
                   name:'popular',
                   component:popular
                },
                {
                    path:'/recommend',
                    name:recommend,
                    component:recommend
                }
            ]
        },
        {
            path:'/tjlist',
            name:'tjlist',
            component:tjlist
        },
        {
            path: '/game',
            name: 'game',
            component: game
        },
        {
            path: '/store',
            name: 'store',
            component: store
        },
        {
            path: '/me',
            name: 'me',
            component: me
        },
        {
            path: '/gequxiangqing',
            name: 'gequxiangqing',
            component: gequxiangqing
        },
        {
            path: '/gequlist',
            name: 'gequlist',
            component: gequlist
        },
        {
            path: '/yidian',
            name: 'yidian',
            component: yidian
        },
        {
            path: '/bofang',
            name: 'bofang',
            component: bofang
        },
        {
            path: '/zhenxinhua',
            name: 'zhenxinhua',
            component: zhenxinhua
        },
        {
            path: '/mv',
            name: 'mv',
            component: mv
        },
        {
            path:'/shoping',
            name:'shoping',
            component:shoping
        },
        {
            path:'/success',
            name:'success',
            component:success
        },
        {
            path:'/fans',
            name:'fans',
            component:fans
        },
        {
            path:'/orders',
            name:'orders',
            component:orders
        },
        {
            path:'/yuyue',
            name:'yuyue',
            component:yuyue
        }
    ]
})
