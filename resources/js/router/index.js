import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../pages/Home.vue';
import Login from '../pages/Login.vue';
import Register from '../pages/Register.vue';
import cookie from 'vue-cookies';

import Albums from '../pages/Albums.vue'
import Artists from '../pages/Artists.vue'


Vue.use(VueRouter);
const routes=[
        {
            path: '/',
            name: 'Home',
            component: Home,
            children: [
              {
              path:'albums',
              name: 'albums',
              component:Albums
            },
            {
              path:'artists',
              name:'artists',
              component:Artists
            }
          ]
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/register',
            name: 'Register',
            component: Register
        },
      
      
    ];

const router = new VueRouter({
        routes, // short for routes: routes,
        mode: 'history',
      });

      router.beforeEach((to, from, next) => {
        if (cookie.isKey('logged')){
          var logged = cookie.get('logged');
        }
        if ((to.name !== 'Login' && !logged) && (to.name !== 'Register' && !logged)){
            next({ name: 'Login' })
        } 
        else next()
      })

export default router;

