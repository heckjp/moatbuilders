import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../pages/Home.vue';

Vue.use(VueRouter);
const routes=[
        {
            path: '/',
            name: 'home',
            component: Home
        },
      
    ];

const router = new VueRouter({
        routes, // short for routes: routes,
        mode: 'history',
      });

    //   router.beforeEach((to, from, next) => {
    //     if (cookie.isKey('logado')){
    //       var logged = cookie.get('logado');
    //     }
    //     if (to.name !== 'Login' && !logged) next({ name: 'Login' })
    //     else next()
    //   })

export default router;

