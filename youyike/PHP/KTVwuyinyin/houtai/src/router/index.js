import Vue from 'vue'
import Router from 'vue-router'
import admin from '@/components/admin.vue';
import songlanmu from '../components/songlanmu.vue';


Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'admin',
      component: admin
    },
      {
        path:'/songlanmu',
          name:'songlanmu',
          component:songlanmu
      }
  ]
})
